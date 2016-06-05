<?php include_once 'includes/header.php'; ?>
<?php require_once 'includes/photo.php'; ?>
                <div class="columns" >
                <?php
                $photos = new photo();
                $photoCount = $photos->countAllPhotos();
                $photoCount = $photoCount[0]['count'];
                $perpage    = 6;
                $totalPages = ceil($photoCount / $perpage);
                //$photoSet = $photos->fetchAllPhotos();
                 if(!isset($_GET['page'])){
                   $_GET['page'] = 1;
                 }
                $offset     = ($_GET['page'] - 1) * $perpage;
                $photoSet   = $photos->paginatePhotos($perpage, $offset);


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
              </div>
  <nav class="text-center">
  <ul class="pagination">
    <?php
      if(empty($_GET['page']) || $_GET['page']==1){
        echo '<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
      }else{
        echo '<li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
      }
    ?>

    <?php for($i=1; $i<=$totalPages; $i++){
      if(!empty($_GET['page']) && $_GET['page']==$i){
        echo "<li class='active'><a href='index.php?page=$i'> $i </a></li>";
      }else{
        echo "<li><a href='index.php?page=$i'> $i </a></li>";
      }
    } ?>
    <?php
      if(!empty($_GET['page']) && $_GET['page']==$totalPages){
        echo '<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
      }else{
        echo '<li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
      }
    ?>
  </ul>
</nav>
            </div>
        </div>
        <!-- /.row -->
<?php include_once 'includes/footer.php'; ?>