<div class="panel panel-primary">
  <div class="panel-heading incident-data">{START}</div>
  <div class="panel-body">
    <p class="incident-adress">{DOROGA} <i class="fa fa-caret-right" aria-hidden="true"></i> 
        {OTDELENIE} <i class="fa fa-caret-right" aria-hidden="true"></i> 
        {SLUGBA} <i class="fa fa-caret-right" aria-hidden="true"></i> {LINPR}</hp>
    <p class="incident-station"><b>Станція або перегін:</b> {STANNAME}{PEREGONNAME}</hp>
    <p class="incident-brak"><b>{BRAK}</b> <i class="fa fa-caret-right" aria-hidden="true"></i> {BRAKNAME}</p>
    <p class="incident-data-time"><b>Дата та час початку події:</b> {START}</p>
    <p class="incident-data-time"><b>Дата та час завершення події:</b> {STOP}</p>
    <p class="incident-sum">{SUMNZBIT} {SUMVZBIT}</p>
<!--    <hr>-->
  </div>
  <div class="panel-footer">
      
    <?php
      foreach ($this->images as $item) {
//        echo '<img class="img-thumbnail" src="data:image/jpg;base64,'.base64_encode($item[image_data]).'">';
        echo '<a class="group3" href="data:image/jpg;base64,'.base64_encode($item[image_data]).'" title="">';
          echo '<img class="img-thumbnail" src="data:image/jpg;base64,'.base64_encode($item[image_data]).'">';
        echo '</a>';
      } 
    ?>
    <div class="full-text">{NOTES}</div>
  </div>
</div>
