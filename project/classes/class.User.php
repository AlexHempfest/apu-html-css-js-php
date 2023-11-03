<?php

class User
{
    private $conn;
    public $data;

    public function __construct()
    {
        $this->conn = new Mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, DATABASE);
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

        $result = $this->conn->query($query);

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

        //print $query;
        $result = $this->conn->query($query);
        //var_dump($result);

        return $result;

        // 
    }


    public function isUsernameAvailable($username)
    {

        $query ="select id from users where username='$username'";

        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            return false;
        }

        if ($result->num_rows == 0) {
            return true;
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

        $result = $this->conn->query($query);
        $row=$result->fetch_assoc();
//$this->data=$row;
return $row;


   
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