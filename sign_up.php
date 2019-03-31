<!DOCTYPE HTML>
<html>
<head>
  <title>Sign Up</title>
  <style>
  .error {color: #FF0000;}
  </style>
  <?php
  include('templates/header.php');
  include('templates/nav.php');
  ?>
<div class="container">
<?php
// set the input
// define variables and set to empty values
$usernameErr = $passwordErr = $lnameErr = $fnameErr = $emailErr = $phonenumErr = $genderErr = "";
$username = $password = $lname = $fname = $email = $phonenum = $gender = $image = "";
$validu = $validp = $validl = $validf = $valide = $validp = $validg = 1;
$valid = false;

// Select all Username information from database
$all_username = "SELECT Username FROM USERS_INFO";
$result = $conn->query($all_username);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        if($row["Username"] == $username){
				$usernameErr = "Username has been used";
        }
      }
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

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
      $validp = 0;
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

if ($validu == 1 and $validp == 1 and $validl == 1 and $validf == 1 and
$valide == 1 and $validp == 1 and $validg == 1){
  $valid = true;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data); //htmlspecialchars() replaces HTML characters like < and > with &lt; and &gt; which is used to defend hacker attack.
  return $data;
}
?>
<br>
<h2>Sign Up</h2>
<hr>
<p><span class="error"style="font-size:12px">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6 mb-0">
      <label>Username:</label>
      <input type="text" name="username" value="<?php echo $username;?>" placeholder="Enter Username" class="form-control">
      <span class="error">* <?php echo $usernameErr;?></span>
      <br><br>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-0">
      <label>Password:</label>
      <input type="password" name="password" placeholder="Enter Password" class="form-control" />
      <span class="error">* <?php echo $passwordErr;?></span>
      <br><br>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-0">
      <label>Last Name:</label>
      <input type="text" name="lname" value="<?php echo $lname;?>" placeholder="Enter Last Name" class="form-control">
      <span class="error">* <?php echo $lnameErr;?></span>
      <br><br>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-0">
      <label>First Name:</label>
      <input type="text" name="fname" value="<?php echo $fname;?>" placeholder="Enter First Name" class="form-control">
      <span class="error">* <?php echo $fnameErr;?></span>
      <br><br>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-0">
      <label>E-mail:</label>
      <input type="text" name="email" value="<?php echo $email;?>" placeholder="Enter E-mail" class="form-control">
      <span class="error">* <?php echo $emailErr;?></span>
      <br><br>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-0">
      <label>Phone Number:</label>
      <input type="text" name="phonenum" value="<?php echo $phonenum;?>" placeholder="Enter Phone Number" class="form-control">
      <span class="error">* <?php echo $phonenumErr;?></span>
      <br><br>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-0">
      <label>Gender:</label>
      <div class="radio">
        <label><input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> Female</label>
      </div>
      <div class="radio">
        <label><input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"> Male</label>
      </div>
      <span class="error">* <?php echo $genderErr;?></span>
      <br><br>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-0">
      <label>Image</label>
      <input type="file" name="image" id="image" />
      <br><br>
    </div>
  </div>

  <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Submit" id="insert" />
</form>

<?php
// record data to the database
$fill = false;
if ($username != "" and $password != "" and $lname != "" and $fname != ""
and $email != "" and $phonenum != "" and $gender != ""){
  $fill = true;
}
if ($valid == false or $fill == false){
  echo "";
}
else{
  $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
  $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
  $sql = "INSERT INTO USERS_INFO" . "(Username, Password, Gender, Mail, Phone_num, Last_name, First_name, Userimage)"
  . "VALUES" . "('$username','$param_password','$gender','$email','$phonenum','$lname','$fname', '$image')";

  if (mysqli_query($conn, $sql)) {
    echo "<script language=\"JavaScript\">location.replace(\"successful.html\");\r\n</script>";
  } else {
    echo "<script language=\"JavaScript\">alert(\"Registered Failed, Please check validation!\");</script>";
  }
}
?>
</div>
<?php
include('templates/footer.php');
?>

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
