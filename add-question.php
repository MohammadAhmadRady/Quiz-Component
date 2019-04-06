<?php
    require_once ('factory.php');
    require_once ('question.php');
    
    $factory = new QuestionFactory;

    if(isset($_GET['quiz-id']))     $factory->setquiz_id($_GET['quiz-id']);
    if(isset($_GET['question']))    $factory->setmcq($_GET['question']);
    if(isset($_GET['answer']))      $factory->setanswer($_GET['answer']);
    if(isset($_GET['a']))           $factory->seta($_GET['a']);
    if(isset($_GET['b']))           $factory->setb($_GET['b']);
    if(isset($_GET['c']))           $factory->setc($_GET['c']);
    if(isset($_GET['d']))           $factory->setd($_GET['d']);
    if(isset($_GET['e']))           $factory->sete($_GET['e']);
    
    $factory->createquestion();
    $question = $factory->getquestion();
    if($question){
        $question->addtodb();
    }

?>