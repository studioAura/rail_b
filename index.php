<?php

// Константы:
define ('DIRSEP', DIRECTORY_SEPARATOR);

// Автозагрузка классов
spl_autoload_register ( function ($class_name) {
  $filename = strtolower($class_name) . '.php';
  $file = __DIR__ . DIRSEP . 'classes' . DIRSEP . $filename;
  if (file_exists($file) == false) {
    return false;
  }
  include ($file);
});

require_once 'libs/idiorm.php';
require_once 'config/config.php';

$router = new Router();  

