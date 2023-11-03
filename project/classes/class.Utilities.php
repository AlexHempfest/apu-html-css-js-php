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
    
 }


?>