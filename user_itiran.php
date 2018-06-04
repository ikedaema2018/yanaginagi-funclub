<?php
session_start();
include("funcs.php");
loginCheck();
$pdo = nagiConnect();
$stmt = $pdo->prepare("SELECT * FROM user_table");
$status = $stmt->execute();


$view = "";
if ($status = false) {
    $error = $stmt->errorinfo();
    exit("QueryError: " . $error[2]);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $view .= '<tr><td>'.$result["id"].'</td><td>'.$result["nickname"].'</td><td>'.$result["song"].'</td><td>'.$result["love"].'</td><td><a href="chat_room.php?id='.$result["id"].'">チャット開始</a></td></tr>';

    }
}
?>
      <!-- $view .= '<tr><td>'.$result["id"].'</td><td>'.$result["nickname"].'</td><td>'.$result["song"].'</td><td>'.$result["love"].'</td></tr>'; -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">


  <title>やなぎなぎファンクラブ</title>

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

  <div class="container">
    <div class="panel panel-danger">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr><th>id</th><th>ニックネーム</th><th>好きな曲</th><th>一言</th><th>チャットをする</th></tr>
          </thead>
            <tbody>
            <?php echo $view ?>
            </tbody>
           
          </thead>
        </table>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</body>
</html>
