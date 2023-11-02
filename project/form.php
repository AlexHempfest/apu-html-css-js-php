<?php 
require_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
 include("style.php");
 ?>
</head>


<body>
<div id="container">
<div id="header">
<?php 
include("header.php");
?>
</div>
<div id="mainarea">
<div id="sidebar">
<?php 
include("sidebar.php");
?>
</div>
<div id="content">
<h2> Welcome to our website</h2>

<form action="process_form.php" method="POST">
<input type="text" name="first_name">
<input type="text" name="last_name">
<input type="text" name="email">
<input type="text" name="dob">
<input type="text" name="city">
<input type="text" name="zipcode">

<input type="submit" value="Submit">

    </form>

</div>
</div>
<div id="footer">

&copy 2023

</div>
</div>

</body>
</html>

