<?php
  session_start();
  $my_id = $_SESSION["id"];
  include("funcs.php");
  loginCheck();
  $pdo = nagiConnect();
  $stmt = $pdo->prepare("SELECT * FROM friend_table WHERE my_id=:my_id OR you_id=:my_id");
  $stmt->bindValue(':my_id', $my_id, PDO::PARAM_INT);
  $status = $stmt->execute();
  $view = "";
if ($status = false) {
    $error = $stmt->errorinfo();
    exit("QueryError: " . $error[2]);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $view .= '<div class="panel panel-warning">
      <div class="panel-heading"><span>'.$result["nitiji"].'</span></div>
      <div class="panel-body">'.$result["chat_text"].'</div>
      </div>';

    }
}
?>