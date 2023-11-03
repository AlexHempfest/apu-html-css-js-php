<?php 
require_once("config.php");
$page= new Page();
$page->pageTitle = "Registration";
ob_start();
$user= new User();
if($user->isLoggedUser()){
    $user->doAfterLoginActions();
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
$page->show(ob_get_clean());
?>