<?php

class Login extends Dbh{



  protected function getUser($uid, $pwd){

    // var_dump($uid,$pwd,$email);
    // exit;
    $statement = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');
    // $statement =  $this->connect()->prepare("INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?)");

    // $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    if(!$statement->execute(array($uid, $pwd))){
      $statement = null;
      header("location: ../index.php?error=statementfailed");
      exit();
    }

    if($statement->rowCount() == 0){
      $statement = null;
      header("location: ../index.php?error=userNotFound");
      exit;
    }

    $pwdHashed = $statement->fetchAll();

    $statement = null;
  }

}