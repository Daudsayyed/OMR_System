<?php
$count  = count($_POST["service"]);
for($i=0;$i<$count;$i++)
{
	$newvarible[$i] = $_POST["service"][$i]; 
} 
echo $newvarible[0];

?>