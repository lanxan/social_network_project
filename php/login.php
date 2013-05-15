<?php
require("config.php");

$result = mysql_query("SELECT * FROM user WHERE email = '$_POST[email]'");

//echo json_encode(array('msg' => 123));
if($result == false){
	echo json_encode(array('msg' => 'false1'));
	exit();
}
$password = md5($_POST['passwd']);
while($row = mysql_fetch_assoc($result)){
	if(($_POST['email'] == $row['email']) && ($password == $row['passwd'])){
		echo json_encode(array('msg' => 'true', 'id' => $row['user_id']));
	  	//header("Location: http://merry.ee.ncku.edu.tw/~jesshao/ex8/home.html ");
		exit();
	}
}
if(!$row)
	echo json_encode(array('msg' => 'false2'));
mysql_close($con);
?>
