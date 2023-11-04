<?php 
require_once("config.php");
$PageInfo=array();
$PageInfo['isSecure']=false;
$PageInfo['pageTitle'] = "Search Page";
$page= new Page($PageInfo);
$profile = new Profile();
$formReader= new FormReader();
ob_start();


require_once("parts/search_form.php");
$SearchCriteria=array();
$SearchCriteria["rows"]= 50;
$SearchCriteria["start"]= 0;
/*
$SearchCriteria["return_col"]= array(
    "first_name",
    "last_name"
    );
  */ 
  // TODO : Put a restriction, so only allowed fields can be sent for search. 

  foreach($formReader->readData() as $key=>$value) {
    if($key=="Search"){
        continue;
    }
$SearchCriteria["search_col"][$key]="%$value%";
  }

  Utilities::details($SearchCriteria);
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