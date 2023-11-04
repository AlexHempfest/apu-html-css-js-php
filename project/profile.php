<?php 
require_once("config.php");
$PageInfo=array();
$PageInfo['isSecure']=true;
$PageInfo['pageTitle'] = "Profile";
$page= new Page($PageInfo);
$user= new User();
ob_start();

$profile= new Profile();
$profileInfo=$profile->getProfile($_SESSION['username']);
writefile("This is from profile");
Utilities::details($profileInfo);
?>
<h2> Profile Page </h2>
Welcome <?php print $user->data['username']; ?>
<?php
$PageContent =ob_get_clean();
$page->show($PageContent);
?>