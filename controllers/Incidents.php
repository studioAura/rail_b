<?php

class Incidents extends Controller{
  
  private $incidentId;


  public function __construct() {
    parent::__construct();
  }
  
  public function incidentsAction() {
    $nav = Controller::nav();
    $data = ORM::forTable('incidents')->order_by_desc('startdate')->findMany();
    $this->view->render("index", $data, $nav);

  }
  
  public function incidentAction($incidentId) {
    $this->incidentId = $incidentId; 
    echo 'ID = ' . $this->incidentId;
    $nav = Controller::nav();
    $data = ORM::forTable('incidents')->where('id', $this->incidentId)->findOne();
    $this->view->render("incident", $data, $nav);

  }

}
