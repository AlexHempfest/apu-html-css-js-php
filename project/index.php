<?php 
require_once("config.php");
$PageInfo=array();
$page= new Page();
$PageInfo['isSecure']=false;
$PageInfo['pageTitle'] = "Homepage";
ob_start();
?>
<h2> Homepage </h2>
<p>Lorem ipsum dolor </p>
<?php
$PageInfo['pagecontent'] =ob_get_clean();
$page->show($PageInfo);
?>