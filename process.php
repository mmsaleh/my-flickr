<?php include_once 'includes/header.php'; ?>
<?php
require_once 'includes/user.php';
require_once 'includes/user.php';

$user      =   new user();
$user->email     =   $_POST['email'];
$user->password  =   $_POST['password'];
$user->fullname  =   $_POST['fullname'];
$result = $user->auth($user->email, $user->password);
//echo '<pre>';
//print_r($result); die;

if(!empty($_POST['email']) && !empty($_POST['password'])){
  if (is_array($result) && !empty($result)){
    $message_error = "a user with this email already exists";
  }else{
    $user->createUser();
    $message_success = "user successfully created";
  }
}else{
  $message = "all fields are required";
}

include_once 'includes/admin_footer.php';