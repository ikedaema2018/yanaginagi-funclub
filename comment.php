<?php
$thread_id = $_GET["id"];


include("funcs.php");
$pdo = nagiConnect();

$stmt = $pdo->prepare("SELECT * FROM all_comment WHERE thread_id=:thread_id");
$stmt->bindValue(':thread_id', $thread_id, PDO::PARAM_STR);
$status = $stmt->execute();


$view = "";
if ($status = false) {
    $error = $stmt->errorinfo();
    exit("QueryError: " . $error[2]);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '
    <div class="panel panel-primary">
    <div class="panel-heading"><span>'.$result["name"].'</span><span>'.$result["res_time"].'</span></div>
    <div class="panel-body">'.$result["comment"].'</div>
    </div>
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


  <title>みんなのコメント</title>

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
    
            <li class="nav-item">
              <a class="nav-link" href="register.html">    sign up</a>
            </li>
    
            <li class="nav-item">
              <a class="nav-link" href="login.php">    ログイン</a>
            </li>
    
            <li class="nav-item">
              <a class="nav-link" href="login.php">    ログアウト</a>
            </li>
    
          </ul>
      </nav>

  <nav class="navbar navbar-default navinavi">
    <a class="navbar-brand">投稿一覧</a>      <a href="toukou.php?id=<?=$thread_id?>" class="toukou">投稿する</a>


      <div class="container-fluid">
        <div class="navbar-header navinavi">
        </div>
      </div>
    </nav>

    <div class="container">

    <?=$view?>
    <a href="toukou.php?id=<?=$thread_id?>" class="toukou">投稿する</a>

    </div>

  


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  
</body>
</html>