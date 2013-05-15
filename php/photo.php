<?php
header('content-type:text/html; charset=utf-8');

$dir = '../photo/';

if($_FILES['image']['error'] == UPLOAD_ERR_OK){
	$tmp_name = $_FILES['image']['tmp_name'];
	$name = $_FILES['image']['name'];
	$dirPath = $dir.basename($name);
	echo $name;
echo '<br />';
	echo $dirPath;
echo '<br />';
	if( move_uploaded_file($tmp_name, $dirPath)){
		chmod($dirPath,0666);
		echo 'success';
	} 
	else
		print_r(error_get_last());
}
else
	echo 'error';

?>
