<?php
require('config.php');
header('content-type:text/html; charset=utf-8');

$cookie = $_GET['cookie'];
//$album = $_GET['album'];
//$cookie = 6;
//$album = "tainan";
$dir = '../userfolder/'.$cookie.'/';

if($_FILES['Filedata']['error'] == UPLOAD_ERR_OK){
	/* 
	 * check album exist or creat this album
	 * */
/*	$asql = "SELECT * FROM album 
		WHERE userid=$cookie AND albumName=$album";
	$fdir = '../userfolder/'.$cookie.'/';
	$adir = $fdir.basename($album);
	if(!mysql_query($asql) && !is_dir($adir)){
		
		mkdir($adir,0777);
		$insertAlbum = "INSERT INTO album (userid, albumName)
			VALUE
			('$cookie', '$album')";

		mysql_query($insertAlbum);
	}

	/*
	 * send the file
	 * */
	$tmp_name = $_FILES['Filedata']['tmp_name'];
	$name = $_FILES['Filedata']['name'];
	$dirPath = $dir.basename($name);

	$psql = "INSERT INTO photo (userid, name)
		VALUER
		('$cookie', '$name')";
	mysql_query($psql);
	if( move_uploaded_file($tmp_name, $dirPath)){
		chmod($dirPath,0666);
		echo 'success';
	} 
	else
		echo 'false';
}
else
	echo 'error';
 	 
?>
