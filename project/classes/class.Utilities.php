<?php 
class Utilities {  


    static function isValidEmail($email) { 
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    static function details($data) { 
        print "<pre>";
        print_r($data);
        print "</pre>";
    }


    static function getDbConnection(){
$conn=false;

try{
       $conn= new Mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, DATABASE);
}catch(Exception $e){   
    
    include("parts/error.php");
    exit();
 
}



       return $conn;
    }
  
    
    
static function randomString($length = 10) {  
    $characters = "a b c d e f g h i j k l m n o p q r s t u v w x y z";
    $characters=str_replace(" ","", $characters);
    //print $characters;
    $charactersLength = strlen($characters);
    $randomString = ""; 
        for ($i = 0; $i < $length; $i++) {  
            $randomString .= $characters[rand(0, $charactersLength -1)];
        }

      return $randomString;

 }


 static function getPaginationBar($totalcount,$pagecount,$pagenumber=1)
 {
    if($pagenumber>0)
    {

    }

 if($pagecount<$totalcount) {
   // print "I am at line number ".__LINE__;
    $howmanypage = ceil($totalcount/$pagecount);

   // print "<a href-''> Previous </a>";
 $nextpagenumber=$pagenumber+1;
 $lastpagenumber=$pagenumber- 1;
 //var_dump($lastpagenumber);
 if($lastpagenumber!=0){
 print "<a href='?{$_SERVER['QUERY_STRING']}&pagenumber=$lastpagenumber'> Previous</a>  ";
 }

 if($howmanypage>$nextpagenumber){
    print "<a href='?{$_SERVER['QUERY_STRING']}&pagenumber=$nextpagenumber'> Next</a>";
 }

 }else{
    //print "I am at line number ".__LINE__;
 }

 }
 }


?>