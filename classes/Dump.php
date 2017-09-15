<?php

class Dump {
  
  public static function d($param) {
    echo '<pre>';
      var_dump($param);
    echo '</pre>';
  }
}
