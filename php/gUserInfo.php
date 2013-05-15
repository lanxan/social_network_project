<?php
require("config.php");
$userid = $_POST['userid'];
$sql = "SELECT * FROM user WHERE user_id=$userid";
$result = mysql_query($sql);

if(!$result){
	exit(json_encode(array('msg' => 'userid is wrong!')));
}
else
	$row = mysql_fetch_assoc($result);

$arr = array(
	'msg' => 'success',
	'fname' => $row['firstname'],
	'lname' => $row['lastname'],
	'nname' => $row['nickname'],
	'avarat' => $row['avarat'],
	'work' => $row['work'],
	'nowin' => $row['nowin'],
	'country' => $row['country_num'],
	'city' => $row['city_num'],
	'foot' => $row['footprint']);
echo json_encode($arr);

mysql_close($con);
?>
