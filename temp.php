<!--Получаем список дорог из таблицы-->
<nav class="bg-light sidebar">
    <ul class="nav nav-pills flex-column"> 
      <?php foreach ($sidebar as $item): ?>
        <li class="nav-item">  
          <a class="nav-link" href=""><?= $item[doroga_name]; ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>
<!--Конец-->

<div class="panel panel-default">
   <div class="row">

    <form role="form" class="form-inline">

       <div class="col-md-10">

          <div class="dropdown filter-dorogi">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                Залізниці <i class="fa fa-caret-down" aria-hidden="true"></i>
          </button>
          <ul class="dropdown-menu filter-list">
            <select size = "3" >
            <?php foreach ($sidebar as $item): ?>
              <li>
                <option value = "<?= $item[doroga_name]; ?>"><?= $item[doroga_name]; ?></option>
              </li>
            <?php endforeach; ?>
            </select>
          </ul>
          </div>

        </div>

       <div class="col-md-2">
           <button class="btn btn-warning btn-md btn-filter-sub" type="submit" value="Обрати">Обрати</button>
       </div>

    </form>

   </div>
</div>

