<?php 
require_once "db.php";
require_once "function.php";

$result = del_member($_POST["id"]);
if($result) {
  echo "yes";
} else {
  echo "no";
}
?>