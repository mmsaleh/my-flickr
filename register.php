<?php include_once 'includes/header.php'; ?>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
$(document).ready(function()){
  var email = document.getElementById('email');
  email.addEventListener('change', function() {
    alert("hello");
  });
    $.ajax(
            {
              type: "GET",
              url: "process.php?email=" + email,
              cache: false,
              success: function(data)
                {

                }
            });
  });
});
</script>

<h1 class="page-header">
  Register User
</h1>
<?php
if(isset($message_error)){
  echo '<div class="alert alert-danger alert-dismissible" role="alert">'.$message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
}

if(isset($message_success)){
  echo '<div class="alert alert-success alert-dismissible" role="alert">'.$message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
}
?>
<div class="row">
  <div class="col-lg-6 col-lg-offset-3">
    <div class="well">
    <h3>Add new user</h3>
    <form class="form-horizontal" method="post" action="process.php" id="register">
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
  </div>
</div>

<?php include_once 'includes/footer.php'; ?>