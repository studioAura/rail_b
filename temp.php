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

