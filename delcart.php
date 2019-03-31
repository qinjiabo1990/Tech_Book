<!--Add book to cart
			Author: Vivek Vengala
			URL:http://codingcyber.org/simple-shopping-cart-application-php-mysql-6394/
			Last accessed date: 20-5-2018
			Function: Add book to cart-->
<?php
session_start();
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
if(isset($_GET['remove']) & !empty($_GET['remove'])){
	$delitem = $_GET['remove'];
	unset($cartitems[$delitem]);
	$itemids = implode(",", $cartitems);
	$_SESSION['cart'] = $itemids;
}
header('location:cart.php');
