<?php

	require_once ('database.php');
		
	if(isset($_GET['quiz_id'])) 
    {
		$id=$_GET['quiz_id'];
        
        $con=new Connect("localhost","root","","quizcomponent"); 
        $sql = "select * from  `questions` where `quiz-id = '$id' ";

        $result = $con->tojson($sql);
		
		$log = "User asked to join a quiz ".$id; 
		$q = "INSERT INTO `logs`(`content`) VALUES ('$log') ";
		$con->excutequery($q);
	
        $con->closecon();
        echo $result;
    }
?>