<nav class="nav justify-content-end bg-dark fixed-top" style="height: 3rem;">
  <li class="nav-item">
    <?php
      include 'templates/account.php';
      if (isset($_SESSION['Username'])){
        echo '<a class="nav-link text-light" href="user.php">' . $_SESSION['Username'] . '</a>';
      }
      else {
        echo '<a class="nav-link text-light" href="login.php">Login</a>';
      }
    ?>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light" href="templates/cart_validation.php">Cart</a>
  </li>
</nav>
<!--Navigation Bar-->
<nav class="navbar navbar-expand-lg bg-light navbar-dark mt-5">
  <div class="container-fluid">
    <a class="navbar-brand mr-sm-0" href="index.php">
      <img src="images/Logo.png" style="width:80%">
    </a>
    <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
      <input class="form-control mr-sm-2" type="text" placeholder="Find book here" name="query" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit" >Search</button>
    </form>
  </div>
</nav>
<div class="topnav" id="myTopnav">
  <a href="index.php">Home</a>
  <a href="list_bookname.php">Book List</a>
  <a href="shipping_return.php">Shipping & Returns</a>
  <a href="contact_us.php">About Us</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #f6f6f6;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
