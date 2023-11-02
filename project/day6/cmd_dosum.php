<?php 
print  "Enter your first number ";
$first = fgets(STDIN);

print  "Enter your second number ";
$second = fgets(STDIN);


print "Sum of your numbers is :" . doSum($first,$second);


function doSum($first, $second) {  
    return $first + $second;
 }
 
