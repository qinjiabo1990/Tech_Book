<!DOCTYPE html>
<html>
  <head>
    <title>Book details</title>
    <link rel="stylesheet" type="text/css" href="css/product.css">
    <?php
    include('templates/header.php');
    include('templates/nav.php');
    //connet the database
    $BookID = $_REQUEST["input"];
    $sql = "SELECT * FROM BOOK_INFO WHERE Book_ID = '$BookID'";
    if($result = mysqli_query($conn, $sql)){
      if (mysqli_num_rows($result) > 0) {
          // output data
            $row = mysqli_fetch_assoc($result);
            $get_bookname = $row["Bookname"];
            $get_image = $row["Image"];
            $get_author = $row["Author"];
            $get_price = $row["Price"];
            $get_abstract = $row["Abstract"];
            $get_stock = $row["Stock"];
            $get_publisher = $row["Publisher"];
            $get_ISBN = $row["ISBN"];
            $get_id = $row["Book_ID"];
        }
      }
    ?>

    <!--Body-->
  <div class="container" style="margin-top:15px">
    <!--Information-->
    <article style="padding-top: 50px;">
      <div class="row">
        <div class="col" style="width: 18rem;">
          <div class="media">
            <div class="media-left">
              <img class="media-object" src="<?php echo $get_image ?>" style="width: 24rem; height:30rem;">
            </div>
            <div class="media-body" style="padding-left:8rem">
              <h2 class="media-heading"><?php echo $get_bookname ?></h2>
              <h5 style="color:grey"><?php echo $get_author ?></h5>
              <p style="margin-top:1rem;font-weight:bold">$ <?php echo $get_price ?></p>
              <hr>
              <form method="post" action="*.php">
                <div style="margin-top:1rem">
                  <p>Quantity:</p>
                  <input type="text" placeholder="1" name="Quality" />
                  <p style="font-size:12px; color:grey;">Stock: <?php echo $get_stock?></p>
                </div>
                 <p><a href="addtocart.php?id=<?php echo $get_id; ?>" class="btn btn-primary" role="button">Add to Cart</a></p>
                <hr>
              </form>
              <div style="margin-top:2rem">
                <img src="images/service.png" style="width: 31rem; height:10rem;">
              </div>
            </div>
          </div>
          <!--tab-->
          <div class="tab-content">
            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'Description')" id="defaultOpen">Description</button>
              <button class="tablinks" onclick="openCity(event, 'Information')">Information</button>
            </div>

            <div id="Description" class="tabcontent">
              <div class="description">
                <h3>Description</h3>
                <p><?php echo $get_abstract?></p>
              </div>
            </div>

            <div id="Information" class="tabcontent">
              <div class="description">
              <h3>Information</h3>
              <div>
                <p><span style="font-weight:bold;">Author:</span> <?php echo $get_author?></p>
                <p><span style="font-weight:bold;">Publisher:</span> <?php echo $get_publisher?></p>
                <p><span style="font-weight:bold;">ISBN</span> <?php echo $get_ISBN?></p>
              </div>
            </div>
            </div>

            <!--Tab
              Author: W3schooles
              Website: https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_theme_band_complete&stacked=h
              Last accessed date: 25-5-2018
              Function: Tab script-->
            <script>
            function openCity(evt, cityName) {
              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
              }
              document.getElementById(cityName).style.display = "block";
              evt.currentTarget.className += " active";
            }
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
            </script>

          </div>
        </div>
      </div>
    </article>
    </div>
    <?php
    include('templates/footer.php');
    ?>
