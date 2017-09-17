<?php

class Router
 {

  public function __construct()
  {
    
    $url = explode('/', $_SERVER['REDIRECT_URL']);

    if(empty($url[0]) AND empty($url[1]))
    { 
      require_once 'controllers/Index.php';
      $controller = new Index();
      $controller -> index();
    } elseif (!empty($url[1]) AND empty($url[2]))
    {
      $class = $url[1];
      $action = $url[1] . 'Action';
      $file = 'controllers/' . $class . '.php';
        if(file_exists($file)) {
          require_once $file;
          } else {
          require 'controllers/UrlError.php';
          $controller = new UrlError();
          return false;
        }
      $controller = new $class();
      $controller -> $action();
    } elseif(!empty($url[1]) AND !empty($url[2]))
    {
      $param = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);     
      $class = $url[1];
      $action = $url[2] . 'Action';
      $file = 'controllers/' . $class . '.php';
        if(file_exists($file)) {
          require_once $file;
          } else {
          require 'controllers/UrlError.php';
          $controller = new UrlError();
          return false;
        }
      $controller = new $class();
      $controller -> $action($param);
    }
  } 
 }

