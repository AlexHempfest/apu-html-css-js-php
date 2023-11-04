<?php

class User
{
    private $conn;
    public $data;

    public function __construct()
    {
        $this->conn = Utilities::getDbConnection();
    $this->data = $this->getLoggedInUserInfo();
    //$this->data[""]
    }

    public function checkLogin(array $UserInfo): bool
    {

        $password = md5($UserInfo['password']);
        $query = <<<HERE
        select username from users where
        `username`='{$UserInfo['username']}' AND `password`='$password'
HERE;

try {
        $result = $this->conn->query($query);
} catch (Exception $e) {
    
    if(SHOW_MYSQL_ERROR===true&&get_class($e)=="mysqli_sql_exception")
    {
        print $this->conn->error;
    }

    return false;

}
        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }


    }
    public function registerUser(array $UserInfo)
    {


        $username = $UserInfo['username'];
        $password = $UserInfo['password'];

        $query = <<<here
        INSERT INTO `users` 
        (
        `username`, 
        `password`) 
        VALUES (
         '$username', 
         MD5('$password'));
here;

  try{   
        $result = $this->conn->query($query);
  

        return $result;
  } catch (Exception $e) {  
    if(SHOW_MYSQL_ERROR===true&&get_class($e)=="mysqli_sql_exception")
    {
        print $this->conn->error;
    }
    return false;
  }
        
    }


    public function isUsernameAvailable($username)
    {

        $query ="select id from users where username='$username'";
try{
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            return false;
        }

        if ($result->num_rows == 0) {
            return true;
        }

    } catch (Exception $e) {
        if(SHOW_MYSQL_ERROR===true&&get_class($e)=="mysqli_sql_exception")
        {
            print $this->conn->error;
        }
        return false;
    }


    }

    public function doLogin(array $UserInfo=array()){
        $_SESSION['username']= $UserInfo['username'];
$this->doAfterLoginActions();

    }

    public function doAfterLoginActions()
    {

        header("location:profile.php");
    }

    private function getLoggedInUserInfo(){
        
        if(!isset($_SESSION["username"])){
       return false;
        }
        $username=$_SESSION['username'];

        $query ="select username from users where username='$username'";
try{
        $result = $this->conn->query($query);
        $row=$result->fetch_assoc();
        return $row;
} catch (Exception $e) {
  
    if(SHOW_MYSQL_ERROR===true&&get_class($e)=="mysqli_sql_exception")
    {
        print $this->conn->error;
    }
    return false;
}
   
   }


    public function getAllusers($limit=10)
    {
        $query ="select username from users limit 0,$limit";
        $Users=array();

        try{
        $result = $this->conn->query($query);
        
        while($row=$result->fetch_assoc())
        {
            $Users[]=$row;
        }
    } catch (Exception $e) {    

        if(SHOW_MYSQL_ERROR===true&&get_class($e)=="mysqli_sql_exception")
        {
            print $this->conn->error;
        }
        return false;
    }
    return $Users;



    }
    public function isLoggedUser(){
        if(isset($_SESSION["username"])){
            return true;
        }else
        {
            return false;
        }
    }
}