<?php

class Controller
{
  public $nav = [];
  
  public function __construct()
  {
    $this->view = new View();
  }
  
  public function nav()
  {
    $this->nav = ORM::forTable('menu')->findMany();
    return $this->nav;
  }
  
  public function sidebar()
  {
    $dorogi = ORM::forTable('dorogi')->findMany();
    return $dorogi;
  }

}