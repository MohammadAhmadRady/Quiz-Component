<?php

	require_once ('database.php');
	$con=new Connect("localhost","root","","quizcomponent");
	
	$quiz_id="";
	$admin_id="";
	if(isset($_GET['quiz_id']))         
		$quiz_id=$_GET['quiz_id'];
	if(isset($_GET['admin_id']))        
		$admin_id=$_GET['admin_id'];
         
	$sql = "select * from enteredquizes ";
	
	if ($quiz_id && $admin_id)
	{
		$sql .= "where quizID='$quiz_id' and adminID='$admin_id'";
	}
	else if($quiz_id && !($admin_id))
	{
		$sql .= "where quizID='$quiz_id'";
	}
	else if(!($quiz_id) && $admin_id)
	{
		$sql .= "where adminID='$admin_id'";
	}
	
	$result = $con->tojson($sql);
	$con->closecon();
	echo $result;
	
?>