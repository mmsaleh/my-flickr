<?php session_start(); //print_r($_SESSION);
if(isset($_SESSION['email']) && isset($_SESSION['password'])){
  $message = "You are now logged in. Welcome to the admin area";
}else{
  header('location:../login.php?redirect');
  die();
}
?>