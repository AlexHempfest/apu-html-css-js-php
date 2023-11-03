<?php 
require_once("config.php");
//$user= new User();
//Utilities::details($user->getAllusers());
$profile= new Profile();
$ProfileInfo=$profile->getProfile("zareef");

$ProfileInfo['first_name']="My First Name 79";
$profile->saveProfile($ProfileInfo);
//Utilities::details($ProfileInfo);


?>