<?php
require_once ('enterQuiz.php');

class QuizEntry
{
    public $admin_id  ,$quiz_id ,$user_id  ,$score ,$entered;
    
    function enterQuizz()
    {
        if($this->admin_id && $this->quiz_id && $this->user_id && $this->score )
        {
            $this->entered = new EnteredQuiz($this->quiz_id,$this->admin_id,$this->user_id,$this->score);
			$this->entered->addtodb();
		}
    }
}
?>