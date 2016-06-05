<?php
require_once 'mysqldb.php';

class photo {
    public $name;
    public $caption;
    public $size;


    public function uploadPhoto(){
        if(is_array($_FILES['file'])){
            move_uploaded_file($_FILES['file']['tmp_name'], "../img/".$_FILES['file']['name']);
            $this->insertPhoto();
            echo "image saved to images folder";
        }else{
            echo "image not uploaded";
        }
    }

    public function insertPhoto(){
        $database = new mysqlDatabase();
        $query    = "insert into photos(name, caption, size) values('$this->name', '$this->caption', '$this->size')";
        $database->performQuery($query);
        echo "photo added to database";
    }

    public function fetchAllPhotos(){
        $database = new mysqlDatabase();
        $query    = "SELECT * FROM photos";
        $database->performQuery($query);
        return $database->fetchAll() ? $database->fetchAll() : FALSE;
    }

    public function countAllPhotos(){
      $database = new mysqlDatabase();
      $query    = "SELECT count(*) as count FROM photos";
      $database->performQuery($query);
      return $database->fetchAll() ? $database->fetchAll() : FALSE;
    }

    public function fetchById($photo_id){
        $database = new mysqlDatabase();
        $query    = "SELECT * FROM photos where photo_id ='$photo_id'";
        $database->performQuery($query);
        return $database->fetchAll() ? $database->fetchAll() : FALSE;
    }

    public function fetchByCategory($category){
        $database = new mysqlDatabase();
        $query    = "SELECT * FROM photos where category ='$category'";
        $database->performQuery($query);
        return $database->fetchAll() ? $database->fetchAll() : FALSE;
    }

    public function paginatePhotos($perpage, $offset){
       $database = new mysqlDatabase();
       $query    = "select * from photos limit $perpage offset $offset";
       $database->performQuery($query);
       return $database->fetchAll() ? $database->fetchAll() : FALSE;
   }

   public function paginatePhotosByCategory($perpage, $offset, $category){
      $database = new mysqlDatabase();
      $query    = "select * from photos where category = $category limit $perpage offset $offset";
      $database->performQuery($query);
      return $database->fetchAll() ? $database->fetchAll() : FALSE;
  }

    public function deletePhoto($photo_id, $name){
      $database = new mysqlDatabase();
      $query    = "DELETE  FROM photos WHERE photo_id = '$photo_id'";
      $database->performQuery($query);
      // add unlink to delete photo from images folder
      unlink("../img/$name");
      return TRUE;
    }

    public function photoCount(){
      $database = new mysqlDatabase();
      $query    = "SELECT * FROM photos";
      $result   = $database->performQuery($query);
      echo $row_count = $result->num_rows;
    }

}