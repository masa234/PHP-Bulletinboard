<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 独自のtitle -->
  <title>
    <?php echo title; ?>
  </title>
  <link href="css/bootstrap.css" rel="stylesheet"> <!-- 非推奨です -->
  <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 本家bootstrapです-->
  <link href="application.scss" rel="stylesheet" >
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">
        <?php print navbar_content; ?>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarEexample">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link text-primary" href="index.php">ホーム画面に <span class="sr-only">(current)</span></a>
        </li>
        <a class="btn btn-lg btn-warning" href="input.php" role="button">新規投稿</a>
        <a class="btn btn-lg btn-primary" href="index.php" role="button">投稿一覧</a>
      </ul>
    </div>
  </div>
</nav>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 本家です-->
<script src="js/bootstrap.min.js"></script> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
