<?php

class Help extends Controller {
  
  private $param;
  
  public function __construct()
  {
    parent::__construct();
    echo 'Controller Help';
  }
  
  public function otherAction($param = NULL) {
    $this->param = $param; 
    $this->view->render("other", $this->param);
  }


}
