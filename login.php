<?php require_once 'includes/user.php';?>
<?
if(isset($_GET['redirect'])){
  $message = "You must be logged in to access admin area. Please log in";
}
 ?>
<?php
  if(isset($_POST['submit'])){
    // check for required fields
    if(isset($_POST['email']) && isset($_POST['password'])){
      //echo $_POST['email'].$_POST['password'];
      $user = new user();
      $email     = $_POST['email'];
      $password  = $_POST['password'];
      $a = $user->auth($email, $password);
          if($a == TRUE ){
            session_start();
            $_SESSION['email']     = $email;
            $_SESSION['password']  = $password;
            //print_r($_SESSION); die();
            header("location:admin/index.php");exit();
          }elseif($a == FALSE){
            $message = "this email and password combintion is incorrect";
          }
    }else{
       $message = "email and password are required";
     }
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
          <img src="images/myflickrlogo.png" class="img-responsive logo">
        </div>
      </div>
      <?php
        if(isset($message)){
          echo '<div class="alert alert-warning alert-dismissible" role="alert">'.$message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        }
      ?>
      <form class="form-signin" method="post">
        <h2 class="text-center">Please Sign In</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email address">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
      </form>

      <p class="text-center"><a class="text-muted" href="index.php"><i class="fa fa-arrow-circle-left"></i> return to Flickr main site without logging in</a></p>

    </div> <!-- /container -->
    <script type="text/javascript" src= "js/jquery.js"></script>
    <script type="text/javascript" src= "js/bootstrap.min.js"></script>
  </body>
</html>