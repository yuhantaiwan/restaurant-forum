<?php
require_once "db.php";
require_once "function.php";
$result = check_has_email($_POST["email"]);
if($result) {
  echo "yes";
} else {
  echo "no";
}
?>