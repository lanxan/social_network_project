<?php
require("config.php");

$result = mysql_query("SELECT * FROM user");

if($result == false){
	echo json_encode(array('msg' => 'false1'));
	exit(); //No Form
}
/*
if($_POST['account'] == NULL){
	echo json_encode(array('msg' => 'empty'));
	exit();
}*/
if($_POST['passwd'] == NULL){
	echo json_encode(array('msg' => 'empty'));
	exit();
}
/*
if($_POST['firstname'] == NULL){
	echo json_encode(array('msg' => 'empty'));
	exit();
}
if($_POST['lastname'] == NULL){
	echo json_encode(array('msg' => 'empty'));
	exit();
}*/
if($_POST['nickname'] == NULL){
	echo json_encode(array('msg' => 'empty'));
	exit();
}
if($_POST['email'] == NULL){
	echo json_encode(array('msg' => 'empty'));
	exit();
}
$emailPattern = "/^[^0-9][a-zA-Z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";

if(!preg_match($emailPattern, $_POST['email'], $matches)){
	//email is wrong
	echo json_encode(array('msg' => 'false2'));
	exit();
}

$i = 1;

while($row = mysql_fetch_assoc($result)){
	$i++;
	/*
	if($_POST['account'] == $row['account']){
		echo json_encode(array('msg' => 'same1'));
		//account is same
		exit();
	}*/
	if($_POST['email'] == $row['email']){
		//email is same
		echo json_encode(array('msg' => 'same2'));
		exit();
	}
}

if(!$row){
	$password = md5($_POST['passwd']);
	$sql = "INSERT INTO user (passwd ,nickname ,email,folder_id) 
	VALUES 
	('$password', '$_POST[nickname]','$_POST[email]', $i)";
	
	if(!mysql_query($sql)){
		die('Error: ' . mysql_error());
	}

	$dir = "../userfolder/";
	$dirPath = $dir.basename($i);
	mkdir($dirPath,0777);

	echo json_encode(array('msg' => 'success', 'id' => $i));
	//header("Location: http://merry.ee.ncku.edu.tw/~jesshao/ex8/home.html ");
	exit();
}
?>
