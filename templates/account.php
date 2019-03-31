<?php
session_start();
require_once("config.php");
if (isset($_POST["Username"])){
  $Username = $_REQUEST["Username"];
  $Password = $_REQUEST["Password"];
  $sql = "SELECT * FROM USERS_INFO WHERE Username = '$Username'";

  if($result = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($result) > 0) {
        // output data
        $row = mysqli_fetch_assoc($result);
        if(password_verify($Password, $row['Password'])){
          $_SESSION['Username'] = $row["Username"];
          $_SESSION['Last_name'] = $row["Last_name"];
          $_SESSION['First_name'] = $row["First_name"];
          $_SESSION['Gender'] = $row["Gender"];
          $_SESSION['Mail'] = $row["Mail"];
          $_SESSION['Phone_num'] = $row["Phone_num"];
          $_SESSION['User_ID'] = $row["User_ID"];
          $_SESSION['Userimage'] = $row["Userimage"];
        }
        else{
          echo "<script language=\"JavaScript\">alert(\"Username or Password is wrong!\");</script>";
          echo "<script>location.href='login.php'</script>";
        }
      } else {
        echo "<script language=\"JavaScript\">alert(\"Username or Password is wrong!\");</script>";
        echo "<script>location.href='login.php'</script>";
    }
  }else{
    echo mysqli_error($conn);
  }
}
?>
