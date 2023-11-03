
<div id="title"><?php print WEBSITE_TITLE; ?></div>
<div id="navigation"> 
    <a href="/project">Home</a>
    | 
    <a href="contact.php">Contact Us</a>

    <?php 
$user= new User();
if($user->isLoggedUser()){

?>
    <a href="profile.php">Profile</a>
    <a href="logout.php">Logout</a>
    
<?php 
}else {?>
<a href="login.php">Login</a>
    <a href="register.php">Register</a>

<?php }?>
</div>
