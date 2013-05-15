<?php
$i = 11;
$dir = "userfolder/";
//while($i<=10){
	
	$dirPath = $dir.basename($i);
	
	mkdir($dirPath,0777);
//	$i++;
//}
echo 'yes';
?>
