<?php
session_start();
$hostname = "localhost";
$dbuser = "admin";
$dbpw = "123456";
$dbname = "forum";

$_SESSION["conn"] = mysqli_connect($hostname, $dbuser, $dbpw, $dbname);
if($_SESSION["conn"]) {
  mysqli_query($_SESSION["conn"], "SET NAMES UTF8");
  // echo "已正確連線";
} else {
  echo "資料庫連線錯誤：". mysqli_connect_error();
}
?>