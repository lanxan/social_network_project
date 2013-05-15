<?php
require('config.php');

$userid = $_POST['userid'];
$sql = "SELECT * FROM user";
$result = mysql_query($sql);
$info = array();


while($row = mysql_fetch_assoc($result)){
	if($userid != $row['user_id']){
		$tmp = array(
			"ouser" => $row['user_id'],
			"nname" => $row['nickname'],
			"avarat" =>  $row['avarat']
		);
	
		$info = array_merge_recursive($info, $tmp);
	}
}
echo json_encode($info);
mysql_close($con);
?>
