<?php
require_once "db.php";
header('Access-Control-Allow-Origin: *'); 
header("Content-Type: text/json; charset=utf-8");

$text = file_get_contents('http://data.coa.gov.tw/Service/OpenData/ODwsv/ODwsvTravelFood.aspx');
$tt = mb_convert_encoding($text, 'UTF-8', mb_detect_encoding($text, 'UTF-8, big5', true));
// echo $text;
$array = json_decode($text, true);
// echo $array;

foreach($array as $key => $value) {
  $sql = "INSERT INTO restaurant set
          data_id = '".$value['ID']."',
          name = '".$value['Name']."',
          address = '".$value['Address']."',
          city = '".$value['City']."',
          town = '".$value['Town']."',
          tel = '".$value['Tel']."',
          image_path = '".$value['PicURL']."',
          description = '".$value['FoodFeature']."',
          creditcard = '".$value['CreditCard']."',
          travelcard = '".$value['TravelCard']."';";

  $result = mysqli_query($_SESSION["conn"], $sql);
}

if($result) {
  echo "資料新增成功！";
} else {
  echo "資料新增失敗！";
}
?>