<?php

$aurl = $_POST['aurl'];
$dialog = $_POST['dialog'];
try{
	if($file = fopen("../dialog/test.bat","a")){
	//if($file = fopen("../dialog/test.bat","a")){
		fwrite($file,$aurl);
		fwrite($file,",");
		fwrite($file,$dialog);
		fwrite($file,"\n");
	
		fclose($file);
	
		echo 'ture';
	}
	else{
		throw new Exception("123");
	}
}catch(Exception $e){
	//echo "The Exception is: ".$e->getMessage()."<br/>";
	print_r(error_get_last());
}
?>
