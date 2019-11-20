<?php
require_once "php/db.php";
require_once "php/function.php";
$datas = get_all_restaurants();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.css">
    <title>餐廳評論網</title>
  </head>
  <body>
    <?php include_once "header.php"; ?>  
      
      <div class="container">
        <!-- region_menu -->
        <div class="row mt-3 justify-content-center">
          <ul class="nav nav-pills" id="region_menu">
            <li class="nav-item">
              <a class="nav-link region_nav active" href="index.php">總覽</a>
            </li>
          </ul>
        </div>
        <!-- cards -->
        <div class="row" id="food-cards">
          <?php if(!empty($datas)): ?>
            <?php foreach($datas as $row): ?>
              <div class="col-md-4">
                <div class="card">
                  <img src="<?php echo $row["image_path"]?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row["name"]?></h5>
                    <p class="card-text mb-3"><?php echo $row["description"]?></p>
                    <a href="restaurant.php?i=<?php echo $row["data_id"];?>" class="btn btn-primary btn-block">看更多</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>

    <?php include_once "footer.php"; ?> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/register.js"></script>
    <script src="js/region.js"></script>
  </body>
</html>