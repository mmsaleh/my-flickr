<?php include_once '../includes/admin_header.php'; ?>
<?php require_once '../includes/comment.php'; ?>
<?php require_once '../includes/session.php'; ?>

<?php
  if(isset($_POST['submit-approve'])){
    // approve comment
    $comment = new comment();
    $comment->approveComments($_POST['comment-id-approve']);
    $status = "comment approved successfully";
  }
  if(isset($_POST['submit-unapprove'])){
    // unapprove comment
    $comment = new comment();
    $comment->unapproveComments($_POST['comment_id']);
    $status = "comment unapproved successfully";
  }
  if(isset($_POST['submit-delete'])){
    // delete comment
    $comment = new comment();
    $comment->deleteSingleComment($_POST['comment-id-delete']);
    $status = "comment deleted successfully";
  }

?>
<?php
  if(isset($status)){
    echo '<div class="alert alert-success alert-dismissible" role="alert">'.$message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
  }
?>
<h1 class="page-header">
  Manage Comments
</h1>

<table class="table table-bordered table-condensed">
  <thead>
    <th>ID</th>
    <th>Comment</th>
    <th>Posted to (Photo ID)</th>
    <th>Posted by (email)</th>
    <th>Added</th>
    <th>Status</th>
    <th>Delete</th>
  </thead>
  <?php
  $comment = new comment();
  $commentSet = $comment->fetchAllComments();
  foreach ($commentSet as $displayComments){
    $cid = $displayComments['comment_id'];
    $pid = $displayComments['photo_id'];
    if($displayComments['status']=='pending'){
      $status = '<form method="post"><button type="submit" name="submit-approve" class="btn btn-success">Approve</button><input type="hidden" name="comment-id-approve" value="'.$cid.'"></form>';
    }elseif($displayComments['status']=='approved'){
      $status = '<form method="post"><button type="submit" name="submit-unapprove" class="btn btn-warning">unapprove</button><input type="hidden" name="comment-id-unapprove" value="'.$cid.'"></form>';
    }
    //echo $displayComments['comment_id'];
    echo '<tr><td>'.$displayComments["comment_id"].'</td>
    <td>'.$displayComments["comment"].'</td>
    <td>'.$displayComments["photo_id"].'</td>
    <td>'.$displayComments["email"].'</td>
    <td>'.$displayComments["created"].'</td>
    <td>'.$status.'</td>
    <td><form method="post">
    <input type="hidden" name="comment-id-delete" value="'.$displayComments["comment_id"].'"';
    echo '"><button type="submit" class="btn btn-danger" name="submit-delete" >Delete</button>
    <form></td></tr>';
  }
  ?>
</table>

<?php include_once '../includes/admin_footer.php'; ?>