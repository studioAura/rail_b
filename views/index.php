<!DOCTYPE html>
<html lang="en">

<?php include 'tpl-head.php'; ?>

  <body>

    <?php include'tpl-nav.php'; ?>

    <?php include'tpl-header.php'; ?>
      
    <section class="posts">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto"> 
            <?php include'tpl-filter.php'; ?>  
            <?php 
            foreach ($data->data as $item)
              {
                $template = new Template("$_SERVER[DOCUMENT_ROOT]/views/index-data.php");
                $template->set_tpl('{ID}', $item[id]);
                $template->set_tpl('{DOROGA}', $item[doroga]); 
                $template->set_tpl('{OTDELENIE}', $item[otdelen]); 
                $template->set_tpl('{SLUGBA}', $item[slugb]);
                $template->set_tpl('{START}', $item[startdate]);
                $template->set_tpl('{STOP}', $item[enddate]);
                $template->set_tpl('{LINPR}', $item[linpr]);
                $template->set_tpl('{BRAK}', $item[brak]);
                $template->set_tpl('{BRAKNAME}', $item[brakname]);
                $template->set_tpl('{STANNAME}', $item[stanname]);
                $template->set_tpl('{PEREGONNAME}', $item[peregonname]);
                $template->set_tpl('{SUMNZBIT}', $item[sumnzbit]);
                $template->set_tpl('{SUMVZBIT}', $item[sumvzbit]);
                $template->tpl_parse();
                echo $template->template;
              }
              echo $pagination;
            ?>
          </div>
          <?php include'tpl-sidebar.php'; ?>
        </div>
      </div>
    </section>
    <?php include'tpl-footer.php'; ?>
      
    <!-- Bootstrap core JavaScript -->
    <script src="/assets/template/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/template/vendor/popper/popper.min.js"></script>
    <script src="/assets/template/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/template/vendor/bootstrap/js/bootstrap-select.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="/assets/template/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/assets/template/colorbox/jquery.colorbox-min.js"></script>
    <script src="/assets/template/js/jquery.ui.totop.js" type="text/javascript"></script>
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