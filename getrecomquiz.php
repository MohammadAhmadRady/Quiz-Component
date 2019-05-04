<?php

	require_once ('database.php');
		
    $quiz_id = ""
    $admin_id = ""
    $pass_score= ""
    $skill_type = ""

	if(isset($_GET['quiz_id']))         $quiz_id=$_GET['quiz_id'];
	if(isset($_GET['admin_id']))        $admin_id=$_GET['admin_id'];
    if(isset($_GET['pass_score']))         $pass_score=$_GET['pass_score'];
	if(isset($_GET['skill_type']))        $skill_type=$_GET['skill_type'];

    $con=new Connect("localhost","root","","quizcomponent"); 
	$sql = "select * from quizinfo ";
	
	if (isset($_GET['quiz_id']) && isset($_GET['admin_id']) && isset($_GET['pass_score']) && isset($_GET['skill_type']))
	{
        $sql .= "where id ='$quiz_id' and admin-id ='$admin_id' and pass-score='$pass_score' and skill-type='$skill_type'";
	}

	else if(isset($_GET['quiz_id']) && isset($_GET['admin_id']) && isset($_GET['pass_score']) && !(isset($_GET['skill_type'])))
	{
        $sql .= "where id ='$quiz_id' and admin-id ='$admin_id' and pass-score='$pass_score'";
	}

	else if(isset($_GET['quiz_id']) && isset($_GET['admin_id']) && !(isset($_GET['pass_score'])) && isset($_GET['skill_type']))
	{
        $sql .= "where id ='$quiz_id' and admin-id ='$admin_id' and skill-type='$skill_type'";
	}

    else if(isset($_GET['quiz_id']) && isset($_GET['admin_id']) && !(isset($_GET['pass_score'])) && !(isset($_GET['skill_type'])))
	{
        $sql .= "where id ='$quiz_id' and admin-id ='$admin_id'" ;
	}

	else if(isset($_GET['quiz_id']) && !(isset($_GET['admin_id'])) && isset($_GET['pass_score']) && isset($_GET['skill_type']))
	{
        $sql .= "where id ='$quiz_id' and pass-score='$pass_score' and skill-type='$skill_type'";
	}

    else if(isset($_GET['quiz_id']) && !(isset($_GET['admin_id'])) && isset($_GET['pass_score']) && !(isset($_GET['skill_type'])))
	{
        $sql .= "where id ='$quiz_id' and pass-score='$pass_score'";
	}

	else if(isset($_GET['quiz_id']) && !(isset($_GET['admin_id'])) && !(isset($_GET['pass_score'])) && isset($_GET['skill_type']))
	{
        $sql .= "where id ='$quiz_id' and skill-type='$skill_type'";
	}

    else if(isset($_GET['quiz_id']) && !(isset($_GET['admin_id'])) && !(isset($_GET['pass_score'])) && !(isset($_GET['skill_type'])))
	{
        $sql .= "where id ='$quiz_id'" ;
	}

	else if(!(isset($_GET['quiz_id'])) && isset($_GET['admin_id']) && isset($_GET['pass_score']) && isset($_GET['skill_type']))
	{
        $sql .= "where admin-id ='$admin_id' and pass-score='$pass_score' and skill-type='$skill_type'";
	}

    else if(!(isset($_GET['quiz_id'])) && isset($_GET['admin_id']) && isset($_GET['pass_score']) && !(isset($_GET['skill_type'])))
	{
        $sql .= "where admin-id ='$admin_id' and pass-score='$pass_score'";
	}

	else if(!(isset($_GET['quiz_id'])) && isset($_GET['admin_id']) && !(isset($_GET['pass_score'])) && isset($_GET['skill_type']))
	{
        $sql .= "where admin-id ='$admin_id' and skill-type='$skill_type'";
	}

    else if(!(isset($_GET['quiz_id'])) && isset($_GET['admin_id']) && !(isset($_GET['pass_score'])) && !(isset($_GET['skill_type'])))
	{
        $sql .= "where admin-id ='$admin_id'" ;
	}

	else if(!(isset($_GET['quiz_id'])) && !(isset($_GET['admin_id'])) && isset($_GET['pass_score']) && isset($_GET['skill_type']))
	{
        $sql .= "where pass-score='$pass_score' and skill-type='$skill_type'";
	}

    else if(!(isset($_GET['quiz_id'])) && !(isset($_GET['admin_id'])) && isset($_GET['pass_score']) && !(isset($_GET['skill_type'])))
	{
        $sql .= "where pass-score='$pass_score'";
	}

	else if(!(isset($_GET['quiz_id'])) && !(isset($_GET['admin_id'])) && !(isset($_GET['pass_score'])) && isset($_GET['skill_type']))
	{
        $sql .= "where skill-type='$skill_type'";
	}

    if((isset($_GET['quiz_id'])) || (isset($_GET['admin_id'])) || (isset($_GET['quiz_id'])) || (isset($_GET['skill_type'])))
    {
        $result = $con->tojson($sql);
        $con->closecon();
        echo $result;
    }

?>