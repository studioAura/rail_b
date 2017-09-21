<?php

class Template
  {
  public $vars   = array();
  public $template;
  public $images;

  public function __construct($tpl_name, $images = NULL)
   {
   if(empty($tpl_name) || !file_exists($tpl_name))
    {
    return false;
    }
   else
    {
      ob_start();
        $this->images = $images;
        include ($tpl_name);
        $this->template = ob_get_contents();
      ob_end_clean();
    }
   }

  public function set_tpl($key,$var)
   {
   $this->vars[$key] = $var;
   }

  public function tpl_parse()
   {
   foreach($this->vars as $find => $replace)
       {
       $this->template = str_replace($find, $replace, $this->template);
       }
   }
  }
