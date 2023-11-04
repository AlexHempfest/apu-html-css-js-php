<?php 
require_once("config.php");
$PageInfo=array();
$PageInfo['isSecure']=false;
$PageInfo['pageTitle'] = "Register";
$page= new Page($PageInfo);

$user = new User();

ob_start();

if($user->isLoggedUser())
{
   
    header("location:profile.php");
    exit();
}
?>
<h2> Registration </h2>
<form action="do_register.php" method="POST">
    User Name <input type="text" name="username"></br>
    Password <input type="password" name="password"></br>
    Retype Password <input type="password" name="retypepassword"></br>
    <input type="submit" name="submit" value="Register">
</form>
<?php
$PageContent =ob_get_clean();
$page->show($PageContent);
?>