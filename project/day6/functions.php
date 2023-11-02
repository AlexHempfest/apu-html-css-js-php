<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Functions</title>
</head>
<body>
    <form action="do_actions.php" method="get">

    Number 1 <input type="text" name="number1">
    <br>
    Number 2 <input type="text" name="number2">
    <br>
    <input type="submit" value="Submit">
</form>
    
</body>
</html>








<?php 

//sayHello("ABC"); // Will it work , 1. NO, 2. Yes 


function sayHello($name)
{

    print "Hello  $name !! ";
}



?>

