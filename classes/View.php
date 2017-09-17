<?php

class View
{
  private $name;
  public $nav = [];
  public $sidebar = [];
  
  public function render($name, $data, $nav = NULL, $sidebar = NULL, $pagination = NULL)
  {
    $this->name = $name;
    $this->nav = $nav;
    $this->sidebar = $sidebar;
    require_once 'views/' . $this->name . '.php';
  }

}
