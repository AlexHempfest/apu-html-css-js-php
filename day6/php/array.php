<?php 
/*


$fruits= array(
    "Apple",
  "Banana",
    "Orange",
    "Pear"
    );

    $fruits= array(
    "a"=>"Apple",
    "b"=>"Banana",
    "c"=>"Orange",
    "d"=>"Pear"
    );
*/


    

//var_dump($fruits);
/*
for($i= 0;$i<count($fruits);$i++){
   print $fruits[$i];
    print "<br>";

}


foreach($fruits as $fruit) {

    print $fruit;
    print "<br>";
}
*/
/**
 * 
 * I am not responsible for this, I was made to do so
 */
$fruits=file("fruits.txt");
foreach($fruits as $key=>$fruit) {

    print "$key : $fruit";
    print "<br>";
}
?>