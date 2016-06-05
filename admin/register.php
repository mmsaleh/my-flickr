<?php include_once '../includes/admin_header.php'; ?>
<?php require_once '../includes/user.php'; ?>
<?php require_once '../includes/session.php'; ?>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<?php
  if(isset($_POST['submit'])){
    // add user to database
    $user            =   new user();
    $user->email     = $_POST['email'];
    $user->password  = $_POST['password'];
    $user->fullname  = $_POST['fullname'];
    $user->createUser();
    $status = "User successfully added";
  }
?>
<?php
  if(isset($status)){
    echo '<div class="alert alert-success alert-dismissible" role="alert">'.$message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
  }
?>
<h1 class="page-header">
  Register User
</h1>
<div class="well">
<h3>Add new user</h3>
<form class="form-horizontal" method="post">
  <div class="form-group">
    <label for="email" class="col-lg-2 control-label">Email</label>
    <div class="col-lg-10">
      <input type="text" id="email" name="email" class="form-control" placeholder="email">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-lg-2 control-label">Password</label>
    <div class="col-lg-10">
      <input type="text" id="password" name="password" class="form-control" placeholder="password">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-lg-2 control-label">Fullname</label>
    <div class="col-lg-10">
      <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Fullname">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary">Add User</button>
    </div>
  </div>
</form>
</div>



<?php include_once '../includes/admin_footer.php'; ?>