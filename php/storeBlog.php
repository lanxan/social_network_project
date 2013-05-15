<?php
require("config.php");

$userid = $_POST['userid'];
$title = $_POST['title'];
$date = $_POST['date'];
$site = $_POST['site'];
$text = $_POST['text'];

$sql = "INSERT INTO blog (userid, title, date, site, text)
	VALUES
	('$userid', '$title', '$date', '$site' ,'$text')";
if(!mysql_query($sql))
	echo json_encode(array('msg' => 'Insert error!'));
else{
	/* 
	 * chack is it get info?
	 * 
	 * $arr = array(
		'msg' => '',
		'title' => $title,
		'date' => $date,
		'site' => $site,
		'text' => $text,
	);
	 */
	echo json_encode(array('msg' => 'success'));
}
?>
