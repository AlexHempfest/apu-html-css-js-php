<?php
session_start();
define("WEBSITE_TITLE","APU Directory");

define("MYSQL_SERVER","localhost");
define("MYSQL_USER","root");
define("MYSQL_PASSWORD","zareef");
define("DATABASE","apudirectory");

//$conn=new Mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, DATABASE);
//var_dump($conn);



require_once"classes/class.FormReader.php";
require_once"classes/class.Utilities.php";
require_once"classes/class.Page.php";
require_once"classes/class.User.php";

?>