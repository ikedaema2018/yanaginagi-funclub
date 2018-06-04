<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/bootstrap-reboot.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/bootstrap.css">
  <link rel="stylesheet" href="./css/jquery-2.1.3.min.js">
  <link rel="stylesheet" href="./js/bootstrap.js">
  <title>Document</title>
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
<div class="alert alert-danger" role="alert">ユーザーIDかパスワードが間違っています</div>
<div class="container jumbotron top-30r">
  <h1 class="display-5 border-bottom bottom-30">ログイン</h1>
  <form method="post" action="login_act.php">
    <div class="form-group">
      <label>ユーザーID</label>
      <input type="text" class="form-control" placeholder="ユーザーID" name="lid">
    </div>
    <div class="form-group">
      <label>パスワード</label>
      <input type="password" class="form-control" placeholder="パスワード" name="lpw">
    </div>
    <button type="submit" class="btn btn-default">送信</button>
  </form>
</div>
  
</body>
</html>