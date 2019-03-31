<?php
require_once("config.php");
include 'account.php';
$sql = "DELETE FROM USERS_INFO WHERE User_ID =" . $_SESSION['User_ID'];

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

session_start();
if (isset($_SESSION['Username'])){
  session_destroy();
  echo "<script language=\"JavaScript\">alert(\"User has been deleted!\");</script>";
  echo "<script>location.href='../index.php'</script>";
}
?>
