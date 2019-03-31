<!DOCTYPE HTML>
<html>
<head>
  <title>Update Account</title>
  <style>
  .error {color: #FF0000;}
  </style>
  <?php
  include('templates/header.php');
  include('templates/nav.php');
  ?>
  <!--Body-->
  <div class="container">
  <?php
  // set the input
  // define variables and set to empty values
  $lnameErr = $fnameErr = $emailErr = $phonenumErr = $genderErr = "";
  $lname = $fname = $email = $phonenum = $gender = "";
  $validl = $validf = $valide = $validph = $validg = 1;
  $valid = false;

  // Select all Username information from database
  //$all_username = "SELECT * FROM USERS_INFO";
  //$result = $conn -> query($all_username);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["lname"])) {
      $lnameErr = "Last name is required";
    } else {
      $lname = test_input($_POST["lname"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
        $lnameErr = "Only letters and white space allowed";
        $validl = 0;
      }
    }

    if (empty($_POST["fname"])) {
      $fnameErr = "First name is required";
    } else {
      $fname = test_input($_POST["fname"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
        $fnameErr = "Only letters and white space allowed";
        $validf = 0;
      }
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $valide = 0;
      }
    }

    if (empty($_POST["phonenum"])) {
      $phonenumErr = "Phone number is required";
    } else {
      $phonenum = test_input($_POST["phonenum"]);
    // check if name only contains letters and whitespace
      if (!preg_match("/^[0-9 ]*$/",$phonenum)) {
        $phonenumErr = "Only number allowed";
        $validph = 0;
      }
    }

    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = test_input($_POST["gender"]);
    }
  }

  if ($validl == 1 and $validf == 1 and
  $valide == 1 and $validph == 1 and $validg == 1){
    $valid = true;
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
  <br>
  <h2>Update</h2>
  <hr>
  <p><span class="error"style="font-size:12px">* required field.</span></p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-6 mb-0">
        <label>Username:</label>
        <p style="font-size:24px"><?php echo $_SESSION['Username'];?></p>
        <br><br>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-0">
        <label>Last Name:</label>
        <input type="text" name="lname" value="<?php echo $_SESSION['Last_name'];?>" placeholder="Enter Last Name" class="form-control" />
        <span class="error">* <?php echo $lnameErr;?></span>
        <br><br>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-0">
        <label>First Name:</label>
        <input type="text" name="fname" value="<?php echo $_SESSION['First_name'];?>" placeholder="Enter First Name" class="form-control">
        <span class="error">* <?php echo $fnameErr;?></span>
        <br><br>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-0">
        <label>E-mail:</label>
        <input type="text" name="email" value="<?php echo $_SESSION['Mail'];?>" placeholder="Enter E-mail" class="form-control">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-0">
        <label>Phone Number:</label>
        <input type="text" name="phonenum" value="<?php echo $_SESSION['Phone_num'];?>" placeholder="Enter Phone Number" class="form-control">
        <span class="error">* <?php echo $phonenumErr;?></span>
        <br><br>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-0">
        <label>Gender:</label>
        <div class="radio">
          <label><input type="radio" name="gender" <?php if (isset($gender) && $_SESSION['Gender']=="female") echo "checked";?> value="female"> Female</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="gender" <?php if (isset($gender) && $_SESSION['Gender']=="male") echo "checked";?> value="male"> Male</label>
        </div>
        <span class="error">* <?php echo $genderErr;?></span>
        <br><br>
      </div>
    </div>

    <?php
    if ($_SESSION['Userimage'] == null or $_SESSION['Userimage'] == ''){
      echo '<div class="row">
        <div class="col-md-6 mb-0">
          <label>Image</label>
          <input type="file" name="image" id="image" />
          <br><br>
        </div>
      </div>
      ';
    }
    ?>
    <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Submit" id="insert" />
  </form>

  <?php
  // record data to the database
  if ($lname == '' and $fname == '' and $email == '' and $phonenum == ''
  and $gender == ''){
      $fill = false;
  }
  else{
    $fill = true;
  }

  if ($valid == false or $fill == false){
    echo "";
  }
  else{
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
    $sql = "UPDATE USERS_INFO SET
    Gender = '$gender',
    Mail = '$email',
    Phone_num = '$phonenum',
    Last_name = '$lname',
    First_name = '$fname',
    Userimage = '$image'
    WHERE User_ID =" . $_SESSION['User_ID'];
    if (mysqli_query($conn, $sql)) {
      $_SESSION['Last_name'] = $lname;
      $_SESSION['First_name'] = $fname;
      $_SESSION['Gender'] = $gender;
      $_SESSION['Mail'] = $email;
      $_SESSION['Phone_num'] = $phonenum;
      echo "<script language=\"JavaScript\">alert(\"Update Successfully!\");</script>";
      echo "<script language=\"JavaScript\">location.replace(\"user.php\");\r\n</script>";
    } else {
      echo "<script language=\"JavaScript\">alert(\"Update Failed, Please check validation!\");</script>";
    }
  }
  ?>
  </div>
  <?php
  include('templates/footer.php');
  ?>

<!--Check image type-->
<script>
$(document).ready(function(){
  $('#insert').click(function(){
    var image_name = $('#image').val();
    if(image_name != '')
    {
      var extension = $('#image').val().split('.').pop().toLowerCase();
      if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
      {
        alert('Invalid Image File');
        $('#image').val('');
        return false;
      }
    }
  });
});
</script>
