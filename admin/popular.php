<?php 
require_once "../php/db.php";
if(!isset($_SESSION["is_login"]) || !$_SESSION["is_login"]) {
  echo "
  <script>
    alert('請先登入！');
    window.location.href='../index.php';
  </script>";
}
require_once "../php/function.php";
$ranks = show_ranks();
// print_r($ranks);
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
    <link rel="stylesheet" href="../css/all.css">

    <title>餐廳評論網</title>
  </head>
  <body>
    <?php include_once "header.php"; ?>
    <section class="rank py-3">
        <div class="container">
            <h1 class="text-center py-2">Top10 人氣餐廳</h1>
            <?php for($i=0; $i<=9; $i++) {
                echo '<div class="row mt-2">
                <div class="col-md-4">
                    <img src="'.$ranks[$i]["image_path"].'" alt="">
                </div>
                <div class="col-md-8">
                    <h3 class="rank_name">'.$ranks[$i]["name"].'<span class="badge badge-pill badge-warning ml-2 rank_score">'.$ranks[$i]["avg_rating"].'</span></h3>
                    <p class="rank_text mt-1">'.$ranks[$i]["description"].'</p>
                    <a href="restaurant.php?i='.$ranks[$i]["data_id"].'" class="btn btn-secondary mt-2 rank_link">看更多</a>
                </div>
            </div>';
            } 
            ?>
        </div>
    </section>
    <?php include_once "../footer.php"; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>