<?php
session_start();
  $you_id = $_GET["id"];
  $my_id = $_SESSION["id"];
  include("funcs.php");
  loginCheck();
  $pdo = nagiConnect();
  $stmt = $pdo->prepare("SELECT COUNT(*) FROM friend_table WHERE my_id=:my_id AND you_id=:you_id OR my_id=:you_id AND you_id = :my_id");
  $stmt->bindValue(':my_id', $my_id, PDO::PARAM_INT);
  $stmt->bindValue(':you_id', $you_id, PDO::PARAM_INT);
  $status = $stmt->execute();
  if ($status = false) {
    $error = $stmt->errorinfo();
    exit("QueryError: " . $error[2]);
} else {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result['cnt']>0) {
      echo "すでに友達登録をしているユーザーです。";
    } else {
      $sql2 = "INSERT INTO friend_table(id,	my_id,	you_id)VALUES(NULL, :my_id, :you_id)";
$stmt2 = $pdo->prepare($sql2);

$stmt2->bindValue(':my_id', $my_id, PDO::PARAM_INT);
$stmt2->bindValue(':you_id', $you_id, PDO::PARAM_INT);
$status2 = $stmt2->execute();

if($status2==false){
  $error2 = $stmt2->errorinfo();
  exit("QueryError: ".$error2[2]);
}else{
  header("Location: user_itiran.php");
}

    }
}
  ?>