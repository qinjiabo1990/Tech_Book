<!DOCTYPE html>
<html>
  <head>
    <title>New issue</title>
    <link rel="stylesheet" type="text/css" href="css/video.css">
   <?php
   include('templates/header.php');
   include('templates/nav.php');
   ?>
   <div class="body">
     <br>
     <h2>Editors Choice</h2>
     <hr>
   <div id="video-block" class="stop" onclick="playPause()">
     <div id="play-btn">
       <img class="img" src="images/play_button.png">
     </div>
     <video id="video">
       <source src="video/videoplayback.mp4" type="video/mp4" />
     </video>
   </div>
   <br><br>
   <a id="btn" onclick="makeSmall()">Smaller</a>
   <a id="btn" onclick="makeNormal()">Normal</a>
   <a id="btn" onclick="makeBig()">Larger</a>
 </div>
 <!--
   Author: University of Queensland - INFS7202
   Source: Lecture slide
   Last accessed date: 25-5-2018
   Function: load video and change its size-->
   <script type="text/javascript">
    	var myVideo=document.getElementById("video"),
    		playBtn = document.getElementById("video-block");
    	function playPause(){
    		if (myVideo.paused) {
    		    playBtn.classList.remove("stop");
    		    playBtn.classList.add("play");
                myVideo.play();
            }
    		else{
    			playBtn.classList.remove("play");
    			playBtn.classList.add("stop");
    			myVideo.pause();
    		}
    	}
    	function makeBig(){
    		myVideo.height=myVideo.videoHeight*2;
    	}
    	function makeSmall(){
    		myVideo.height=myVideo.videoHeight/2;
    	}
    	function makeNormal(){
    		myVideo.height=myVideo.videoHeight;
    	}
    </script>
    <?php
    include('templates/footer.php');
    ?>
