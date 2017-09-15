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
    $this->nav = DB::run("SELECT * FROM menu")->fetchAll(); 
    return $this->nav;
  }
  
  public function sidebar()
  {
    $dorogi = DB::run("SELECT * FROM dorogi")->fetchAll();
    return $dorogi;
  }

}