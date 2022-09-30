<?php

class LoginController extends Login{

  private $uid;
  private $pwd;
  

  public function __construct($uid, $pwd, $pwdRepeat, $email){
    $this->uid = $uid;
    $this->pwd = $pwd;
    


  }

  public function loginUser(){
    // if($this->emptyInput() == false){
    //   // echo "Empty input!";
    //   header("location: ../index.php?error=emptyinput");
    //   exit();

    // }
    // if($this->invalidUid() == false){
    //   // echo "Invalid username!";
    //   header("location: ../index.php?error=username");
    //   exit();

    // }
    // if($this->invalidEmail() == false){
    //   // echo "Invalid email!";
    //   header("location: ../index.php?error=email");
    //   exit();

    // }
    // if($this->pwdMatch() == false){
    //   // echo "Passwords don't match!";
    //   header("location: ../index.php?error=passwordmatch");
    //   exit();

    // }
    // if($this->uidTakenCheck() == false){
    //   // echo "Username or email taken!";
    //   header("location: ../index.php?error=useroremailtaken");
    //   exit();

    // }

    $this->getUser($this->uid, $this->pwd);
  }

  private function emptyInput(){
    $result;
    if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)){
      $result = false;
    }
    else{
      $result = true;
    }
    return $result;
  }

  private function invalidUid(){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid))
    {
      $result = false;


    }
    else {
      $result = true;
    }

    return $result;
  }

  private function invalidEmail(){
    $result;
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
    {
      $result = false;


    }
    else {
      $result = true;
    }

    return $result;
  }

  private function pwdMatch(){
    $result;
    if($this->pwd !== $this->pwdRepeat)
    {
      $result = false;


    }
    else {
      $result = true;
    }

    return $result;
  }
  private function uidTakenCheck(){
    $result;
    if(!$this->checkUser($this->uid, $this->email))
    {
      $result = false;


    }
    else {
      $result = true;
    }

    return $result;
  }



}