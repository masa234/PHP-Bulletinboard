<?php 
define("title", "なんでも掲示板");
define("navbar_content" ,"なんでも掲示板");
require('navbar.php');
require('dbconnect.php');

$statement = $db->prepare('UPDATE memos SET memo=? WHERE id=?');
$statement->execute(array($_POST['memo'], $_POST['id']));
?>

<div class="container">
    <h1>メモの内容を変更しました</h1>
    <a class="btn btn-lg btn-primary" href="index.php" role="button">戻る</a>
</div>

