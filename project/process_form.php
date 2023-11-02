<?php
require_once("config.php");
$formReader= new FormReader();
//$formReader->method="POST";
//$formReader->readData();

$formReader->printData();

//var_dump($formReader->last_name);
//print "<br>";
//print "<pre>";
//var_dump($formReader);
//print_r($formReader);
//print "</pre>";
//details($formReader->first_name);
//details($formReader);
//$utils=new Utilities();
var_dump(Utilities::isValidEmail("zareef@zareef.com"));
?>
