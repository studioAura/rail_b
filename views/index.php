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
            <?php
            foreach ($data as $item)
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

  </body>

</html>