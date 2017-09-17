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
//$_SESSION['auth']=$_GET['auth'];
setcookie('auth', $_GET['auth']);

$router = new Router();
} elseif (isset($_COOKIE['auth']) and $_COOKIE['auth'] = 'DDFTEJYKFGYR'){

  $router = new Router();
} else {
  echo 'Ошибка аутентификации';
}

//$router = new Router();  

