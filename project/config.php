<?php
session_start();
define("WEBSITE_TITLE","APU Directory");
define("ENV","DEV");


if(ENV=="DEV"){
  define("SHOW_MYSQL_ERROR",true);
ini_set("display_errors","yes");
error_reporting(E_ALL);
define("MYSQL_SERVER","localhost");
define("MYSQL_USER","root");
define("MYSQL_PASSWORD","zareef");
define("DATABASE","apudirectory");
}



if(ENV=="USER"){
  define("MYSQL_SERVER","localhost");
  define("MYSQL_USER","root");
  define("MYSQL_PASSWORD","zareef");
  define("DATABASE","apudirectory");
  }

if(ENV=="PROD"){
  define("SHOW_MYSQL_ERROR",false);
    ini_set("display_errors","no");
    error_reporting(0);
    define("MYSQL_SERVER","localhost");
    define("MYSQL_USER","root");
    define("MYSQL_PASSWORD","zareef");
    define("DATABASE","apudirectory");
    }
    



require_once"classes/class.FormReader.php";
require_once"classes/class.Utilities.php";
require_once"classes/class.Page.php";
require_once"classes/class.User.php";
require_once"classes/class.Profile.php";
function writefile($content) 
{

   file_put_contents("myfile.txt","$content ".date("h:i:s"));
 }

?>