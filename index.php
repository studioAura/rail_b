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



if (isset($_GET['auth'])){

session_start();
setcookie('auth', $_GET['auth']);

$router = new Router();
} elseif (isset($_COOKIE['auth']) and $_COOKIE['auth'] = 'DDFTEJYKFGYR'){

  $router = new Router();
} else {
    require_once 'controllers/AthError.php';
    $controller = new AthError();
    $controller->error();
}

//$router = new Router();  

