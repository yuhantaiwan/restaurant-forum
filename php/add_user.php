<?php
require_once "db.php";
require_once "function.php";
$result = add_user($_POST["username"], $_POST["email"], $_POST["password"]);
if($result) {
  echo "yes";
} else {
  echo "no";
}
?>