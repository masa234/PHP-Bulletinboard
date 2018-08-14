<?php 
define("title", "なんでも掲示板");
define("navbar_content" ,"なんでも掲示板");
require('navbar.php');
require('dbconnect.php');

if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $memos = $db->prepare('SELECT * FROM memos WHERE id =?');
    $memos->execute(array($id));
    $memo = $memos->fetch();
}
?>

<div class="container">
  <h1>140文字以上はNGです</h1>
  <form action="update_do.php" method="post">
    <input type= "hidden" name="id" value="<?php print($id); ?>">
    <textarea name="memo" class="form-control" cols="50" rows="10" ><?php print($memo['memo']); ?></textarea>
    <div class="text-center pull-right registar_btn">
      <button type="submit" class="btn btn-primary btn-lg">登録する</button>
    </div>
  </form>
</div>
