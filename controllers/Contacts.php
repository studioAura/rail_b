<?php

class Contacts extends Controller{
    
  public function __construct() {
    parent::__construct();
    Contacts::contactsAction();
  }
  
    public function contactsAction() {
    $nav = Controller::nav();
    $sidebar = Controller::sidebar();
    $article = 2;
    $data = DB::getRow('articles', 'article_id', $article);  
    $this->view->render("page", $data, $nav, $sidebar);
  }

}
