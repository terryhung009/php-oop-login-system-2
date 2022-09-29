<?php

class Signup extends Dbh{

  protected function checkUser($uid, $email){
    $statement =  $this->connect()->prepare('SELECT users_uid FROM users where users_uid = ? OR users_email = ?;');

    // die('debug');

    if(!$statement->execute(array($uid, $email))){
      $statement = null;
      header("location: ../index.php?error=statementfailed");
      exit();
    }

    $resultCheck;
    if($statement->rowCount() > 0){
      $resultCheck = false;

    }
    else{
      $resultCheck = true;
    }

    return $resultCheck;
  }



  protected function setUser($uid, $pwd, $email){

    // var_dump($uid,$pwd,$email);
    // exit;
    // $statement = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');
    $statement =  $this->connect()->prepare("INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?)");

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    if(!$statement->execute(array($uid, $hashedPwd, $email))){
      $statement = null;
      header("location: ../index.php?error=statementfailed");
      exit();
    }

    $statement = null;
  }

}