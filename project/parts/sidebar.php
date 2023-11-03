<ul>    
    <?php 
$user= new User();
if($user->isLoggedUser()){

?>
  <li>  <a href="profile.php">Profile</a></li>
   <li> <a href="logout.php">Logout</a> </li>
    
<?php 
}else {?>
<li><a href="login.php">Login</a></li>
 <li>   <a href="register.php">Register</a></li>

<?php }?>
</ul>