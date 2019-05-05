<?php

	require_once("database.php");

	$con = new Connect("localhost","root","","quizcomponent"); 
	$sql = "select * from logs ";

	$result = $con->tojson($sql);
	$con->closecon();
	echo $result;
?>