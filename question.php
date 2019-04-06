<?php

require_once ('database.php');

class Question{
    
    private $quiz_id,$question,$answer,$a,$b,$c,$d,$e,$rows;
    
    function Question($quiz_id,$question,$answer,$a,$b,$c,$d,$e,$rows) 
    {
        $this->quiz_id = $quiz_id;
        $this->question = $question;
        $this->answer = $answer;
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->d = $d;
        $this->e = $e;
        $this->rows  = $rows -1 ;
    }
    
    function addtodb()
    {
        $con=new Connect("localhost","root","","quizcomponent");
        if($this->e != '' && $this->d != '')
            $query = "INSERT INTO `questions`(`quiz-id`, `question`, `answer`, `a`, `b`, `c`, `d`, `e`) VALUES ('$this->quiz_id','$this->question','$this->answer','$this->a','$this->b','$this->c','$this->d','$this->e')";
        if($this->e == '' && $this->d != '')
            $query = "INSERT INTO `questions`(`quiz-id`, `question`, `answer`, `a`, `b`, `c`, `d`) VALUES ('$this->quiz_id','$this->question','$this->answer','$this->a','$this->b','$this->c','$this->d')";
        if($this->e == '' && $this->d == '')
            $query = "INSERT INTO `questions`(`quiz-id`, `question`, `answer`, `a`, `b`, `c`) VALUES ('$this->quiz_id','$this->question','$this->answer','$this->a','$this->b','$this->c')";
        $con->excutequery($query);
        $updatequery = "UPDATE `quizinfo` SET `number-of-questions`= '$this->rows' WHERE `id` = '$this->quiz_id'";
        $con->excutequery($updatequery);
        $con->closecon();
    }

}

?>