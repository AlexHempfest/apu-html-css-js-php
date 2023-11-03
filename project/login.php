<?php 
require_once("config.php");
$page= new Page();
$page->pageTitle = "Login Page";
ob_start();
$user= new User();
if($user->isLoggedUser()){
    $user->doAfterLoginActions();
}
?>
<h2> Login </h2>
<form action="do_login.php" method="POST">
    User Name <input type="text" name="username"></br>
    Password <input type="password" name="password"></br>
    <input type="submit" name="submit" value="Login">
</form>

<?php
$page->show(ob_get_clean());
?>