<?php
session_start();
include("funcs.php");
loginCheck();

if($_SESSION["kanri_flag"] != 0){
  header("Location: touhyou_error.php");
}

if (
  strlen($_POST["toukou"]) > 100 
) {
    exit('文字数が長いです。');
}


$best = $_POST["best"];
$comment = $_POST["toukou"];
$name = $_SESSION["nickname"];
// UNIX TIMESTAMPを取得
$timestamp = time() ;
 
// date()で日時を出力
$tttime = date( "Y/m/d H:i:s" , $timestamp ) ;




$pdo = nagiConnect();

$sql = "INSERT INTO touhyou(id,	best,	name,	tttime,	comment)VALUES(NULL, :best, :name, :tttime,:comment)";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':best', $best, PDO::PARAM_STR);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':tttime', $tttime, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

$status = $stmt->execute();

//管理フラグを1に



// session_start();


$sql2 = 'UPDATE user_table SET kanri_flag=1 WHERE nickname=:nickname';
$stmt2 = $pdo->prepare($sql2);
$stmt2->bindValue(':nickname',  $name,  PDO::PARAM_STR);    
$status2 = $stmt2->execute();

if($status2==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error2 = $stmt2->errorInfo();
  exit("QueryError:".$error2[2]);

}


if($status==false){
  $error = $stmt->errorinfo();
  exit("QueryError: ".$error[2]);
}else{
  header("Location: touhyou_after.php");
}
?>