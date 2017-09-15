<?php

class Router {
  
  protected $url;

  public function __construct() {
    $this->url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_SPECIAL_CHARS); 
    $this->url = rtrim($this->url, '/');
    $this->url = explode('/', $this->url);
    
    if(empty($this->url[0])){
      require 'controllers/Index.php';
      $controller = new Index();
    } else {
        $file = 'controllers/' . $this->url[0].'.php';
        if(file_exists($file)) {
            require $file;
           } else {
            require 'controllers/urlerror.php';
            $controller = new UrlError();
            return false;
           }
        $controller = new $this->url[0];
    }    
        
    //Правило - если запрошена страница 'incidents' то подключаем контроллер Index 
    if($this->url[0] === 'incidents') {
      require 'controllers/Index.php';
      $controller = new Index();
    }

    if(isset($this->url[1])) {
      $param = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
      $action = $this->url[1] . 'Action';
      require_once 'controllers/' . $this->url[0] . '.php';
      $controller = new $this->url[0]();
      $controller -> $action($param);
    }
  
    if(isset($this->url[2])) {
      $controller->$this->url[1]($this->url[2]);
    }
    
    
  }
}
