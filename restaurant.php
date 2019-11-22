<?php 
require_once "php/db.php";
require_once "php/function.php";
$data = get_restaurant($_GET["i"]);
$comments = show_comments($_GET["i"]);
$avg = show_store_rating($_GET["i"]);
$integer = floor($avg);
$decimal = substr($avg, -1);
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
    <section class="restaurant pt-3">
      <div class="container">
        <h1 class="text-center py-2"><?php echo $data["name"]; ?></h1>
        <div class="row py-2">
          <div class="col-md-5">
            <img src="<?php echo $data["image_path"]; ?>" alt="" class="store_pic">
          </div>
          <div class="col-md-7">
            <div class="info">
              <ul>
                <li>地址： <?php echo $data["address"]; ?>
                <a href="https://www.google.com.tw/maps/place/ <?php echo $data["address"];?>" target="_blank">
                  <i class="fas fa-map-marker-alt ml-2 text-danger"></i>
                </a>
                </li>
                <li>電話： <?php echo $data["tel"]; ?></li>
                <li>付款方式： <?php echo ($data["creditcard"]=="True")?"信用卡/現金":"現金"; ?></li>
                <li class="mt-1">
                  <?php if($avg):?>
                    <span class="store_avg"><?php echo $avg?></span>
                    <?php for($a=1; $a<=$integer; $a++) {
                      echo '<i class="fas fa-star store_get_star"></i>';
                    } 
                      if($decimal>=4 && $decimal<=7) {
                        echo '<i class="fas fa-star-half-alt store_get_star"></i>';
                        for($a=0; $a<=3-$integer; $a++) {
                          echo '<i class="fas fa-star store_no_star"></i>';
                        }
                      } elseif($decimal>=8) {
                        echo '<i class="fas fa-star store_get_star"></i>';
                        for($a=0; $a<=3-$integer; $a++) {
                          echo '<i class="fas fa-star store_no_star"></i>';
                        }
                      } elseif($decimal<=3) {
                        for($a=0; $a<=4-$integer; $a++) {
                          echo '<i class="fas fa-star store_no_star"></i>';
                        }
                      }
                    ?>

                  <?php else: ?>
                    <?php for($b=1; $b<=5; $b++) {
                            echo '<i class="fas fa-star store_no_star"></i>';
                          } ?>
                  <?php endif;?>
                  <span class="store_comments"><?php echo "共".count($comments)."則評論"; ?></span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row py-3">
          <div class="col-md-12">
            <p><?php echo $data["description"]; ?></p>
          </div>
        </div>
      </div>
    </section>
    
    <section class="comment">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-info" role="alert">
              請登入以留下您的評論
            </div>
            <ul class="list-group list-group-flush">
              <hr />
              <?php if($comments):?>
                <?php foreach($comments as $comment):?>
                  <li class="list-group-item">
                    <i class="fas fa-user-circle mr-2"></i>
                    <h6 class="comment_username mb-2"><?php echo $comment["user_name"];?></h6>
                    <p class="comment_rating">
                      <?php for($i=1; $i<=$comment["rating"]; $i++) {
                        echo '<i class="fas fa-star rated_star"></i>';
                      }
                        if($comment["rating"]!=5) {
                          for($j=1; $j<=5-$comment["rating"]; $j++) {
                            echo '<i class="fas fa-star gray_star"></i>';
                          }
                      } ?>
                    </p>
                    <p class="comment_content mb-2"><?php echo $comment["content"];?></p>
                    <p class="comment_time"><?php echo $comment["time"];?></p>
                  </li>
                <?php endforeach;?>
              <?php else:?>
                <li class="list-group-item">
                  <h5 class="mb-3">尚無評論</h5>
                </li>
              <?php endif;?>
            </ul>
          </div>
        </div>
      </div>
    </section>

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