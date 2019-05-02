<?php
	require_once ('database.php');
	$admin_id;
	$quiz_id;
	if(isset($_GET['admin-id']))
		$admin_id = $_GET['admin-id'];
	if(isset($_GET['quiz-id']))
		$quiz_id = $_GET['quiz-id'];
	$con=new Connect("localhost","root","","quizcomponent");
	$query = "DELETE FROM `quizinfo` WHERE id='$quiz_id' and admin-id='$admin_id'";
	$con->excutequery($query);
	
	$con=new Connect("localhost","root","","quizcomponent");
	$query = "DELETE FROM `questions` WHERE quiz_id=''$quiz_id''";
	$con->excutequery($query);
	$con->closecon();
	
	$con=new Connect("localhost","root","","quizcomponent");
	$query = "DELETE FROM `enteredquizes` WHERE quizID='$quiz_id' and adminID='$admin_id'";
	$con->excutequery($query);
	$con->closecon();
		
	echo $admin_id;
	echo $quiz_id;
?>