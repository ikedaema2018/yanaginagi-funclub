<?php
$thread_id = $_GET["id"];
session_start();
?>








<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/style.css">
<title>新規スレッド作成</title>
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
  
  <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading page-title">投票ページ<a href="comment.php?id=<?=$thread_id?>">スレッドに戻る</a></div>
        <div class="panel-body">
          <form method="post" action="toukou_act.php">
            
            <div class="form-group">
              <label class="control-label">コメントを入力してください</label>
              <input class="form-control" type="text" name="toukou" require>
            </div>
            <input name="thread_id" type="hidden" value="<?=$thread_id?>">
            <button class="btn btn-default">送信</button>
          </form>
        </div>
      </div>
    </div>
</body>
</html>