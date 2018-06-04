<?php

if (is_uploaded_file($_FILES["upload_image"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["upload_image"]["tmp_name"], "image/" . $_FILES["upload_image"]["name"])) {
    chmod("image/" . $_FILES["upload_image"]["name"], 0644);
    echo $_FILES["upload_image"]["name"] . "をアップロードしました。";
  } else {
    echo "ファイルをアップロードできません。";
  }
} else {
  echo "ファイルが選択されていません。";
}


//ポストされた値を代入
$title = $_POST["title"];
$image = $_FILES["upload_image"]["name"];


session_start();
include("funcs.php");
loginCheck();
$pdo = nagiConnect();

$sql = "INSERT INTO naginagi_thread(id, title, image)VALUES(NULL, :title, :image)";
$stmt = $pdo->prepare($sql);


$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':image', $image, PDO::PARAM_STR);

$status = $stmt->execute();




if($status==false){
  $error = $stmt->errorinfo();
  exit("QueryError: ".$error[2]);
}else{
  header("Location: itiran.php");
}


?>