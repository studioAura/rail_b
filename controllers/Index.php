<?php

class Index extends Controller{
    
  public function __construct() {
    parent::__construct();
    //Index::indexAction();
  }
  
  public function indexAction() {

    $nav = Controller::nav();
    $sidebar = Controller::sidebar();
    $data = DB::getRowsSort('incidents', 'startdate', 'DESC');
    $this->view->render("index", $data, $nav, $sidebar);
}

}
