<?php

class Incidents extends Controller{
  
  private $incidentId;

  public function __construct() {
    parent::__construct();
  }
  
  public function incidentsAction() {
    $nav = Controller::nav();
    $sidebar = Controller::sidebar();
    $data = DB::getRowsSort('incidents', 'startdate', 'DESC');
    $this->view->render("index", $data, $nav, $sidebar);

  }
  
  public function incidentAction($incidentId) {
    $this->incidentId = $incidentId; 
    $nav = Controller::nav();
    $sidebar = Controller::sidebar();
    $data = DB::getRow('incidents', 'id', $this->incidentId);
    $this->view->render("incident", $data, $nav, $sidebar);

  }

}
