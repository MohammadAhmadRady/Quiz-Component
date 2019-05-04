<?php

    require_once ('database.php');
    require_once ('quizEntry.php');
       
    if(isset($_GET['user-id']) && isset($_GET['quiz-id']) && isset($_GET['answers']))
    {
        
        $user_id = $_GET['user-id'];
        $quiz_id = $_GET['quiz-id'];
        $answers = $_GET['answers'];
        
        $con = new Connect("localhost", "root", "", "quizcomponent");
        $sql = "select * FROM `quizinfo` WHERE id='$quiz_id'";
		$temp = $con->excutequery($sql);
		$row = mysqli_fetch_assoc($temp);
		if( $row['number-of-questions'] == 0)
        {
            
            $grade=0;
            $pass_score = $row['pass-score'];
            $admin_id = $row['admin-id'];
            $arr= json_decode($answers);

            foreach($arr as $value)
            {
                $QID = $value->ID;
                $answer = $value->answer;
                $query = "SELECT answer FROM questions WHERE ID='$QID'";
                $result = $con->excutequery($query);
                
                $out = mysqli_fetch_assoc($result);
                if ($out['answer'] == $answer)
                    $grade++;
            }

            $massage = "failled";
            if (pass_score <= $grade)   $massage = "passed";
            
            $log = $massage." in qiuz with id ".$quiz_id." by score ".$grade;
            $query = "INSERT INTO logs (log,user_id) VALUES('$log' , '$user_id')";
            $con->excutequery($query);
            
            $json = array("case"=>$massage,"score"=>$grade);
            $response = json_encode($json);
        
            $factory = new QuizEntry();
            
            $factory->quiz_id = $quiz_id;
            $factory->admin_id =$admin_id;
            $factory->user_id = $user_id;    
            $factory->score = $grade;
            
            $factory->enterQuizz();

        }
        
        $con->closecon();
    
    }  
?>