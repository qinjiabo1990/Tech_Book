<!DOCTYPE html>
<html>
  <head>
    <title>Tech-Book</title>
    <link rel="stylesheet" type="text/css" href="css/product.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<?php
    include('templates/header.php');
    include('templates/nav.php');
?>

<div class="container">
<?php
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
	$items = $_SESSION['cart'];
	$cartitems = explode(",", $items);
	echo "
		<h2>Cart</h2>
		<div class=\"row\">
		<table class=\"table\">
	  	<tr>
	  		<th>Order Number</th>
	  		<th>Item Name</th>
	  		<th>Price</th>
	  		<th>Action</th>
	  	</tr>
	  	";
		$total = '';
		$i=1;
		foreach ($cartitems as $key=>$id) {
			$sql = "SELECT * FROM BOOK_INFO WHERE Book_ID = $id";
			$res=mysqli_query($conn, $sql);
			$r = mysqli_fetch_assoc($res);
			echo "<tr><td>".$i."</td>"."<td>".$r['Bookname']."</td>"."<td>".$r['Price']."</td>"."<td><a href=\"delcart.php?remove=".$key."\">"."Remove</a></td></tr>";
			$total = $total + $r['Price'];
			$i++;}
			echo "
      <tr>
      <td colspan=\"3\" align=right><strong>Total Price</strong></td>
      <td><strong>$".$total."</strong></td>
      </tr>
			<tr>
			<td colspan=\"3\" align=right><a href=\"index.php\" class=\"btn btn-info\">Keep Shopping</a></td>
			<td><a href=\"templates/checkout_validation.php\" class=\"btn btn-info\">Check Login</a></td>
			</tr>
			</table>
			</div>
			";
		}else{
				echo "CART IS EMPTY";
			}
?>
  <?php
  if(isset($_SESSION['Username']) && !empty($_SESSION['cart'])){
    echo '<button class="hide">Checkout form</button>';
  }
  ?>
  <div class="myDIV">
  <h2 class="text-center mb-5">Checkout form</h2>
    <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate>
              <div class="row">
                  <div class="col-md-6 mb-3">
                      <label for="firstName">First name</label>
                      <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $_SESSION['First_name'];?>" required>
                      <div class="invalid-feedback">
                          Valid first name is required.
                      </div>
                  </div>
                  <div class="col-md-6 mb-3">
                      <label for="lastName">Last name</label>
                      <input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $_SESSION['Last_name'];?>" required>
                      <div class="invalid-feedback">
                          Valid last name is required.
                      </div>
                  </div>
              </div>

              <div class="mb-3">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                  <div class="invalid-feedback">
                      Please enter your shipping address.
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-5 mb-3">
                      <label for="country">Country</label>
                      <select class="custom-select d-block w-100" id="country" required>
                          <option value="">Choose...</option>
                          <option>Australia</option>
                      </select>
                      <div class="invalid-feedback">
                          Please select a valid country.
                      </div>
                  </div>
                  <div class="col-md-4 mb-3">
                      <label for="state">State</label>
                      <select class="custom-select d-block w-100" id="state" required>
                          <option value="">Choose...</option>
                          <option>Queensland</option>
                          <option>Victoria</option>
                          <option>New South Wales</option>
                      </select>
                      <div class="invalid-feedback">
                          Please provide a valid state.
                      </div>
                  </div>
                  <div class="col-md-3 mb-3">
                      <label for="zip">Zip</label>
                      <input type="text" class="form-control" id="zip" placeholder="" required>
                      <div class="invalid-feedback">
                          Zip code required.
                      </div>
                  </div>
              </div>
              <hr class="mb-4">
              <h4 class="mb-3">Payment</h4>
              <br>
          </form>
          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="qinjiabo1990@gmail.com">
            <input type="hidden" name="lc" value="AU">
            <input type="hidden" name="amount" value="<?php echo $total?>">
            <input type="hidden" name="currency_code" value="AUD">
            <input type="hidden" name="button_subtype" value="services">
            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
            <input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1">
          </form>
      </div>
    </div>
</div>
<script>
$(document).ready(function(){
  $(".myDIV").hide()
  $(".hide").click(function(){
    $(".myDIV").fadeIn()
  });
});
</script>
<?php
include('templates/footer.php');
?>



<!--
		<tr>
			<td colspan="3" align=right><a href="index.php" class="btn btn-info">Keep Shopping</a></td>
			<td><a href="checkout.php" class="btn btn-info">Checkout</a></td>
		</tr>




</div>
