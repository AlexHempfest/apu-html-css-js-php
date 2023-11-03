<?php 
require_once("config.php");
$page= new Page();
$page->pageTitle = "Profile Page";
ob_start();
$user= new User();
//var_dump($user->data)
?>
<h2> Profile Page </h2>
Welcome <?php print $user->data['username']; ?>
<?php
$page->show(ob_get_clean());
?>