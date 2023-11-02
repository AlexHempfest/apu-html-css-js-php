<?php 
/// method of the form was GET , and default is GET only
$number1=$_GET['number1'];
$number2=$_GET['number2'];

print "Sum of the numbers that you put is : " . doSum($number1,$number2 );



function doSum($number1,$number2) { 
    return $number1+$number2;
    }

