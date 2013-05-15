<?php
require("config.php");

$userid = $_POST['userid'];
$address = $_POST['address'];
$lat = $_POST['lat'];
$long = $_POST['long'];

$sql = "INSERT INTO blog (userid, address, lat, long)
	VALUES
	('$userid','$address','$lat','$long');"

?>
