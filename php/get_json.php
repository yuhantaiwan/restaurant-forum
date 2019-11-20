<?php
require_once "db.php";
header('Access-Control-Allow-Origin: *'); 
header("Content-Type: text/json; charset=utf-8");

$json = file_get_contents('http://data.coa.gov.tw/Service/OpenData/ODwsv/ODwsvTravelFood.aspx');
echo $json;
?>