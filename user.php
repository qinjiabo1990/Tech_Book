<!DOCTYPE html>
<html>
  <head>
    <title>Account Information</title>
    <link rel="stylesheet" type="text/css" href="css/user.css">
    <?php
    include('templates/header.php');
    include('templates/nav.php');
    $Username = $_SESSION['Username'];
    $sql = "SELECT * FROM USERS_INFO, USERS_PURCHASE, BOOK_INFO
    WHERE Username = '$Username' AND USERS_INFO.User_ID = USERS_PURCHASE.User_ID
    AND USERS_PURCHASE.Book_ID = BOOK_INFO.Book_ID";

    if($result = mysqli_query($conn, $sql)){
      if (mysqli_num_rows($result) > 0) {
        // output data
        $row = mysqli_fetch_assoc($result);
          $get_username = $row["Username"];
          $get_user_ID = $row["User_ID"] . "<br>";
          $get_last_name = $row["Last_name"] . "<br>";
          $get_first_name = $row["First_name"] . "<br>";
          $get_gender = $row["Gender"] . "<br>";
          $get_mail = $row["Mail"] . "<br>";
          $get_phone_number = $row["Phone_num"] . "<br>";
          $get_image = $row["Image"] . "<br>";
          $get_book_ID = $row["Book_ID"]. "<br>";
          $get_book_name = $row["Bookname"] . "<br>";
          $get_price = $row["Price"] . "<br>";
          $get_author = $row["Author"] . "<br>";
          $get_userimage = $row["Userimage"] . "<br>";
      }
    }
    ?>
    <br>
    <h1><?php
    if ($_SESSION['Userimage'] == NULL or $_SESSION['Userimage'] == '' ){
        echo '<img src="images/no_image.png" width="80" height="80"/>';
    }
    else{
      echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['Userimage']).'" width="80" height="80"/>';
    }
    echo " Hi ". $_SESSION['Username']. " !";
    ?></h1>
    <h4>Account Details</h4>
    <div class="details">
      <div class="name">
        <p><?php echo "User ID: ". $_SESSION['User_ID'];?></p>
        <p><?php echo "Name: " . $_SESSION['First_name'] . " " . $_SESSION['Last_name'];?></p>
      </div>
      <div class="contact">
        <p><?php echo "Gender: ". $_SESSION['Gender'];?></p>
        <p><?php echo "E-mail: ". $_SESSION['Mail'];?></p>
      </div>
    </div>
    <!--purchase-->
    <h4>Recent Purchase</h4>
        <?php
        if (isset($get_book_ID)){
          echo '<div class="purchase">';
          echo '<div>
            <img class="card-img-top" style="width: 12rem; height:15rem; margin-left:1rem" src="' . $get_image . '" alt="Book" />
          </div>';
          echo '<div class="content">';
          echo "<p>Book ID: " . $get_book_ID . "</p>";
          echo "<p>Book Name: " . $get_book_name . "</p>";
          echo "<p>Price: $" . $get_price . "</p>";
          echo "<p>Author: " . $get_author . "</p>";
          echo '</div>';
          echo '</div>';
        }
        else{
          echo '<div class="purchase">';
          echo "There is no purchase";
          echo '</div>';
        }
        ?>
    <!--Information-->
    <h4>Delivery Information</h4>
    <div class="info">
      <p>User's delivery informatin</p>
      <p><?php //echo "Express Status: ". $get_delivery;?></P>
    </div>
    <br>
    <div class="text-center">
      <a href="templates/logout.php"><input type="button" value="Log Out" name="Log out"></a></button>
      <a href="update.php"><input type="button" value="Update" name="Update"></a></button>
      <a href="templates/delete.php"><input type="button" value="Delete" name="Delete"></a></button>
    </div>
    <?php
    include('templates/footer.php');
    ?>
