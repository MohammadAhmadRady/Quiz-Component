<?php
    
    $flag = 1 ;
    if(!isset($_GET['quiz-id']))                    $flag = 0;
    if(!isset($_GET['question']))                   $flag = 0;
    if(!isset($_GET['answer']))                     $flag = 0;      
    if(!isset($_GET['a']))                          $flag = 0;
    if(!isset($_GET['b']))                          $flag = 0;
    if(!isset($_GET['c']))                          $flag = 0;

    if(isset($_GET['d']))                           $flag = 2;
    if(isset($_GET['e']))                           $flag = 3;
    
    if(!isset($_GET['d']) && isset($_GET['e']))     $flag = 0;
    
    if($flag > 0)
    {    
        $quiz_id    = $_GET['quiz-id'];
        $question   = $_GET['question'];
        $answer     = $_GET['answer'];
        $a          = $_GET['a'];
        $b          = $_GET['b'];
        $c          = $_GET['c'];
        
        $con=mysqli_connect("","","","");
        $check_query = "SELECT * FROM `quizinfo` where `id` = '$quiz_id' ";
        $check_result = mysqli_query($con,$check_query);
        $check_row = mysqli_fetch_array($check_result);
        if($check_row['number-of-questions'] > 0)
        {   
            $number_of_questions = $check_row['number-of-questions']-1;
            $query ="";
            
            if($flag == 3)
            {
                $d = $_GET['d'];
                $e = $_GET['e'];
                $query = "INSERT INTO `questions`(`quiz-id`, `question`, `answer`, `a`, `b`, `c`, `d`, `e`) VALUES ('$quiz_id','$question','$answer','$a','$b','$c','$d','$e')";
                if($answer != 'a' && $answer != 'b' && $answer != 'c' && $answer != 'd' && $answer != 'e' ) $flag = 0;
            }
            
            if($flag == 2)
            {
                $d = $_GET['d'];
                $query = "INSERT INTO `questions`(`quiz-id`, `question`, `answer`, `a`, `b`, `c`, `d`) VALUES ('$quiz_id','$question','$answer','$a','$b','$c','$d')";
                if($answer != 'a' && $answer != 'b' && $answer != 'c' && $answer != 'd' ) $flag = 0;
            }
            
            if($flag == 1)
            {
                $query = "INSERT INTO `questions`(`quiz-id`, `question`, `answer`, `a`, `b`, `c`) VALUES ('$quiz_id','$question','$answer','$a','$b','$c')";
                if($answer != 'a' && $answer != 'b' && $answer != 'c' ) $flag = 0;
            }
            
            if($flag > 0 )
            {
                if(mysqli_query($con,$query))
                {
                    $query1 = "UPDATE `quizinfo` SET `number-of-questions`= '$number_of_questions' WHERE `id` = '$quiz_id'";
                    mysqli_query($con,$query1);        
                }
            }    
        }
    }
?>