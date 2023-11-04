<?php 
require_once("config.php");
$PageInfo=array();
$PageInfo['isSecure']=false;
$PageInfo['pageTitle'] = "Registration";
$page= new Page($PageInfo);

ob_start();


$user= new User();
$form=new FormReader();
$result=$user->registerUser($form->readData());
if($result)
{
    $message="Registration was successful.";
}else
{
    $message="Something went wrong, please try again.";
}
?>
<h2> Homepage </h2>
<p>Lorem ipsum dolor </p>

<div id="mesasge">
    <?php

print $message;
    ?>
</div>
<?php
$PageContent =ob_get_clean();
$page->show($PageContent);
?>

