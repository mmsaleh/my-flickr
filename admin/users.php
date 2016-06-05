<?php include_once '../includes/admin_header.php'; ?>
<?php require_once '../includes/user.php'; ?>
<?php require_once '../includes/session.php'; ?>


<?php
  if(isset($_POST['submit-user'])){
    // add user to database
    $user     =   new user();
    $user->email     = $_POST['email'];
    $user->password  = $_POST['password'];
    $user->fullname  = $_POST['fullname'];
    $user->createUser();
    $status = "User successfully added";
  }
  if(isset($_POST['submit-edit'])){
    // edit user
    $user     =   new user();
    $user->email     = $_POST['email'];
    $user->password  = $_POST['password'];
    $user->fullname  = $_POST['fullname'];
    $user->updateUser($_POST['id']);
    $status = "User Updated successfully";
  }

  if(isset($_POST['submit-delete'])){
    // delete user
    $user = new user();
    $user->deleteUser($id);
    $status = "User Deleted Successfully";
  }
?>
<?php
  if(isset($status)){
    echo '<div class="alert alert-success alert-dismissible" role="alert">'.$message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
  }
?>
<h1 class="page-header">
  Manage Users
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
      <button type="submit" name="submit-user" class="btn btn-primary">Add User</button>
    </div>
  </div>
</form>
</div>
<hr>

<h2>All Users</h2>
<table class="table table-bordered">
  <thead>
    <th>User ID</th>
    <th>Fullname</th>
    <th>Email</th>
    <th>Edit</th>
    <th>Delete</th>
  </thead>
  <?php
  $users = new user();
  $userSet = $users->fetchAllUsers();
  foreach ($userSet as $displayUser){
    $id = $displayUser["user_id"];
    echo '<tr>
            <td>'.$displayUser["user_id"].'</td>
            <td>'.$displayUser["fullname"].'</td>
            <td>'.$displayUser['email'].'</td>
            <td>
              <button class="btn btn-warning" data-toggle="modal" data-target="#editForm'.$displayUser["user_id"].'">Edit</button>
            </td>
            <td>
              <form method="post">
              <input type="hidden" name="user-id" value="$id"';
              echo '"><button type="submit" class="btn btn-danger" name="submit-delete" >Delete</button>
              <form>
          </td>
        </tr>
      <!-- Modal -->
      <div class="modal fade" id="editForm'.$displayUser["user_id"].'" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close"
                           data-dismiss="modal">
                               <span aria-hidden="true">&times;</span>
                               <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            Edit User
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form method="post" class="form" role="form">
                          <div class="form-group">
                            <label  class="col-sm-2 control-label"
                                      for="email">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control"
                                id="email" name="email" placeholder="Email"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label"
                                  for="password" >Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control"
                                    id="password" placeholder="Password"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label"
                                  for="fullname" >Fullname</label>
                            <div class="col-sm-10">
                                <input type="fullname" name="fullname" class="form-control"
                                    id="fullname" placeholder="Fullname"/>
                            </div>
                          </div>
                          <input type="hidden" name="id" value="'.$displayUser["user_id"].'">
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" name="submit-edit" class="btn btn-default">Update</button>
                            </div>
                          </div>
                        </form>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">
                                    Close
                        </button>
                    </div>
                </div>
            </div>
        </div>';
  }

  ?>
</table>



<!-- <form method="post"><input type="hidden" name="id" value="user_id"><button class="btn btn-warning" name="submit-edit">Edit</button><form>
 -->

<?php include_once '../includes/admin_footer.php'; ?>