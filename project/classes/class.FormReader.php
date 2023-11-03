<?php 

class FormReader{
    public $method;
        private $data=array();

    public function __construct($method="GET")
    {
        $this->method = $method;

        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $this->method = "POST";

        }
        $this->readData();
       
    }


    public function readData(){

if($this->method == "GET"){

if(!empty($_GET))
{

  // details($_GET);
  
  foreach($_GET as $key => $value)
  {
    $this->data[$key] = $value;
  }
}

            }

if($this->method == "POST"){                
    if(!empty($_POST))
    {
    
      // details($_GET);
      
      foreach($_POST as $key => $value)
      {
        $this->data[$key] = $value;
      }
    }
    }

    return $this->data;
    }


    function __get(string $key)
    {

        switch($key)
        {
            case "email":
                $returnValue= "You can not get email address of this user";
                break;
                default:
                $returnValue= isset($this->data[$key])?$this->data[$key]:false;

        }
return $returnValue;
        }
    
    public function printData($seprator="<br>"){

        foreach($this->data as $key=>$value)
        {
            print "$key : $value";
            print $seprator;
        }

    }
}


?>