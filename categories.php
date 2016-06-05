<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/photo.php'; ?>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
$(document).ready(function(){
  $('#content').load('all.php');
  $("a.choose").click(function(event){
    event.preventDefault();
    var page = $(this).attr('href');
    $("#content").load('all.php');
    $.ajax({
      type: "GET",
                        url: page + ".php",
                        cache: false,
                        success: function(data)
                        {
                            $("#content").html("");
                            $("#content").append(data);
                        }
            });
  });
});
</script>

<h1 class="page-header">Browse by Category</h1>
<a href="all" class="btn btn-default choose">All</a>
<a href="nature" class="btn btn-default choose">Nature</a>
<a href="places" class="btn btn-default choose">Places</a>
<a href="technology" class="btn btn-default choose">Technology</a>
<hr>

<div class="columns" id="content">
</div>
</div>
</div>
<!-- /.row -->
<?php include_once 'includes/footer.php'; ?>

