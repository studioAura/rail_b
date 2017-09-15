<!DOCTYPE html>
<html lang="en">

<?php include'tpl-head.php'; ?>

  <body>

    <?php include'tpl-nav.php'; ?>

    <?php include'tpl-header.php'; ?>

    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
              <h1><?=$data?></h1> 
          </div>
          <?php include'tpl-sidebar.php'; ?>
        </div>
      </div>
    </section>

    <?php include'tpl-footer.php'; ?>
      
    <!-- Bootstrap core JavaScript -->
    <script src="assets/template/vendor/jquery/jquery.min.js"></script>
    <script src="assets/template/vendor/popper/popper.min.js"></script>
    <script src="assets/template/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="assets/template/vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>