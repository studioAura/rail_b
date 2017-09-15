<?php

  class UrlError extends Controller{
    
   public function __construct() {
    parent::__construct();
    $nav = Controller::nav();
    $data = "Ошибка 404. Такой страницы не существует.";
    $this->view->render("error", $data, $nav);
    
   }
  }
