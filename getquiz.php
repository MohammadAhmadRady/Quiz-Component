<?php

	require_once ('database.php');
		
	if(isset($_GET['quiz_id'])) 
    {
		$id=$_GET['quiz_id'];
        
        $con=new Connect("localhost","root","","quizcomponent"); 
        $sql = "select * from  `questions` where `quiz-id = '$id' ";

        $result = $con->tojson($sql);
        $con->closecon();
        echo $result;
    }
?>