<?php 
require('dbconnect.php'); 
define("title", "メモ詳細画面");
define("navbar_content" ,"なんでも掲示板");
require('navbar.php');
require('dbconnect.php');

$memos = $db->prepare('SELECT * FROM memos WHERE id=?');
$memos->execute(array($_REQUEST['id']));
$memo = $memos->fetch();
?>

<div class="container">
    <div class="jumbotron">
    <?php print($memo['memo']); ?>
    </div>
    <a class="btn btn-lg btn-warning" href="update.php?id=<?php print($memo['id'])?>" role="button">編集画面に</a>
</div>