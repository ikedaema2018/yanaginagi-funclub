<?php
  session_start();
  $you_id = $_GET["id"];
  $my_id = $_SESSION["id"];
  include("funcs.php");
  loginCheck();
  $pdo = nagiConnect();
  $stmt = $pdo->prepare("SELECT * FROM chat_table WHERE my_id=:my_id AND you_id=:you_id OR my_id=:you_id AND you_id = :my_id");
  $stmt->bindValue(':my_id', $my_id, PDO::PARAM_INT);
  $stmt->bindValue(':you_id', $you_id, PDO::PARAM_INT);
  $status = $stmt->execute();
  $view = "";
if ($status = false) {
    $error = $stmt->errorinfo();
    exit("QueryError: " . $error[2]);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $view .= '<div class="panel panel-warning">
      <div class="panel-heading"><span>'.$result["nitiji"].'</span></div>
      <div class="panel-body">'.$result["chat_text"].'</div>
      </div>';

    }
}
?>

<?php
$stmt2 = $pdo->prepare('SELECT * FROM user_table WHERE id=:you_id');
$stmt2->bindValue(':you_id', $you_id, PDO::PARAM_INT);
$status2 = $stmt2->execute();
if($status2 = false){
  $error2 = $stmt2->errorinfo();
  exit("QueryError: ".$error2[2]);
} else {
$result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
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

  <title>チャット</title>

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
    <a class="navbar-brand"><?=$result2["nickname"]?>さんとのチャット</a>      <a></a>


      <div class="container-fluid">
        <div class="navbar-header navinavi">
        </div>
      </div>
    </nav>

    <div class="container">
      <?php echo $view ?>
    </div>
    <div class="absolute bottom right">
      <div class="container">
        <form action="chat_act.php" method="post">
          <div  class="form-group row">
            <input class="form-control col-sm-11" type="text" name="chat">
            <input type="hidden" value="<?=$you_id?>" name="you_id">
            <button class="col-sm-1">送信する</button>
          </div>
        </form>
      </div> 
      </div>

  


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  
</body>
</html>