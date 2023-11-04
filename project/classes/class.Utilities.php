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
 }


?>