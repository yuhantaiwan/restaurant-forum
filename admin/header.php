<?php
$current_file = $_SERVER["PHP_SELF"];     // 透過$_SERVER['PHP_SELF']先取得路徑
$current_file = basename($current_file, ".php");      // 由basename取得檔案名稱，並去掉".php" 副檔名稱

switch($current_file) {
  case "latest_news":
    $index = 1;
    break;
  case "popular":
    $index = 2;
    break;
  case "gourmet":
    $index = 3;
    break;
  case "member_list":
  case "member_add":
  case "member_edit":
    $index = 4;
    break;
  default:
    $index = 0;
    break;
}
?>

<section class="header">
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <i class="fas fa-utensils text-white mr-2"></i>
    <a class="navbar-brand" href="index.php">餐廳評論網--後台</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="btn btn-outline-primary btn-sm" href="../php/logout.php">登出</a>
        </li>
      </ul>
    </div>
  </nav>


  <!-- jumbotron -->
  <div class="jumbotron jumbotron-fluid jumbotron-bg text-white">
    <div class="container">
      <h1 class="display-4 mb-3">臺灣農村美食</h1>
      <p class="lead">臺灣在地好滋味</p>
    </div>
  </div>
 
  <div class="container">
    <!-- nav-tabs -->
    <div class="row">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link <?php echo ($index==0)?'active text-primary':'text-dark';?>" href="index.php">餐廳</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($index==1)?'active text-primary':'text-dark';?>" href="../latest_news.php">最新動態</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($index==2)?'active text-primary':'text-dark';?>" href="../popular.php">Top 10 人氣餐廳</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($index==3)?'active text-primary':'text-dark';?>" href="../gourmet.php">美食達人</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($index==4)?'active text-primary':'text-dark';?>" href="member_list.php">會員列表</a>
        </li>
      </ul>
    </div>
  </div>
</section>