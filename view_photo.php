<?php include_once 'includes/header.php'; ?>
<?php require_once 'includes/photo.php'; ?>
<?php require_once 'includes/comment.php'; ?>

<?php
if(isset($_POST['submit'])){
  $commentModel = new comment();
  $commentModel->comment  = $_POST['comment'];
  $commentModel->email    = $_POST['email'];
  $commentModel->photo_id = $_GET['photo_id'];
  $commentModel->created  = date('Y-m-d H:i:s'); // preferable use timestamp for greater flexibility
  $commentModel->addComment();
  $message = "Thank you for your feedback. Your message is pending approval. It will be displayed on this page after review.";

}
?>

<?php
$p_id = $_GET['photo_id'];
$photos = new photo();
$view_photo = $photos->fetchById($p_id);
//$view_photo = array_shift($view_photo);
//echo '<pre>';
//print_r($view_photo);
$desc = $view_photo[0]['caption'];
$name = $view_photo[0]['name'];
$size = $view_photo[0]['size'];
$category = $view_photo[0]['category'];
?>
<div class="row">
    <div class="col-lg-12">
      <?php
      if(isset($message)){
        echo '<div class="alert alert-success alert-dismissible" role="alert">'.$message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
      }
      ?>
        <h1 class="page-header">Photo Details</h1>
        <div>
        <img class="img-thumbnail" src="img/<?php echo $name ?>">
      </div>
      <br>
        <div class="panel panel-primary">
          <div class="panel-body">
        <div class="col-lg-4">
          <i class="fa fa-fw fa fa-image"></i> title: <?php echo $desc ;?>
        </div>
        <div class="col-lg-4">
          <i class="fa fa-fw fa fa-info"></i> Size: <?php echo $size ;?> MB
        </div>
        <div class="col-lg-4">
          <i class="fa fa-fw fa fa-folder-open-o"></i> Posted in: <?php echo $category ;?>
        </div>
      </div>
    </div>


      <h4>Leave a comment: </h4>
      <div class="well">
      <form method = "post">
        <textarea name="comment" class="form-control" rows="3" placeholder="add a comment"></textarea><br>
        <div class="form-group">
          <label for = "email"><h4>Enter your email</h4></label>
          <input class = "form-control" type = "text" name = "email" placeholder = "your email here" ></input><br>
        </div>
        <input type="hidden" name="photo_id" value= "<?php echo $_GET['photo_id']; ?>"></input>
        <button class="btn btn-primary" name="submit" >Add Comment</button>
      </form>
      </div>

      <?php
      $comments   = new comment();
      $commentSet = $comments->fetchApprovedComments();
//echo '<pre>';
      //print_r($commentSet);die;

      if(is_array($commentSet)){
        echo '<h4>View Comments</h4>
        <ul class="media-list">';
        foreach($commentSet as $displayComments){
          //echo '<pre>';
          //print_r($displayComments);die;
          echo '<li class="comment media">';
          echo '<i class="fa fa-user fa-3x fa-pull-left fa-border text-info media-object"></i>';
          echo '<h4 class="media-heading text-info">';
          echo $displayComments['email'];
          echo '</h4> added at ';
          $date = $displayComments['created'];
          $myDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $date);
          $newDate = $myDateTime->format('g:ia \o\n l jS F Y');
          echo $newDate;
          echo '<div class="media-body"><p class="lead">';
          echo $displayComments['comment'];
          echo '</p></div></li>';
        }
      }

      ?>
    </ul>
    </div>
</div>
<!-- /.row -->
<?php include_once 'includes/footer.php'; ?>