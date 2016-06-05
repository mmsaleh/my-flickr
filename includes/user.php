<?php
require_once 'mysqldb.php';

class user {
  public $user_id;
  public $email;
  public $password;
  public $fullname;


  public function createUser(){
    $database = new mysqlDatabase();
    $query = "insert into users(email, password, fullname) values('$this->email', '$this->password', '$this->fullname')";
    $database->performQuery($query);
    return $database->lastId() ? $database->lastId() : FALSE;
  }

  public function updateUser($id){
    $database = new mysqlDatabase();
    $query    = "update users set
                    email   = '$this->email',
                    password   = '$this->password',
                    fullname  = '$this->fullname' where user_id = $id";
    $result = $database->performQuery($query);
    return $result ? TRUE : FALSE;
  }

  public function deleteUser($id){
    $database = new mysqlDatabase();
    $query    = "delete from users where user_id = $id";
    $result = $database->performQuery($query);
    return $result ? TRUE : FALSE;
  }

  public function fetchAllUsers(){
    $database = new mysqlDatabase();
    $query    = "SELECT * FROM users";
    $database->performQuery($query);
    return $database->fetchAll() ? $database->fetchAll() : FALSE;
  }

  public function fetchById($id){
    $database = new mysqlDatabase();
    $query    = "SELECT * from users WHERE user_id = '$id'";
    $result   = $database->performQuery($query);
    return $database->fetchAll() ? $database->fetchAll() : FALSE;
  }

  static public function auth($email, $password){
    $database = new mysqlDatabase();
    $query    = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $database->performQuery($query);
    return $database->fetchAll() ? $database->fetchAll() : FALSE;
  }

  public function userCount(){
    $database = new mysqlDatabase();
    $query    = "SELECT * FROM users";
    $result   = $database->performQuery($query);
    echo $row_count = $result->num_rows;
  }

}

 //$x = new user();
 //echo '<pre>';
 //print_r($x->fetchAllUsers());
 //$x->email = "saleh.mayada@gmail.com";
 //$x->password = "123456";
 //print_r($x->auth($x->email, $x->password));
 //$x->userCount();

 //print_r($x->fetchById(1));
// $x->fullname = "john doe";
//$x->createUser();
//echo $x->deleteUser(22);