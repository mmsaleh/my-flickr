<?php include_once '../includes/admin_header.php'; ?>
<?php require_once '../includes/photo.php'; ?>
<?php require_once '../includes/session.php'; ?>

<?php
  if(isset($_POST['submit'])){
    // error validation
    if($_FILES['file']['error'] === 0) {
      // Allowed Extensions
      $allowed_extensions = array("image/jpeg", "image/jpg", "image/png", "image/gif");
      if(in_array($_FILES['file']['type'], $allowed_extensions)){
        $photoModel   =   new photo();
        $photoModel->caption   =  $_POST['caption'];
        $photoModel->size      =  ceil($_FILES['file']['size']/1024/1024);
        $photoModel->name      =  $_FILES['file']['name'];
        $photoModel->tmp_name  =  $_FILES['file']['tmp_name'];
        if($photoModel->uploadPhoto()){
          $error   =  "File uploaded successfully";
        }else{
          $error   =  "cannot move file";
        }
      }else {
        $error  =  "invalid file extension.. extensions allowed are .jpeg, .jpg, .png, .gif";
      }
    }else{
      $error_names = array("", "file is too large", "file is too large", "connection was reset during upload, try again", "you must choose a file to upload", "", "you don't have sufficient permissions for this operation", "file extension not allowed");
      $error  =  "Error: {$error_names[$_FILES['file']['error']]}";
    }
  }
?>
      <h1 class="page-header">
        Upload Photo
      </h1>
      <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                          <form action = "upload.php" method ="post" enctype = "multipart/form-data">
                            <span class="btn btn-primary btn-file">
                                <i class="fa fa-fw fa-image"></i> Browse <input type="file" name="file" id = "file">
                            </span>
                            <div class="form-group">
                              <label class="control-label" for="caption">
                             Caption
                              </label>
                            <input class="form-control" id="caption" name="caption" type="text"/>
                           </div>
                           <button type="submit" class="btn btn-success" name= "submit" ><i class="fa fa-fw fa-upload"></i> Upload</button>
                          </form>
                        </div>
<?php include_once '../includes/admin_footer.php'; ?>