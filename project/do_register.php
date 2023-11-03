<?php 
require_once("config.php");
$user= new User();
$form=new FormReader();
$result=$user->registerUser($form->readData());

var_dump($result);