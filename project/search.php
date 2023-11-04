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
$pagenumber=isset($_GET['pagenumber'])?$_GET['pagenumber']:1;
$SearchCriteria=array();
$SearchCriteria["rows"]= 20;
$SearchCriteria["start"]= ($pagenumber-1)*$SearchCriteria["rows"];
/*
$SearchCriteria["return_col"]= array(
    "first_name",
    "last_name"
    );
  */ 
  // TODO : Put a restriction, so only allowed fields can be sent for search. 

  foreach($formReader->readData() as $key=>$value) {
    if($key=="Search" OR $key=="pagenumber"){
        continue;
    }
$SearchCriteria["search_col"][$key]="%$value%";
// TODO : Put condition to do exact search also. 
  }

  //Utilities::details($SearchCriteria);
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

if ($profile->searchProfileCount($SearchCriteria)){
  $TotalResultsProfile=$profile->searchProfileCount($SearchCriteria);

}else{
  $TotalResultsProfile=0;
}
//$ResultProfiles=$profile->searchProfile();


//Utilities::details($ResultProfiles);

?>
<h2> Search Results </h2>

<div id="information">

Total <?php print $TotalResultsProfile; ?> results were found. <?php 
if($SearchCriteria["rows"]<$ResultProfiles){
print count($ResultProfiles);
}else{
print $SearchCriteria["rows"];
}
?> are being displayed.
  </div>


<table>
  <tr class="tableheader">
  
<?php 
if(isset($ResultProfiles['0'])){
foreach($ResultProfiles['0'] as $key=>$value) {
  print "<td>$key</td>";
}}
?>

</tr>
<?php 
foreach($ResultProfiles as $key=>$value) {
 print "<tr class='tablerow'>";
 foreach($value as $key=>$field) {
  print "<td>$field</td>";
 }
 
  print "</tr>";
}



?>


</table>
<?php 

Utilities::getPaginationBar($TotalResultsProfile, $SearchCriteria["rows"],$pagenumber);
?>
<?php
$PageContent=ob_get_clean();
$page->show($PageContent);
?>