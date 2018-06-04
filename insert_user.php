<?php

if (
  strlen($_POST["user_id"]) > 12 ||
  strlen($_POST["pass"]) > 16 ||
  strlen($_POST["user_id"]) > 16 ||
  strlen($_POST["song"]) > 30 ||
  strlen($_POST["love"]) > 100
) {
    exit('文字数が長いです。');
}

class User {
  public $user_id;
  public $pass;
  public $nickname;
  public $song;
  public $love;
}

$user = new User;
$user->user_id = $_POST["user_id"];
$user->pass = $_POST["pass"];
$user->nickname = $_POST["nickname"];
$user->song = $_POST["song"];
$user->love = $_POST["love"];
?>





<?php
include("funcs.php");
$pdo = nagiConnect();

$sql = "INSERT INTO user_table(id, user_id, pass, nickname, song, love, kanri_flag)VALUES(NULL, :user_id, :pass, :nickname,:song, :love, 0)";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':user_id', $user->user_id, PDO::PARAM_STR);
$stmt->bindValue(':pass', $user->pass, PDO::PARAM_STR);
$stmt->bindValue(':nickname', $user->nickname, PDO::PARAM_STR);
$stmt->bindValue(':song', $user->song, PDO::PARAM_STR);
$stmt->bindValue(':love', $user->love, PDO::PARAM_STR);

$status = $stmt->execute();

if($status==false){
  $error = $stmt->errorinfo();
  exit("QueryError: ".$error[2]);
}else{
  header("Location: login.php");
}
?>