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
           <?php
                $template = new Template("$_SERVER[DOCUMENT_ROOT]/views/page-data.php");
                $template->set_tpl('{TITLE}', $data[article_title]); 
                $template->set_tpl('{TEXT}', $data[article_text]);
                $template->tpl_parse();
                echo $template->template;
            ?>    
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
    <script src="assets/template/js/jquery.ui.totop.js" type="text/javascript"></script>
    <!-- Starting the plugin -->
<!--    <script src="assets/template/js/plugin.js" type="text/javascript"></script>-->
    
    <script type="text/javascript">
      $(document).ready(function() {

      var defaults = {
      containerID: 'toTop', // fading element id
      containerHoverID: 'toTopHover', // fading element hover id
      scrollSpeed: 1200,
      easingType: 'linear'
      };


      $().UItoTop({ easingType: 'easeOutQuart' });

      });
    </script>

  </body>

</html>