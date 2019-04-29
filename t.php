<?php
require_once ('database.php');
$Answer= array(
  array("user_id"=>5,"admin_id"=>11,"quiz_id"=>15)
 ,array("ID"=>100,"answer"=>a)
 ,array("ID"=>101,"answer"=>b)
 ,array("ID"=>102,"answer"=>c)
 ,array("ID"=>103,"answer"=>d)
 );
$input=json_encode($Answer);
function mark($input)
{
    $con = new Connect("localhost", "root", "12345678", "quizcomponent");
    $grade=0;
    $arr= json_decode($input);
    $user_id=$arr[0]->user_id;
    $admin_id=$arr[0]->admin_id;
    $quiz_id = $arr[0]->quiz_id;
    unset($arr[0]);
    foreach($arr as $value)
    {
        $QID = $value->ID;
        $answer = $value->answer;
        $query = "SELECT answer FROM questions WHERE ID='$QID'";
        if ($result=$con->excutequery($query)) {
            $out = mysqli_fetch_assoc($result);
            if ($out["answer"] == $answer)
                $grade++;
        }
    }
$query = "SELECT pass_score FROM quizinfo WHERE id='$quiz_id'";
    if ($result=$con->excutequery($query)) {
        $out = mysqli_fetch_assoc($result);
        $massage="failed";
        if ($out["pass_score"] <= $grade)
            $massage="passed";

        $log=$massage." in qiuz with id ".$quiz_id;
        $query = "INSERT INTO logs (log,user_id) 
                      VALUES('$log' , '$user_id')";
        $con->excutequery($query);
}

$con->closecon();
}
mark($input);
?>