<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
  include('templates/header.php');
  include('templates/nav.php');
  ?>
   <article style="padding-top: 50px;">
     <div class="row">
       <div class="col" style="width: 18rem;">
         <h3 class="text-center">Log In</h3>
         <hr>
         <div class="card-body">
           <form method="post" action="user.php">
             <div class="container text-center">
               <div>
                 <label><b>Username:</b></label>
                 <input type="text" placeholder="Enter Username" name="Username" required>
               </div>
               <div>
                 <label><b>Password:</b></label>
                 <input type="password" placeholder="Enter Password" name="Password" required>
               </div>
               <!--    Set cookie here  -->
               <div>
                 <input type="checkbox" checked="checked" name="remember"> Remember me
               </div>
               <br>
               <!--    <button type="submit">Login</button>  -->
               <div>
                 <input type="submit" class="btn btn-primary" value="Login">
               </div>
             </div>
           </form>
         </div>
       </div>
       <div class="col" style="width: 18rem;">
         <h3 class="text-center">Sign Up</h3>
         <hr>
         <div class="card-body">
            <div class="container text-center">
              <a href="sign_up.php" style="text-decoration:none"><button type="button" class="btn btn-primary">Sign Up</button></a>
            </div>
         </div>
       </div>
     </div>
   </article>
   <?php
   include('templates/footer.php');
   ?>
