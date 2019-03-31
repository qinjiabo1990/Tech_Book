<!DOCTYPE html>
<html>
  <head>
    <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="css/contactus.css">
    <?php
    include('templates/header.php');
    include('templates/nav.php');
    ?>
    <!--Body-->
    <!--Vote
      Author: w3shcools
      URL: https://www.w3schools.com/php/php_ajax_poll.asp
      Last accessed date: 20-5-2018
      Function: polling function by AJAX-->
    <div class="contactus">
	   <h2>Do you like us?</h2>
     <div id="poll" class="information">
     <form>
     <p>Yes:</p>
     <input type="radio" name="vote" value="0" onclick="getVote(this.value)">
     <br>
     <p>No:</p>
     <input type="radio" name="vote" value="1" onclick="getVote(this.value)">
     </form>
     </div>
   </div>
    <!--Contact us-->
    <div class="contactus">
	   <h2>Contact Us</h2>
     <div class="information">
  	   <form method='post' action='sending_email.php' class="col-md-6 mb-0">
         <p>Name:</p>
         <input name='name' type='text' class="form-control"/>
         <br>
         <p>Email:</p>
         <input name='email' type='text' class="form-control"/>
         <br>
         <p>Message:</p>
         <textarea name='message' rows='15' cols='40' class="form-control">
         </textarea><br />
         <input type='submit' name='Submit' value='Submit' class="btn btn-primary btn-lg btn-block"/>
       </form>
     </div>
    </div>
    <br>
    <hr>
    <!--The Google map
      Author: Google
      Source: Google map api
      Last accessed date: 20-5-2018
      Function: Google map-->
    <h2>Our Location</h2>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: -27.499974, lng: 153.014981};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <!--the src should be google map api key-->
    <script async defer
    src="">
    </script>

    <?php
    include('templates/footer.php');
    ?>
<!--vote script-->
<script>
function getVote(int) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("poll").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","poll_vote.php?vote="+int,true);
  xmlhttp.send();
}
</script>
