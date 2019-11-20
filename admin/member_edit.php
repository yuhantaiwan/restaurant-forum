<?php
require_once "../php/db.php";
//如過沒有 $_SESSION['is_login'] 這個值，或者 $_SESSION['is_login'] 為 false 都代表沒登入
if(!isset($_SESSION["is_login"]) || !$_SESSION["is_login"]) {
  echo "
  <script>
    alert('請先登入！');
    window.location.href='../index.php';
  </script>";
}
require_once "../php/function.php";
$data = get_member($_GET["i"]);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>餐廳評論網--後台</title>
  </head>
  <body>
    <?php include_once "header.php"; ?>  

    
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h4 class="my-3">會員編輯</h4>
          <form id="update_form">
            <input type="hidden" id="update_id" value="<?php echo $data['id'];?>">
            <div class="form-group">
              <label for="register_username">姓名</label>
              <input type="text" class="form-control" id="update_username" name="update_username" placeholder="* 姓名" value="<?php echo $data['username'];?>" required>
            </div>
            <div class="form-group">
              <label for="update_email">帳號</label>
              <input type="email" class="form-control" id="update_email" aria-describedby="emailHelp" placeholder="* 輸入Email" value="<?php echo $data['email'];?>" disabled>
            </div>
            <div id="update_email_msg"></div>
            <div class="form-group">
              <label for="update_password">密碼</label>
              <input type="password" class="form-control" id="update_password" name="update_password" placeholder="* 密碼">
            </div>
            <div id="update_password_msg"></div>
            <div class="form-group">
              <label for="confirm_password">確認密碼</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="* 確認密碼">
            </div>
            <div id="update_confirm_msg"></div>
            <div class="d-flex">
              <span class="mr-auto"></span>
              <button type="reset" class="btn btn-secondary mr-2">取消</button>
              <button type="submit" class="btn btn-primary">修改</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    
    <?php include_once "../footer.php"; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/update_member.js"></script>
  </body>
</html>