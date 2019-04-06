<?php

require_once ('database.php');

class Valid
{

    function ispostive($var)
    {
        return ($var > 0);
    }
    
    function isless($var1,$var2)
    {
        return ($var1 <= $var2 && $this->ispostive($var1) && $this->ispostive($var2));
    }
    
    function question($quiz_id)
    {
        $con=new Connect("localhost","root","","quizcomponent");
        $check_query = "SELECT * FROM `quizinfo` where `id` = '$quiz_id' ";
        $check_result = $con->excutequery($check_query);
        $check_row = mysqli_fetch_array($check_result);
        $con->closecon();
        return $check_row['number-of-questions'] ;
    }
    
    function answer($answer,$d,$e)
    {
        $flag = false;
        if($answer == 'a' || $answer == 'b' || $answer == 'c')  $flag = true;
        else if($answer == 'd' && $d == null)   $flag = false;
        else if($answer == 'e' && $e == null)   $flag = false;
        else if($answer == 'd' || $answer == 'e')  $flag = true;
        return $flag;
    }
    
}

?>