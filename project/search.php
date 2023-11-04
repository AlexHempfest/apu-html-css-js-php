<?php 
require_once("config.php");
$PageInfo=array();
$PageInfo['isSecure']=false;
$PageInfo['pageTitle'] = "Search Page";
$page= new Page($PageInfo);
$profile = new Profile();
ob_start();

$SearchCriteria=array();
$SearchCriteria["rows"]= 50;
$SearchCriteria["start"]= "50";
/*
$SearchCriteria["return_col"]= array(
    "first_name",
    "last_name"
    );
  */  
$SearchCriteria["search_col"]= array(
"first_name"=>"%first%",
"last_name"=> "%ah%"
);
$SearchCriteria["order"]= array(
    "first_name"=>"ASC",
    "last_name"=> "DESC"
    );



/*
$SearchCriteria=array();
$SearchCriteria["rows"]= 50;
$SearchCriteria["start"]= "50";
$SearchCriteria["fields"]= array(
"first_name"=>"%first%",
"last_name"=> "%ah%"
);
$SearchCriteria["order"]= array(
    "first_name"=>"ASC",
    "last_name"=> "DESC"
    );
  */  

// Default search is a OR search with like >>>  No customization for AND or exact search
$ResultProfiles=$profile->searchProfile($SearchCriteria);
//$ResultProfiles=$profile->searchProfile();


Utilities::details($ResultProfiles);

?>
<h2> Homepage </h2>
<p>Lorem ipsum dolor </p>
<?php
$PageContent=ob_get_clean();
$page->show($PageContent);
?>