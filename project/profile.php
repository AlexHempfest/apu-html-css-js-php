<?php 
require_once("config.php");
$PageInfo=array();
$page= new Page();
$user= new User();
$PageInfo['isSecure']=true;
$PageInfo['pageTitle'] = "Profile";
ob_start();

$profile= new Profile();
$profileInfo=$profile->getProfile($_SESSION['username']);

Utilities::details($profileInfo);
?>
<h2> Profile Page </h2>
Welcome <?php print $user->data['username']; ?>
<?php
$PageInfo['pagecontent'] =ob_get_clean();
$page->show($PageInfo);
?>