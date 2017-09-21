<?php

class View
{
  private $name;
  public $nav = [];
  public $sidebar = [];
  public $images = [];
  
  public function render($name, $data, $nav = NULL, $sidebar = NULL, $pagination = NULL, $images = NULL)
  {
    $this->name = $name;
    $this->nav = $nav;
    $this->sidebar = $sidebar;
    $this->images = $images;
    require_once 'views/' . $this->name . '.php';
  }

}
