<?php
session_start();
include("funcs.php");
loginCheck();



if (
  strlen($_POST["chat"]) > 100 
) {
    exit('文字数が長いです。');
}


// UNIX TIMESTAMPを取得
$timestamp = time() ;
 
// date()で日時を出力
$nitiji = date( "Y/m/d H:i:s" , $timestamp ) ;

$my_id = $_SESSION["id"];
$you_id = $_POST["you_id"];
$chat_text = $_POST["chat"];


$pdo = nagiConnect();

$sql = "INSERT INTO chat_table(id,	my_id,	you_id,	nitiji,	chat_text)VALUES(NULL, :my_id, :you_id, :nitiji, :chat_text)";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':my_id', $my_id, PDO::PARAM_INT);
$stmt->bindValue(':you_id', $you_id, PDO::PARAM_INT);
$stmt->bindValue(':nitiji', $nitiji, PDO::PARAM_STR);
$stmt->bindValue(':chat_text', $chat_text, PDO::PARAM_STR);

$status = $stmt->execute();

if($status==false){
  $error = $stmt->errorinfo();
  exit("QueryError: ".$error[2]);
}else{
  header("Location: chat_room.php?id=".$you_id);
}



?>