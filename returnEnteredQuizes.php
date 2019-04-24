<?php

	$quiz_id="";
	$admin_id="";
	if(isset($_GET['quiz_id']))         
		$quiz_id=$_GET['quiz_id'];
	if(isset($_GET['admin_id']))        
		$admin_id=$_GET['admin_id'];
         
	$connect = mysqli_connect("localhost","root","","quizcomponent");
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
	$result = mysqli_query($connect,$sql);
	$json_array = array();
	while($row = mysqli_fetch_assoc($result))
	{
		$json_array[] = $row;
	}
	echo json_encode($json_array);
	

?>
