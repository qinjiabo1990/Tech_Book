<!DOCTYPE html>
<html>
  <head>
    <title>Tech Book</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/index.js" type="text/javascript"></script>
    <?php
    include('templates/header.php');
    include('templates/nav.php');
    $sql = "SELECT * FROM BOOK_INFO";
    $re = 0;
    $get_result = array();
    if($result = mysqli_query($conn, $sql)){
      if (mysqli_num_rows($result) > 0) {
          // output data
          while ($re < mysqli_num_rows($result)){
            $row = mysqli_fetch_assoc($result);
            $get_bookname[$re] = $row["Bookname"];
            $get_image[$re] = $row["Image"];
            $get_author[$re] = $row["Author"];
            $get_price[$re] = $row["Price"];
            $get_ID[$re] = $row["Book_ID"];
            $re += 1;
          }
        }
      }
    ?>

    <!--Body-->
    <div class="container" style="margin-top:30px">
      <!--Banner
        Author: W3schooles
        Website: https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_theme_band_complete&stacked=h
        Last accessed date: 25-5-2018
        Function: slide images-->
    <div class="slideshow-container">
      <div class="mySlides">
        <a class="navbar-brand mr-sm-0" href="contact_us.php">
          <img src="images/1.png" style="width:100%">
        </a>
      </div>

      <div class="mySlides">
        <a class="navbar-brand mr-sm-0" href="video.php">
          <img src="images/2.png" style="width:100%">
        </a>
      </div>

      <div class="mySlides">
          <img src="images/3.png" style="width:100%">
      </div>

      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <!--Product-->
    <article style="padding-top: 50px;">
      <div class="row">
        <div class="col" style="width: 18rem;">
          <img class="card-img-top" style="width: 12rem; height:15rem; margin-left:1rem" src="<?php echo $get_image[0] ?>" alt="Card image cap" /><!--image size: 240x300-->
          <div class="card-body">
            <h5 class="card-title"><?php echo $get_bookname[0] ?></h5>
            <p class="card-text">Author: <?php echo $get_author[0] ?></p>
            <p class="card-text" style="font-weight:bold; ">$ <?php echo $get_price[0] ?></p>
            <form method="post" action="product.php">
              <input type="hidden" name="input" value="<?php echo $get_ID[0]?>" />
              <input type="submit" class="btn btn-primary" value="SHOP NOW" />
            </form>
          </div>
        </div>

        <div class="col" style="width: 18rem;">
          <img class="card-img-top" style="width: 12rem; height:15rem; margin-left:1rem" src="<?php echo $get_image[1] ?>" alt="Card image cap" />
          <div class="card-body">
            <h5 class="card-title"><?php echo $get_bookname[1] ?></h5>
            <p class="card-text">Author: <?php echo $get_author[1] ?></p>
            <p class="card-text" style="font-weight:bold; ">$ <?php echo $get_price[1] ?></p>
            <form method="post" action="product.php">
              <input type="hidden" name="input" value="<?php echo $get_ID[1]?>" />
              <input type="submit" class="btn btn-primary" value="SHOP NOW" />
            </form>
          </div>
        </div>

        <div class="col" style="width: 18rem;">
          <img class="card-img-top" style="width: 12rem; height:15rem; margin-left:1rem" src="<?php echo $get_image[2] ?>" alt="Card image cap" />
          <div class="card-body">
            <h5 class="card-title"><?php echo $get_bookname[2] ?></h5>
            <p class="card-text">Author: <?php echo $get_author[2] ?></p>
            <p class="card-text" style="font-weight:bold; ">$ <?php echo $get_price[2] ?></p>
            <form method="post" action="product.php">
              <input type="hidden" name="input" value="<?php echo $get_ID[2]?>" />
              <input type="submit" class="btn btn-primary" value="SHOP NOW" />
            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col" style="width: 18rem;">
          <img class="card-img-top" style="width: 12rem; height:15rem; margin-left:1rem" src="<?php echo $get_image[3] ?>" alt="Card image cap" /><!--image size: 240x300-->
          <div class="card-body">
            <h5 class="card-title"><?php echo $get_bookname[3] ?></h5>
            <p class="card-text">Author: <?php echo $get_author[3] ?></p>
            <p class="card-text" style="font-weight:bold; ">$ <?php echo $get_price[3] ?></p>
            <form method="post" action="product.php">
              <input type="hidden" name="input" value="<?php echo $get_ID[3]?>" />
              <input type="submit" class="btn btn-primary" value="SHOP NOW" />
            </form>
          </div>
        </div>

        <div class="col" style="width: 18rem;">
          <img class="card-img-top" style="width: 12rem; height:15rem; margin-left:1rem" src="<?php echo $get_image[4] ?>" alt="Card image cap" />
          <div class="card-body">
            <h5 class="card-title"><?php echo $get_bookname[4] ?></h5>
            <p class="card-text">Author: <?php echo $get_author[4] ?></p>
            <p class="card-text" style="font-weight:bold; ">$ <?php echo $get_price[4] ?></p>
            <form method="post" action="product.php">
              <input type="hidden" name="input" value="<?php echo $get_ID[4]?>" />
              <input type="submit" class="btn btn-primary" value="SHOP NOW" />
            </form>
          </div>
        </div>

        <div class="col" style="width: 18rem;">
          <img class="card-img-top" style="width: 12rem; height:15rem; margin-left:1rem" src="<?php echo $get_image[5] ?>" alt="Card image cap" />
          <div class="card-body">
            <h5 class="card-title"><?php echo $get_bookname[5] ?></h5>
            <p class="card-text">Author: <?php echo $get_author[5] ?></p>
            <p class="card-text" style="font-weight:bold; ">$ <?php echo $get_price[5] ?></p>
            <form method="post" action="product.php">
              <input type="hidden" name="input" value="<?php echo $get_ID[5]?>" />
              <input type="submit" class="btn btn-primary" value="SHOP NOW" />
            </form>
          </div>
        </div>
      </div>
    </article>
  </div>
  <?php
  include('templates/footer.php');
  ?>
