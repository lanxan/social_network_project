<?php

$file = fopen("test.txt","r");
$i = 0;
while($line = fgetc($file)){
	$piece = explode(",",$line);
	$jarr[i] = array('aurl' => $piece[0], 'dialog' => $piece[1]);
}

echo json_encode($jarr);
?>
