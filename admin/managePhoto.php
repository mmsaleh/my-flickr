<?php include_once '../includes/admin_header.php'; ?>
<?php require_once '../includes/photo.php'; ?>
<?php require_once '../includes/comment.php'; ?>
<?php require_once '../includes/session.php'; ?>


<?php
  if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $photo = new photo();
    $photo->deletePhoto($id, $name);
    $comment = new comment();
    $comment->deleteComments($id);
    echo "image deleted";
  }
?>
  <h1 class="page-header">
      Manage Photos
  </h1>

  <table class="table table-bordered table-condensed">
    <thead>
      <th>ID</th>
      <th>Photo Thumbnail</th>
      <th>Name</th>
      <th>Size</th>
      <th>view</th>
      <th>delete</th>
    </thead>
    <?php
    $photo = new photo();
    $photoSet = $photo->fetchAllPhotos();
    foreach ($photoSet as $displayPhoto){
      echo '<tr><td>';
      echo $displayPhoto['photo_id'];
      echo '</td>';
      echo '<td><img src="../img/';
      echo $displayPhoto['name'];
      echo '"class="img-thumbnail img-responsive"></td>';
      echo '<td>'.$displayPhoto["name"].'</td>';
      echo '<td>';
      echo $displayPhoto['size'];
      echo ' MB</td>';
      echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal'.$displayPhoto["photo_id"].'">View</button></td>';
      echo '<div id="myModal'.$displayPhoto["photo_id"].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <img src="../img/'.$displayPhoto["name"].'" class="img-responsive">
        </div>
    </div>
  </div>
</div>';
echo '<td><form method="post"><button type="submit" class="btn btn-danger" name="submit" >Delete</button><input type="hidden" value="'.$displayPhoto['name'].'" name="name"><input type="hidden" value="'.$displayPhoto['photo_id'].'" name="id"></form></td>';
    }
    ?>
  </table>

<?php include_once '../includes/admin_footer.php'; ?>