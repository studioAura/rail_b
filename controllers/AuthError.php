<?php

class AuthError extends Controller{
    
  public function __construct() {
    parent::__construct();
  }
  
    public function errorAction() {
//    $nav = Controller::nav();
//    $sidebar = Controller::sidebar();
//    $article = 1;
//    $data = DB::getRow('articles', 'article_id', $article);  
//    $this->view->render("page", $data, $nav, $sidebar);
      
    echo 'Вы не зарегистированы';

  }

}