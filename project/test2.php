<?php 
require_once("config.php");
$page= new Page();
$page->pageTitle = "My Test Page 2";
ob_start();
?>
<h2> Welcome to our website Test Pag 2 </h2>
<p>Lorem ipsum dolor </p>
<?php
$page->show(ob_get_clean());
?>