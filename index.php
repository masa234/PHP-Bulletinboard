<?php 
define("title", "投稿一覧画面");
define("navbar_content" ,"なんでも掲示板");
require('navbar.php');
require('dbconnect.php');
?>
 
<body>
<?php
$record_count = $db-> prepare('SELECT COUNT(*) id FROM memos');
$record_count->execute(); //レコードの個数が$record_countに代入されています
$record_count = $record_count->fetchColumn();
$max_page = ceil($record_count / 10); //レコードの総数を10で割ってページ数を求めます

// ↓ここの処理間違っているかもしれません
if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])){
    if ($_REQUEST['page'] > $max_page){
        $current_page = $max_page;
    }else{
        $current_page = $_REQUEST['page'];
    }
}else{
    $current_page = 1;
}
//

// スタートのレコードを算出
if ($current_page>1){
    // 2ページ目の場合は(20-10) =10がスタート地点となる
    $start = ($current_page*10)-10;
}else{
    $start = 0;
}

$memos = $db-> prepare('SELECT * FROM memos order BY created_at DESC LIMIT ?, 10 '); //作成日時の降順にDBから抽出したデータから10件ごとに取り出します
$memos->bindParam(1, $start, PDO::PARAM_INT);
$memos->execute();
?>

<div class="container">
    <nav>
        <ul class="pagination pagination-md">
            <li class="page-item">
                <a class="page-link" href="?page=<?php print ($current_page-1); ?>" aria-label="前のページへ">
                    <span aria-hidden="true">«前へ</span>
                </a>
            </li>
            <li class="page-item">
            <?php for ($x=1; $x <= $max_page ; $x++) { ?>
                <li><a class="page-link active" href="?page=<?php echo $x ?>"><?php echo $x; ?></a></li>  
            <?php }  ?>
            </li>
            <li>
                <a class="page-link" href="?page=<?php print ($current_page+1); ?>" aria-label="次のページへ">
                    <span aria-hidden="true">»次へ</span>
                </a>
            </li>
        </ul>
    </nav>

    <?php while($memo = $memos->fetch()): ?>
    <div class="jumbotron">
        <a href="memo.php?id=<?php print($memo['id']); ?>"><?php print(mb_substr($memo['memo'], 0, 50)); ?>
        <?php print((mb_strlen($memo['memo'])>5 ? '...': '')); ?></a><hr>
        <time><?php print($memo['created_at']); ?></time>
        <a class="btn btn-lg btn-warning" href="update.php?id=<?php print($memo['id'])?>" role="button">編集画面に</a>
        <a class="btn btn-lg btn-danger" href="delete.php?id=<?php print($memo['id'])?>" role="button">削除します</a>
    </div>
    <?php endwhile; ?>
</div>
</html>

