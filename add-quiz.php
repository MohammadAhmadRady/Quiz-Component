<?php

    require_once ('factory.php');
    require_once ('quiz.php');
    
    $factory = new QiuzFactory;
    
    if(isset($_GET['admin-id']))        $factory->setadmin_id($_GET['admin-id']);
    if(isset($_GET['title']))           $factory->settitle($_GET['title']);
    if(isset($_GET['skill-type']))      $factory->setskill_type($_GET['skill-type']);      
    if(isset($_GET['pass-score']))      $factory->setpass_score($_GET['pass-score']);
    if(isset($_GET['qes-num']))         $factory->setqes_num($_GET['qes-num']);
    if(isset($_GET['duration']))        $factory->setduration($_GET['duration']);

    $factory->createquiz();
    $quiz = $factory->getquiz();

    if($quiz)
    {    
        $data = ['quiz-id' => $quiz->getid()];
        echo json_encode($data);
    }

?>