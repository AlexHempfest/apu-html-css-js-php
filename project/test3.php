<?php 

print "Test3";


$shouldWrite=true;
$doRedirect=true;

if($doRedirect)
{
  header("location:index.php"); 
  exit();
//writefile("I am from line number ".__LINE__);
}





writefile("I am from line number ".__LINE__);


function writefile($content) 
{

   file_put_contents("myfile.txt","$content ".date("h:i:s"));
 }

