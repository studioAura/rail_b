<?php

class About extends Controller{
    
  public function __construct() {
    parent::__construct();
    About::aboutAction();
  }
  
    public function aboutAction() {
    $nav = Controller::nav();
    $sidebar = Controller::sidebar();
    $article = 1;
    $data = DB::getRow('articles', 'article_id', $article);  
    $this->view->render("page", $data, $nav, $sidebar);

  }

}
