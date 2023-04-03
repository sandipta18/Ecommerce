<?php
require_once 'Classes/UserClass.php';
require_once 'fetchdata.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/index.css">
  <title>Home Page</title>
</head>

<body>

  <div class="container">
    <div class="sticky-sidebar">
      <div class="sidebar">
        <label>
          <h3>Sort Items</h3>
        </label>
        <div class="form-group custom-control custom-radio ">
          <form action="sort.php" method="POST" enctype="multipart/form-data">
            <input type="radio" id="Healthy" name="Products" class="custom-control-input" value="Healthy">
            <label class="custom-control-label" for="Healthy">Healthy</label>
        </div>
        <div class="form-group custom-control custom-radio ">
          <input type="radio" id="Unhealthy" name="Products" class="custom-control-input" value="Unhealthy">
          <label class="custom-control-label" for="Unhealthy">Unhealthy</label>
        </div>
        <input type="submit">
        </form>
        <form method="POST" action="buy.php">
          <input type="hidden" value="" id="card_one" name="card_one" />
          <input type="hidden" value="" id="card_two" name="card_two" />
          <input type="hidden" value="" id="card_three" name="card_three" />
          <input type="hidden" value="" id="card_four" name="card_four" />
          <input type="hidden" value="" id="card_five" name="card_five" />
          <input type="submit" value="Buy Items" id="final" class="btn btn-primary btn-lg" />
        </form>
      </div>
    </div>
  </div>
  <?php
  for ($i = 0; $i < count($array); $i++) { ?>
    <section id="posts-container">
      <article class="post">
        <div class="post__content<?php echo $array[$i]['id']; ?>" id="post_div">
          <header class="post__header">
            <p class="post__user">
              <?php echo $array[$i]['name']; ?>
            </p>
          </header>
          <div class="post__body">
            <p class="caption">
              <i class="fa fa-inr"></i> <?php echo $array[$i]['price']; ?>
            </p>
            <img class="post__img" id="post_image" src="<?php echo $array[$i]['Image']; ?>" alt="">
          </div>
          <div class="post__footer">
            <span>
              <?php

              ?>
            </span>
            <span>
              <?php

              ?>
            </span>
            <button type="button" class="btn btn-warning compareBtn" rel="<?php echo $array[$i]['id']; ?>">
              Buy Product
            </button>
          </div>

        </div>

      </article>
    </section>
  <?php } ?>
  <script src="js/buy.js"></script>
</body>


</html>
