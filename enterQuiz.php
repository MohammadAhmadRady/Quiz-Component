<?php
require_once ('database.php');
require_once ('factory.php');
require_once ('quiz.php');
require_once ('quizEntry.php');
require_once ('enterQuiz.php');
Class EnteredQuiz
{
	public $id,$admin_id,$user_id,$score;
	
	function EnteredQuiz($id,$admin_id,$user_id,$score)
	{
		$this->admin_id= $admin_id;
		$this->id= $id;
		$this->user_id= $user_id;
		$this->score= $score;
	}
	
	function addtodb()
    {
        $con=new Connect("localhost","root","","quizcomponent");
        $query = "INSERT INTO enteredquizes (quizID , adminID , userID , score ) VALUES ('$this->id','$this->admin_id','$this->user_id','$this->score')";
        $con->excutequery($query);
        $con->closecon();
    }
}
?>