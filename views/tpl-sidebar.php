<div class="col-lg-4 mx-auto">
  <div class="sidebar-search">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="поиск...">
      <span class="input-group-btn">
        <button class="btn btn-secondary" type="button">Найти!</button>
      </span>
    </div>
  </div>
  <h4 class="sidebar-title">Категории</h4>
  <nav class="bg-light sidebar">
    <ul class="nav nav-pills flex-column">
      <?php foreach ($sidebar as $item): ?>
        <li class="nav-item">
          <a class="nav-link" href=""><?= $item->doroga_name; ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>
  <p style="text-align: justify">Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в</p>

</div>