<?php

class Contacts extends Controller{
    
  public function __construct() {
    parent::__construct();
    Contacts::contactsAction();
  }
  
    public function contactsAction() {
    $nav = Controller::nav();
    $article = 2;
    $data = ORM::forTable('articles')->where('article_id', $article)->findOne();
    $this->view->render("page", $data, $nav);

  }

}
