<?php

$host = "merry.ee.ncku.edu.tw";
$port = "";
$admin = "jesshao";
$adminPasswd = "jesshao";
$dbName = "jesshao";

$con = mysql_connect($host,$admin,$adminPasswd);
if(!$con){
	die('Unable connect : ' . mysql_error());
	mysql_close($con);
}

mysql_query("SET NAME utf8");

if(!@mysql_select_db($dbName)){
	die('Unable ues the database!:' . mysql_error());
	mysql_close($con);
}
?>
