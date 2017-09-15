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
                $template = new Template("$_SERVER[DOCUMENT_ROOT]/views/incident-data.php");
                $template->set_tpl('{ID}', $data->id);
                $template->set_tpl('{DOROGA}', $data->doroga); 
                $template->set_tpl('{OTDELENIE}', $data->otdelen); 
                $template->set_tpl('{SLUGBA}', $data->slugb);
                $template->set_tpl('{START}', $data->startdate);
                $template->set_tpl('{STOP}', $data->enddate);
                $template->set_tpl('{LINPR}', $data->linpr);
                $template->set_tpl('{BRAK}', $data->brak);
                $template->set_tpl('{BRAKNAME}', $data->brakname);
                $template->set_tpl('{STANNAME}', $data->stanname );
                $template->set_tpl('{PEREGONNAME}', $data->peregonname);
                $template->set_tpl('{SUMNZBIT}', $data->sumnzbit);
                $template->set_tpl('{SUMVZBIT}', $data->sumvzbit);
                $template->set_tpl('{NOTES}', $data->note);
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

  </body>

</html>