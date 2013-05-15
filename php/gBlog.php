<?php
require("config.php");

$userid = $_POST['userid'];
//$userid = 6;
$sql = "SELECT * FROM blog WHERE userid=$userid";
$result = mysql_query($sql);

if(!$result){
	exit(json_encode(array('num' => 0)));
}
else{ 
	$i = 0;
	$numTmp = array(
		'num' => $i,
	);
	
	$arr = array();
	$infoTmp = array();

	while($row = mysql_fetch_assoc($result)){
		
		$getInfo = array(
			//'msg' => array ( $i => $row['title'] )
			'title' => $row['title'],
			'date'  => $row['date'],
			'site'  => $row['site'],
			'text'  => $row['text']
		);
		
		$infoTmp = array_merge_recursive($infoTmp,$getInfo);
		$i++;
	}

	$numTmp = array(
		'num' => $i,
	);
	$arr = array_merge($numTmp,$infoTmp);
	echo json_encode($arr);
}

mysql_close($con);
?>
