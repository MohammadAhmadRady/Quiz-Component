<?php
	require_once ('database.php');
	if(isset($_GET['admin-id']) && isset($_GET['quiz-id']))
	{
		$admin_id = $_GET['admin-id'];
		$quiz_id = $_GET['quiz-id'];	
		$con=new Connect("localhost","root","","quizcomponent");
		
		$sql = "select * FROM `quizinfo` WHERE id='$quiz_id'";
		$temp = $con->excutequery($sql);
		$row = mysqli_fetch_assoc($temp);
		if( $row['admin-id'] == $admin_id)
		{
			$sql = "DELETE FROM `quizinfo` WHERE id='$quiz_id'";
			$con->excutequery($sql);
			
			$sql = "DELETE FROM `questions` WHERE quiz_id='$quiz_id'";
			$con->excutequery($sql);
			
			$sql = "DELETE FROM `enteredquizes` WHERE quizID='$quiz_id'";
			$con->excutequery($sql);
		}
		$con->closecon();
	}
?>