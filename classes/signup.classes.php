<?php

class Signup extends Dbh{

  protected function setUser($uid, $pwd, $email){
    $statement =  $this->connect()->preapre('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ? , ?);');

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    if(!$statement->execute(array($uid, $pwd, $email))){
      $statement = null;
      header("location: ../index.php?error=statementfailed");
      exit();
    }

    $statement = null;
  }

  protected function checkUser($uid, $email){
    $statement =  $this->connect()->preapre('SELECT users_uid FROM user where users_uid = ? OR users_email = ?;');

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

}