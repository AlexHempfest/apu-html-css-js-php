<?php 
require_once("config.php");
$page= new Page();
$page->pageTitle = "Contact Page";
ob_start();
?>
<h2> Homepage </h2>
<p>Lorem ipsum dolor </p>
<?php
$page->show(ob_get_clean());
?>