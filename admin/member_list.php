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
$datas = get_all_members();
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

    <div class="container mt-3">
      <div class="row">
        <div class="col-md-12">
          <a href="member_add.php" class="btn btn-outline-success mb-3">新增會員</a>
        </div>
        <div class="col-md-12">
          <table class="table table-hover table-sm">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if($datas):?>
                <?php foreach($datas as $data):?>
                  <tr>
                    <td><?php echo $data["id"];?></td>
                    <td><?php echo $data["username"];?></td>
                    <td><?php echo $data["password"];?></td>
                    <td><?php echo $data["email"];?></td>
                    <td>
                      <a href="member_edit.php?i=<?php echo $data['id'];?>" class="btn btn-info btn-sm mr-1">編輯</a>
                      <a href="javascript:void(0);" class="btn btn-danger btn-sm del_button" data-id="<?php echo $data['id']?>">刪除</a>
                    </td>
                  </tr>
                <?php endforeach;?>
              <?php endif;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
    <?php include_once "../footer.php"; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/register.js"></script>
    <script>
      $(function() {
        $(".del_button").on("click", delMember);
      });

      function delMember($id) {
        let c = confirm("確定要刪除嗎？");
        let this_tr = $(this).parent().parent();
        if(c) {
          $.ajax({
            type: "POST",
            url: "../php/del_member.php",
            data: {id: $(this).attr("data-id")},
            success: function(data) {
              if(data == "yes") {
                alert("刪除成功！");
                this_tr.remove();
                location.reload();
              } else {
                alert("刪除失敗！");
                console.log(data);
              }
            },
            error: function(jqXHR, textStatus, errorThrown) {
              alert("ajax傳送資料失敗！");
              console.log(jqXHR.responseText);
            } 
          });
        }
        return false;
      }
    </script>
  </body>
</html>