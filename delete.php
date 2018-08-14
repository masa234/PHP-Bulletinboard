<?php 
define("title", "なんでも掲示板");
define("navbar_content" ,"なんでも掲示板");
require('navbar.php');
require('dbconnect.php');

if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $statement = $db->prepare('DELETE FROM memos WHERE id=?');
    $statement->execute(array($id));
}
?>
<div class="container">
    <h1>メモを削除しました</h1>
    <a class="btn btn-lg btn-primary" href="index.php" role="button">戻る</a>
</div>