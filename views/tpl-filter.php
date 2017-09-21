
<!--Что за дороги - ДПДон и ПідУЗ-->

<div class="panel panel-default">
   <div class="row">

       <form action="/index.php"role="form" class="form-inline"  method="POST">
       <div class="col-md-10">
          <div class="dropdown filter-dorogi">

            <select class="selectpicker" name="doroga">
            <?php foreach ($sidebar as $item): ?>
                <option value = "<?= $item[doroga_short_name]; ?>"><?= $item[doroga_name]; ?></option>
            <?php endforeach; ?>
            </select>
            
            <!-- Логика выбора дирекции от выбранной дороги? -->
            <!-- В начале не выбрана ни одна дорога -->
<!--            <select class="selectpicker" name="direkciya">-->
            <?php // foreach ($sidebar as $item): ?>
<!--                <option value = "<?php //echo $item[doroga_short_name]; ?>"><?php //echo $item[doroga_name]; ?></option>-->
            <?php // endforeach; ?>
            <!--</select>-->

          </div>
        </div>

       <div class="col-md-2">
           <button class="btn btn-warning btn-md btn-filter-sub" type="submit" value="Обрати">Обрати</button>
       </div>

    </form>

   </div>
</div>