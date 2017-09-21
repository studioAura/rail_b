<?php

require_once 'classes/DB.php';

$sql = "SELECT * FROM incidents WHERE doroga='Півд' LIMIT 0, 10";

$result = DB::run($sql);

var_dump($result);
