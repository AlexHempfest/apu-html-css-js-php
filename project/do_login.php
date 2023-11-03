<?php 
require_once("config.php");
$user= new User();
$form=new FormReader();
$result=$user->checkLogin($form->readData());

if($result){
    $user->doLogin($form->readData());
}else{
    header("location:login.php");
}
