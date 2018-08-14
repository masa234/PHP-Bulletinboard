<?php 
define("title", "なんでも掲示板");
define("navbar_content" ,"入力確認");
require('navbar.php');
require('dbconnect.php');
?>

<!doctype= html>
<meta http-equiv="content-type" charset="utf-8">
<body>
<?php 
$statement = $db->prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
$statement->execute(array($_POST['memo']));
echo '<div class="container"><h1>投稿完了です お疲れさまでした<h1><div class="container">'
?>
