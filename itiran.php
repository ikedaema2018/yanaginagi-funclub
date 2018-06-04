<?php
include "funcs.php";
$pdo = nagiConnect();

$stmt = $pdo->prepare("SELECT * FROM naginagi_thread");
$status = $stmt->execute();

$view = "";
if ($status = false) {
    $error = $stmt->errorinfo();
    exit("QueryError: " . $error[2]);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<a href="comment.php?id='.$result["id"].'">
    <div class="row ta">
      <div class="col-sm-2"> <img class="img-size" src="./image/'.$result["image"].'" alt=""></div>
      <div class="col-sm-10">'.$result["title"].'</div>
    </div>
    </a>
  ';
    }
}
?>






<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/style.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="./css/bootstrap-theme.min.css">


  <title>スレッド一覧</title>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="homepage.php">やなぎなぎファンクラブ</a>

      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="itiran.php">スレッド一覧</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="thread_insert.php">スレッド作成</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="user_itiran.php">    ユーザー一覧</a>
        </li>
      </ul>
  </nav>

  <nav class="navbar navbar-default navinavi">
    <a class="navbar-brand">スレッド一覧</a><a href="index.php" class="glyphicon glyphicon-plus plus"></a>

      <div class="container-fluid">
        <div class="navbar-header navinavi">
        </div>
      </div>
    </nav>

    <div class="container">
      <?=$view?>
    </div>

  


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  
</body>
</html>