<?php

require_once ('quiz.php');
require_once ('question.php');
require_once ('validation.php');

class QiuzFactory
{
    
    private $admin_id = "" ,$title = "" ,$skill_type = "" ,$pass_score = "" ,$qes_num = "" ,$duration,$quiz;
    
    function createquiz()
    {
        $validate = new Valid;
        if($this->admin_id && $this->title && $this->skill_type && $this->pass_score && $this->qes_num && $this->duration)
        {
            $pass_score = $this->pass_score;
            $qes_num = $this->qes_num;
            if($validate->isless($pass_score,$qes_num))
                $this->quiz = new Quiz($this->admin_id,$this->title,$this->skill_type,$this->pass_score,$this->qes_num,$this->duration);
        }
    }
    
    function setadmin_id($admin_id)
    {
        $this->admin_id = $admin_id;
    }
    
    function settitle($title)
    {
        $this->title = $title;
    }
    
    function setskill_type($skill_type)
    {
        $this->skill_type = $skill_type;
    }
    
    function setpass_score($pass_score)
    {
        $this->pass_score = $pass_score;
    }
    
    function setqes_num($qes_num)
    {
        $this->qes_num = $qes_num;
    }
    
    function setduration($duration)
    {
        $this->duration = $duration;
    }
    
    function getquiz()
    {
        return $this->quiz;
    }
    
}

class QuestionFactory{
    
    private $quiz_id = "" ,$mcq = "" ,$answer = "" ,$a = "" ,$b = "" ,$c = "" ,$d = null ,$e = null ,$question;
    
    function createquestion()
    {
        if(!($this->d == null && $this->e != null))
        {
            $validate = new Valid;
            if($this->quiz_id && $this->mcq && $this->answer && $this->a && $this->b && $this->c )
            {
                $rows = $validate->question($this->quiz_id);
                if( $rows > 0 && $validate->answer($this->answer,$this->d,$this->e))
                {
                    $this->question = new Question($this->quiz_id,$this->mcq,$this->answer,$this->a,$this->b,$this->c,$this->d,$this->e,$rows);
                }
            }
        }
    }
    
    function setquiz_id($quiz_id)
    {
        $this->quiz_id = $quiz_id;
    }
    
    function setmcq($mcq)
    {
        $this->mcq = $mcq;
    }
    
    function setanswer($answer)
    {
        $this->answer = $answer;
    }
    
    function seta($a)
    {
        $this->a = $a;
    }
    
    function setb($b)
    {
        $this->b = $b;
    }
    
    function setc($c)
    {
        $this->c = $c;
    }
    
    function setd($d)
    {
        $this->d = $d;
    }
    
    function sete($e)
    {
        $this->e = $e;
    }
    
    function getquestion()
    {
        return $this->question;
    }
    
}

?>