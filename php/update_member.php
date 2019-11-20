<?php 
require_once "db.php";
require_once "function.php";

$password = null;   // 預設password為null(沒有修改)
if(isset($_POST["password"])) {
  $password = $_POST["password"];
}
$result = update_member($_POST["id"], $_POST["username"], $password);
if($result) {
  echo "yes";
} else {
  echo "no";
}
?>