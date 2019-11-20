<?php
require_once "db.php";
require_once "function.php";
$result = verify_user($_POST["email"], $_POST["password"]);
if($result) {
  echo "yes";
} else {
  echo "no";
}
?>