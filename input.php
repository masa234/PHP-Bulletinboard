<?php 
define("title", "入力画面");
define("navbar_content" ,"なんでも掲示板");
require('navbar.php');
require('dbconnect.php');
?>

<div class="container">
  <h1>140文字で投稿して下さい</h1>
  <form action="create.php" method="post">
    <textarea name="memo" class="form-control" cols="50" rows="10" placeholder="なんでもどうぞ"></textarea>
    <div class="text-center pull-right registar_btn">
      <button type="submit" class="btn btn-primary btn-lg">投稿する</button>
    </div>
  </form>
</div>