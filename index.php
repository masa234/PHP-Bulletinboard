<?php 
define("title", "なんでも掲示板");
define("navbar_content" ,"なんでも掲示板");
require('navbar.php');
require('dbconnect.php');
?>
 
<body>
<?php
if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])){
    $page = $_REQUEST['page'];
}else{
    $page = 1;
}

// スタートのレコードを算出
if ($page>1){
    // 2ページ目の場合は(20-10) =10がスタート地点となる
    $start = ($page*10)-10;
}else{
    $start = 0;
}

$page_count = $db-> prepare('SELECT COUNT(*) id FROM memos');
$page_count->execute();
$page_count = $page_count->fetchColumn();
$pagination = ceil($page_count / 10); //小数点切り上げ

$memos = $db-> prepare('SELECT * FROM memos order BY id LIMIT ?, 10');
$memos->bindParam(1, $start, PDO::PARAM_INT);
$memos->execute();
?>

<div class="container">
    <nav>
        <ul class="pagination pagination-md">
            <li class="page-item">
                <a class="page-link" href="?page=<?php print ($page-1); ?>" aria-label="前のページへ">
                    <span aria-hidden="true">«前へ</span>
                </a>
            </li>
            <li class="page-item">
            <?php for ($x=1; $x <= $pagination ; $x++) { ?>
                <li><a class="page-link" href="?page=<?php echo $x ?>"><?php echo $x; ?></a></li>
            <?php }  ?>
            </li>
            <li>
                <a class="page-link" href="?page=<?php print ($page+1); ?>" aria-label="次のページへ">
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

