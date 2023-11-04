<?php 

class Profile{
    public $conn;
    public function __construct(){
        $this->conn = Utilities::getDbConnection(); 
    }


    function getProfile($username){

     
             $query ="select * from profile where username='$username'";
     
             try{
             $result = $this->conn->query($query);
             $row=$result->fetch_assoc();
   
     return $row;
             }catch(Exception $e){
                if(SHOW_MYSQL_ERROR===true&&get_class($e)=="mysqli_sql_exception")
                {
                    print $this->conn->error;
                }
                return false; 
            }
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


        try{
       $this->conn->query($query);
        }catch(Exception $e){
            if(SHOW_MYSQL_ERROR===true&&get_class($e)=="mysqli_sql_exception")
            {
                print $this->conn->error;
            }
            return false;
        }
    }
    
    }

    function searchProfile($SearchCriteria=array()){
        $rows=isset($SearchCriteria["rows"]) ? $SearchCriteria["rows"] : 25;
        $start=isset($SearchCriteria["start"]) ? $SearchCriteria["start"] :0;


        $Profiles=array();

        $query = "select   ";

 if(isset($SearchCriteria["return_col"])&&is_array( $SearchCriteria["return_col"]))
{

    $ReturnColArray=[];
    foreach($SearchCriteria['return_col'] as $value){
        $ReturnColArray[]= "`$value`";
    }

    $query .= implode(", ",$ReturnColArray);
 }else{
    $query .= " * ";
 }


 $query .="from profile where `status`='1'" ;


        if (isset($SearchCriteria['search_col'])){ 
        $SearchColArray=[];
        foreach($SearchCriteria['search_col'] as $key=>$value){
            $SearchColArray[]= "`$key` like '$value'";
        }

        $query .= " AND ".implode(" AND ",$SearchColArray);
    }
if (isset($SearchCriteria['order'])){
        $OrderArray=[];
        foreach($SearchCriteria['order'] as $key=>$value){
            $OrderArray[]= "`$key` $value";
        }

        $query .= " order by ".implode(",",$OrderArray);
    }

    $query .= " limit $start, $rows";
  
    print $query;

        try{
            $result = $this->conn->query($query);
            
            while($row=$result->fetch_assoc())
            {
                $Profiles[]=$row;
            }
        } catch (Exception $e) {    
    
            if(SHOW_MYSQL_ERROR===true&&get_class($e)=="mysqli_sql_exception")
            {
                print $this->conn->error;
            }
            return false;
        }
        return $Profiles;




    }


    public function getAllDepartments(){
        $Departments=array();
        $query = "select DISTINCT department from profile"; // To avoid large result set, we are putting a limit

        try{
            $result = $this->conn->query($query);
            
            while($row=$result->fetch_assoc())
            {
                $Departments[]=$row;
            }
        } catch (Exception $e) {    
    
            if(SHOW_MYSQL_ERROR===true&&get_class($e)=="mysqli_sql_exception")
            {
                print $this->conn->error;
            }
            return false;
        }
        return $Departments;


    }


}