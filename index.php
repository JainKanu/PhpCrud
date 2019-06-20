<?php

include("crud.php");


$DB =  new CRUD();
$query = "SELECT * FROM user";
// CRUD::BAR();
// $DB->foo();
// $DB->bar();
$DB->getRecords($query);
echo "<pre>";
print_r($DB->data);
echo "</pre>";
// include("lib/mysql.php");
// include_once("lib/mysql.php");
// require("lib/mysql.php");
// require("lib/mysql.php");
// require_once("lib/mysql.php");







?>