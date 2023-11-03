<?php 

class Profile{
    public $conn;
    public function __construct(){
        $this->conn = Utilities::getDbConnection(); 
    }


    function getProfile($username){

     
             $query ="select * from profile where username='$username'";
     
             $result = $this->conn->query($query);
             $row=$result->fetch_assoc();
     //$this->data=$row;
     return $row;
    }
    function saveProfile($ProfileInfo){
        // We will use this method to create as well as update the user.
    /// if profile id is presentin the ProfileInfo I will update the profile
    // if profile id is not present, I will create a new profile.

    if(isset($ProfileInfo["id"]))
    {
        // Its a update Request
 $id=$ProfileInfo["id"];
        $query = "update profile set ";
        unset($ProfileInfo['id']);
        $FieldsArray=array();
        foreach($ProfileInfo as $key=>$value){  
            $FieldsArray[]=" `$key`='$value'";


        }
  $query .=implode(",",$FieldsArray);
        $query .=" where `id` ='$id'";

       $this->conn->query($query);

    }
    
    }

    function searchProfile($SearchCriteria){

    }


}