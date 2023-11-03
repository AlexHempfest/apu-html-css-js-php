<?php 
require_once("config.php");

$user= new User();
$UserInfo=array(
    "username"=>"zareef",
    "password"=>"zareef"
);

//$result=$user->registerUser($UserInfo);
$result=$user->isUsernameAvailable("zareef2");
var_dump($result);

