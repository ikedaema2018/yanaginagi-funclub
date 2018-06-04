<?php
include("funcs.php");
$pdo = nagiConnect();




//投票の集計
//エウアル
$stmt3 = $pdo->query("SELECT COUNT(*) FROM touhyou WHERE best='エウアル'");
foreach($stmt3 as $row1){
  $euaru = $row1['COUNT(*)'];
};
//ポリノミノ
$stmt2 = $pdo->query("SELECT COUNT(*) FROM touhyou WHERE best='ポリノミノ'");
foreach($stmt2 as $row){
  $porinomino = $row['COUNT(*)'];
};

$stmt3 = $pdo->query("SELECT COUNT(*) FROM touhyou WHERE best='Follow my track'");
foreach($stmt3 as $row2){
  $follow = $row2['COUNT(*)'];
};

$stmt4 = $pdo->query("SELECT COUNT(*) FROM touhyou WHERE best='ナッテ'");
foreach($stmt4 as $row3){
  $natte = $row3['COUNT(*)'];
};

//
// $status2 = $stmt2->execute();




// if ($status = false) {
//     $error = $stmt->errorinfo();
//     exit("QueryError: " . $error[2]);
// } else {
//     while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {}}








$stmt = $pdo->prepare("SELECT * FROM touhyou");

$status = $stmt->execute();


$view = "";
if ($status = false) {
    $error = $stmt->errorinfo();
    exit("QueryError: " . $error[2]);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '
    <div class="panel panel-success">
    <div class="panel-heading"><span>'.$result["name"].'さんは</span><span>「'.$result["best"].'」に投票しました。</span><span>'.$result["tttime"].'</span></div>
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
    crossorigin="anonymous">
  <link rel="stylesheet" href="./css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css?2">


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
<div class="alert alert-info" role="alert">投票しました</div>
  <!-- 投票結果のコンテナ -->
<div class="container">
  <div class="row">
    <div class=" col-sm-3">
      <div class="panel panel-default">
        <div class="panel-heading">エウアル  <?php echo '現在'.$euaru.'票'?></div>
        <div class="panel-body">
          <img class="h250" src="./image/euaru.jpeg" alt="">
          <p class="artist"></p>
          <p class="comment"></p>
        </div>
      </div>
    </div>

    <div class=" col-sm-3">
      <div class="panel panel-default">
        <div class="panel-heading">ポリノミノ <?php echo '現在'.$porinomino.'票'?></div>
        <div class="panel-body">
          <img class="h250" src="./image/porinomio.jpg" alt="">
          <p class="artist"></p>
          <p class="comment"></p>
        </div>
      </div>
    </div>

    <div class=" col-sm-3">
      <div class="panel panel-default">
        <div class="panel-heading">Follow my track <?php echo '現在'.$follow.'票'?></div>
        <div class="panel-body">
          <img class="h250" src="./image/Follow.jpg" alt="">
          <p class="artist"></p>
          <p class="comment"></p>
        </div>
      </div>
    </div>

    <div class=" col-sm-3">
      <div class="panel panel-default">
        <div class="panel-heading">ナッテ<?php echo '現在'.$natte.'票'?></div>
        <div class="panel-body">
          <img class="h250" src="./image/natte.jpg" alt="">
          <p class="artist"></p>
          <p class="comment"></p>
        </div>
      </div>
    </div>
  </div>
</div>


  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading page-title">投票ページ
        <a href="homepage.php">ホームページに戻る</a>
      </div>
      <div class="panel-body">
        <form method="post" action="touhyou_act.php">
          <div class="form-group">
            <p class="control-label">
              <b>一番好きなアルバムを選んでね！</b>
            </p>
            <div class="radio-inline">
            <label><input type="radio" value="エウアル" name="best">
              エウアル</label>
            </div>
            <div class="radio-inline">
            <label><input type="radio" value="ポリノミノ" name="best">
              ポリノミノ</label>
            </div>
            <div class="radio-inline">
            <label><input type="radio" value="Follow my track" name="best">
              Follow my track</label>
            </div>
            <div class="radio-inline">
            <label><input type="radio" value="ナッテ" name="best">
              ナッテ</label>
            </div>
          </div>   

            <div class="form-group">
              <label class="control-label">投稿したいコメントを入力してください</label>
              <input class="form-control" type="text" name="toukou" require>
            </div>
            <input name="thread_id" type="hidden" value="<?=$thread_id?>">
            <button class="btn btn-default">送信</button>
        </form>
        </div>
      </div>
    </div>
    <div class="container">
     <?=$view?>
    </div>
</body>