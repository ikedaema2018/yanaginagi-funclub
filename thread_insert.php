

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
      </ul>
  </nav>
	<!-- <form method="post" action="" enctype="multipart/form-data">		
		<input type="file" name="upload_file">
		<div>
			<input type="submit" name="btn_submit" value="送信">
		</div>
  </form> -->
  
  <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading page-title">新規スレッド作成<a href="homepage.php">スレッドに戻る</a></div>
        <div class="panel-body">
          <form method="post" action="thread_act.php" enctype="multipart/form-data">
            <div class="form-group">
              <label class="control-label">スレッドタイトルを入力してください</label>
              <input class="form-control" type="text" name="title">
            </div>

            <div class="form-group">
              <label class="control-label">画像を入力してください</label>
              <input type="file" name="upload_image">
            </div>
            
            <button class="btn btn-default">送信</button>
          </form>
        </div>
      </div>
    </div>
</body>
</html>