<?php
require_once "db.php";
require_once "function.php";

//判別有無在登入狀態
if(isset($_SESSION['is_login']) && $_SESSION['is_login']) {
  $result = leave_comment($_POST["comment"], $_POST["ratedIndex"]);
  if($result) {
    echo "yes";
  } else {
    echo "no";
  }
} else {
  echo "no";
}


?>