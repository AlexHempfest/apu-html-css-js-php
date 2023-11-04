<?php 
require_once("config.php");

$re = '/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/m';
$str = 'zareef@zareef.com';

preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

// Print the entire match result
var_dump($matches);