<?php
session_start();
$cleardb_url      = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server   = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db       = substr($cleardb_url["path"],1);

$hostname = $cleardb_server;
$dbuser = $cleardb_username;    
$dbpw = $cleardb_password;      
$dbname = $cleardb_db;          

// $hostname = "localhost";
// $dbuser = "admin";
// $dbpw = "123456";
// $dbname = "forum";

$_SESSION["conn"] = mysqli_connect($hostname, $dbuser, $dbpw, $dbname);
if($_SESSION["conn"]) {
  mysqli_query($_SESSION["conn"], "SET NAMES UTF8");
  // echo "已正確連線";
} else {
  echo "資料庫連線錯誤：". mysqli_connect_error();
}
?>