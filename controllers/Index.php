<?php

class Index extends Controller{
    
  public function __construct() {
    parent::__construct();
    Index::indexAction();
  }
  
  public function indexAction() {

    // Пагинация 
    // Создаём объект передавая запрос и страницу 
    // Должен вернуть - массив $data со страницей и переменную $navigator с пангинацией
    $Page=1; //номер страницы которую нужно открыть по умолчанию
    if($_GET["page"]){
      $Page=$_GET["page"]; //если был произведен запрос другой страницы, то присваиваем переменной новый индекс
    } 
    
    $table = 'incidents';
    $pangination = new Pagination($Page, $table); //создаём объект
    
	echo $pangination->getPagination();//выводим запрашиваемую страницу

    $nav = Controller::nav();
    $sidebar = Controller::sidebar();
    
    $data = ORM::forTable('incidents')->order_by_desc('startdate')->findMany();
    
    $this->view->render("index", $data, $nav, $sidebar);
}

}
