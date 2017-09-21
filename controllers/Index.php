<?php

class Index extends Controller{
    
  public function __construct() {
    parent::__construct();
  }
  
  public function index() {
    
    $limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
    $page  = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 4;
    $query = "SELECT * FROM incidents";
    $table = 'incidents';

    $nav = Controller::nav();
    $sidebar = Controller::sidebar();
    
    $paginator  = new Paginator($query, $table);
    $data       = $paginator->getData($limit, $page);
    $pagination = $paginator->createLinks($links);
    
    $this->view->render("index", $data, $nav, $sidebar, $pagination);
  }

  
  public function indexAction() {
    
    $limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
    $page  = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 4;
    $query = "SELECT * FROM incidents";
    $table = 'incidents';

    $nav = Controller::nav();
    $sidebar = Controller::sidebar();
    
    $paginator  = new Paginator($query, $table);
    $data       = $paginator->getData($limit, $page);
    $pagination = $paginator->createLinks($links);
    
    $this->view->render("index", $data, $nav, $sidebar, $pagination);
  }

}
