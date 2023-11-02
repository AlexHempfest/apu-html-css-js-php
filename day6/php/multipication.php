<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multipication</title>
</head>
<body>
    

<h1> Multipication Example</h1>

<form>
    First Number : <input type="number" name="first_number" id="firstnumber" required>
    <br>
    Second Number :<input type="number" name="second_number" id="secondnumber" required>
    <br>
    <input type="submit" name="submit" value="do Multipication">
</form>

<?php 

if(isset($_GET['submit'])){
$first_number=$_GET['first_number'];
$second_number=$_GET['second_number'];

print "Multipication of the numbers you provided is :" . $first_number * $second_number;


}
?>


</body>
</html>
