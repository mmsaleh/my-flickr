<?php
require_once 'mysqldb.php';

class comment {
  public $comment_id;
  public $photo_id;
  public $email;
  public $comment;
  public $created;

  public function addComment(){
    $database = new mysqlDatabase();
    $query    = "insert into comments(photo_id, email, comment, created) values($this->photo_id, '$this->email', '$this->comment', '$this->created')";
    $database->performQuery($query);
  }


  public function fetchAllComments(){
    $database = new mysqlDatabase();
    $query    = "SELECT * FROM comments order by comment_id DESC";
    $database->performQuery($query);
    return $database->fetchAll() ? $database->fetchAll() : FALSE;
  }

  public function fetchApprovedComments(){
    $database = new mysqlDatabase();
    $query    = "SELECT * FROM comments where status='approved' order by comment_id DESC";
    $database->performQuery($query);
    return $database->fetchAll() ? $database->fetchAll() : FALSE;
  }

  public function approveComments($comment_id){
    $database = new mysqlDatabase();
    $query    = "update comments set
                    status  = 'approved' where comment_id = $comment_id";
    $database->performQuery($query);
  }

  public function unapproveComments($comment_id){
    $database = new mysqlDatabase();
    $query    = "update comments set
                    status  = 'pending' where comment_id = $comment_id";
    $database->performQuery($query);
  }

  public function deleteComments($photo_id){
    $database = new mysqlDatabase();
    $query    = "DELETE FROM comments where photo_id = '$photo_id' ";
    $database->performQuery($query);
  }

  public function deleteSingleComment($comment_id){
    $database = new mysqlDatabase();
    $query    = "DELETE FROM comments where comment_id = '$comment_id' ";
    $database->performQuery($query);
  }

  public function commentCount(){
    $database = new mysqlDatabase();
    $query    = "SELECT * FROM comments";
    $result   = $database->performQuery($query);
    echo $row_count = $result->num_rows;
  }

}
