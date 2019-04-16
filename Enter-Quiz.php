<?php

    require_once ('factory.php');
    require_once ('quiz.php');
    require_once ('quizEntry.php');
    require_once ('enterQuiz.php');
    
    $factory = new QuizEntry();
    
    if(isset($_GET['quiz_id']))         $factory->quiz_id=$_GET['quiz_id'];
    if(isset($_GET['admin_id']))        $factory->admin_id=$_GET['admin_id'];
    if(isset($_GET['user_id']))         $factory->user_id=$_GET['user_id'];    
    if(isset($_GET['score']))     		$factory->score=$_GET['score'];
    
    $factory->enterQuizz();

?>