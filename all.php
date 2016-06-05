<?php require_once 'includes/photo.php';
$photos = new photo();
$photoSet = $photos->fetchAllPhotos();

foreach($photoSet as $displayPhoto) {
  $id = $displayPhoto['photo_id'];
  echo "<div class='pin'>";
  echo "<a href ='view_photo.php?photo_id=";
  echo $id;
  echo "'><img class='img img-zoom' src='img/";
  echo $displayPhoto['name'];
  echo "'/></a></div>";
}
?>