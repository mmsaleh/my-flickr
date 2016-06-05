</div>
<!-- /.row -->
<hr>

<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <center><p>Copyright &copy; Flickr <?php echo date("Y"); ?></p></center>
        </div>
    </div>
    <!-- /.row -->
</footer>
</div>
<script type="text/javascript" src= "js/jquery.js"></script>
<script type="text/javascript" src= "js/bootstrap.min.js"></script>
<script type="text/javascript" src= "js/app.js"></script>
<script>
  $(document).ready(function(){
    $('.img-zoom').hover(function() {
        $(this).addClass('transition');

    }, function() {
        $(this).removeClass('transition');
    });
  });
</script>
</body>

</html>