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
  default:
    $index = 0;
    break;
}
?>

<section class="header">
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <i class="fas fa-utensils text-white mr-2"></i>
    <a class="navbar-brand" href="index.php">餐廳評論網</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="btn btn-primary btn-sm mr-2" href="#" data-toggle="modal" data-target="#registerModal">註冊</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-primary btn-sm" href="#" data-toggle="modal" data-target="#loginModal">登入</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- loginModal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header table-secondary">
          <h4 class="modal-title" id="loginModalLabel">會員登入</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form id="login_form" class="needs-validation-login" novalidate>
            <div class="modal-body">
              <div class="form-group">
                <label for="login_email">帳號</label>
                <input type="email" class="form-control" id="login_email" name="login_email" placeholder="* Email" required="">
              </div>
              <div class="form-group">
                <label for="login_password">密碼</label>
                <input type="password" class="form-control" id="login_password" name="login_password" placeholder="* 密碼" required="">
              </div>
            </div>
            <div class="modal-footer d-flex">
              <a href="#" data-toggle="modal" data-target="#registerModal" class="mr-auto" data-dismiss="modal">尚未註冊</a>
              <button type="reset" class="btn btn-secondary" data-dismiss="modal">取消</button>
              <button type="submit" class="btn btn-primary">送出</button>
            </div>
          </form>
      </div>
    </div>
  </div>

  <!-- registerModal -->
  <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header table-secondary text-center">
          <h4 class="modal-title" id="registerModalLabel">會員註冊</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="register_form">
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <h5>會員條款</h5>
                  <p>1. 地上輕鬆為你至少失敗人才少年開通影視，自己的則是特價天天傢。</p>
                  <p>2. 接收文學好看性質貼圖告訴我遊客，附件觀念公共複製圖文，一半。</p>
                  <p>3. 配置手段由此停止資產門，裝備現實參考所謂看來音樂網，全國作。</p>
                  <p>4. 笑道當地給予理念空氣通用批評，政策方案運用文化我會春節小學。</p>
                  <p>5. 背後專門焦點從事設為信息化，登陸尤其是有所統一討，風險已經。</p>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="register_username">姓名</label>
                    <input type="text" class="form-control" id="register_username" name="register_username" placeholder="* 姓名" required>
                  </div>
                  <div class="form-group">
                    <label for="register_email">帳號</label>
                    <input type="email" class="form-control" id="register_email" aria-describedby="emailHelp" placeholder="* 輸入Email" required>
                  </div>
                  <div id="register_email_msg"></div>
                  <div class="form-group">
                    <label for="register_password">密碼</label>
                    <input type="password" class="form-control" id="register_password" name="register_password" placeholder="* 密碼" required>
                  </div>
                  <div id="register_password_msg"></div>
                  <div class="form-group">
                    <label for="confirm_password">確認密碼</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="* 確認密碼" required>
                  </div>
                  <div id="register_confirm_msg"></div>
                   <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                      <label class="form-check-label" for="invalidCheck">
                        同意會員條款
                      </label>
                      <div class="invalid-feedback">
                        你必須同意會員條款
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer d-flex">
            <a href="#" data-toggle="modal" data-target="#loginModal" class="mr-auto" data-dismiss="modal">已有帳號</a>
            <button type="reset" class="btn btn-secondary">取消</button>
            <button type="submit" class="btn btn-primary">送出</button>
          </div>
        </form>
      </div>
    </div>
  </div> 

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
          <a class="nav-link <?php echo ($index==1)?'active text-primary':'text-dark';?>" href="latest_news.php">最新動態</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($index==2)?'active text-primary':'text-dark';?>" href="popular.php">Top 10 人氣餐廳</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($index==3)?'active text-primary':'text-dark';?>" href="gourmet.php">美食達人</a>
        </li>
      </ul>
    </div>
  </div>
</section>