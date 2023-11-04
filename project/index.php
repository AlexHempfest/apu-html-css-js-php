<?php 
require_once("config.php");
$PageInfo=array();
$PageInfo['isSecure']=false;
$PageInfo['pageTitle'] = "Homepage";
$page= new Page($PageInfo);

ob_start();
?>
<h2> Homepage </h2>
<p>Lorem ipsum dolor </p>
<?php
$PageContent=ob_get_clean();
$page->show($PageContent);
?>