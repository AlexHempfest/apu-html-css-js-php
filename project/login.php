<?php 
require_once("config.php");
$PageInfo=array();
$PageInfo['isSecure']=false;
$PageInfo['pageTitle'] = "Login ";
$page= new Page($PageInfo);
$user = new User();

ob_start();

if($user->isLoggedUser())
{
    header("location:profile.php");
    exit();
}
?>
<h2> Login </h2>
<form action="do_login.php" method="POST">
    User Name <input type="text" name="username"></br>
    Password <input type="password" name="password"></br>
    <input type="submit" name="submit" value="Login">
</form>

<?php
$PageContent =ob_get_clean();
$page->show($PageContent);
?>