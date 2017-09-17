<?php

class Incidents extends Controller{
  
  private $incidentId;

  public function __construct() {
    parent::__construct();
  }
  
  public function incidentsAction() {
    $limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
    $page  = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 4;
    $query = "SELECT * FROM incidents ORDER BY startdate DESC";
    $table = 'incidents';

    $nav = Controller::nav();
    $sidebar = Controller::sidebar();
    
    $paginator  = new Paginator($query, $table);
    $data       = $paginator->getData($limit, $page);
    $pagination = $paginator->createLinks($links);
    
    $this->view->render("index", $data, $nav, $sidebar, $pagination);
  }
  
  public function incidentAction($incidentId) {
    $this->incidentId = $incidentId; 
    $nav = Controller::nav();
    $sidebar = Controller::sidebar();
    $data = DB::getRow('incidents', 'id', $this->incidentId);
    $this->view->render("incident", $data, $nav, $sidebar);

  }

}
