<!--<h2 class="post-title">{START}</h2>
<h6 class="post-title">{DOROGA} > {OTDELENIE} > {SLUGBA} > {LINPR}</h6>
<h6 class="post-title">{STANNAME} {PEREGONNAME}</h6>
<h6 class="post-title">{BRAK} > {BRAKNAME}</h6>
<p class="data-time">Дата начала: {START} | Дата завершения: {STOP}</p>
<p><a class="btn btn-primary btn-md" href="/incidents/incident?id={ID}">подробнее...</a></p>
<hr>-->


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
 
  </div>
 <div class="panel-footer text-right"><a class="btn btn-primary btn-md readmore" href="/incidents/incident?id={ID}">докладніше...</a></div>
</div>

