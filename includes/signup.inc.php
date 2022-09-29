<?php

if(isset($_POST["submit"]))
{
  // Grabbing the data
  $uid= $_POST["uid"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwdRepeat"];
  $email = $_POST["email"];

  // Instantiate SignupController class
  include "../classes/dbh.classes.php";
 
  include "../classes/signup.classes.php";
  include "../classes/signup-controller.classes.php";

  $signup = new SignupController($uid, $pwd, $pwdRepeat, $email);




  // Running error handlers and user signup
  $signup->signupUser();



  // Going to back to front page
  header("location: ../index.php?error=none");

}

