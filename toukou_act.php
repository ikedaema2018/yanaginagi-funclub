<?php
session_start();
include("funcs.php");
loginCheck();

if (
  strlen($_POST["toukou"]) > 100 
) {
    exit('文字数が長いです。');
}

class Toko {
  public $thread_id;
  public $toukou;
  public $nickname;
  public $restime;
}

$toko = new Toko;
$toko->thread_id = $_POST["thread_id"];
$toko->toukou = $_POST["toukou"];
$toko->nickname = $_SESSION["nickname"];
// UNIX TIMESTAMPを取得
$timestamp = time() ;
 
// date()で日時を出力
$toko->restime = date( "Y/m/d H:i:s" , $timestamp ) ;




$pdo = nagiConnect();

$sql = "INSERT INTO all_comment(id, thread_id, name, res_time, comment)VALUES(NULL, :thread_id, :name, :restime,:comment)";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':thread_id', $toko->thread_id, PDO::PARAM_INT);
$stmt->bindValue(':restime', $toko->restime, PDO::PARAM_STR);
$stmt->bindValue(':name', $toko->nickname, PDO::PARAM_STR);
$stmt->bindValue(':comment', $toko->toukou, PDO::PARAM_STR);

$status = $stmt->execute();

if($status==false){
  $error = $stmt->errorinfo();
  exit("QueryError: ".$error[2]);
}else{
  header("Location: comment.php?id=$toko->thread_id");
}
?>