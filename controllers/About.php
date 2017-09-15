<?php

class About extends Controller{
    
  public function __construct() {
    parent::__construct();
    About::aboutAction();
  }
  
    public function aboutAction() {
    $nav = Controller::nav();
    $article = 1;
    $data = ORM::forTable('articles')->where('article_id', $article)->findOne();
    $this->view->render("page", $data, $nav);

  }

}
