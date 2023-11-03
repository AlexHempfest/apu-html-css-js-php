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
    
 }


?>