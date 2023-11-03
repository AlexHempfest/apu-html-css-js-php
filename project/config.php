<?php
session_start();
define("WEBSITE_TITLE","APU Directory");
define("ENV","DEV");


if(ENV=="DEV"){
define("MYSQL_SERVER","localhost");
define("MYSQL_USER","root");
define("MYSQL_PASSWORD","zareef");
define("DATABASE","apudirectory");
}

if(ENV=="PROD"){
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

?>