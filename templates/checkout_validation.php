<?php
include 'account.php';
if(isset($_SESSION['Username'])){
  echo "<script>location.href='../cart.php'</script>";
}
else{
  echo "<script language=\"JavaScript\">alert(\"Please login you account.\");</script>";
  echo "<script>location.href='../login.php'</script>";
}
?>
