<?php

require_once ('database.php');

class Quiz{
    
    private $id,$admin_id,$title,$skill_type,$pass_score,$qes_num,$duration;
    
    function Quiz($admin_id,$title,$skill_type,$pass_score,$qes_num,$duration) 
    {
        $this->admin_id = $admin_id;
        $this->title = $title;
        $this->skill_type = $skill_type;
        $this->pass_score = $pass_score;
        $this->qes_num = $qes_num;
        $this->duration = $duration;
        $this->addtodb();
    }
    
    function addtodb()
    {
        $con=new Connect("localhost","root","","quizcomponent");
        $query = "INSERT INTO `quizinfo`(`admin-id`, `title`, `skill-type`, `pass-score`, `number-of-questions`, `expected-duration`) VALUES ('$this->admin_id','$this->title','$this->skill_type','$this->pass_score','$this->qes_num','$this->duration')";
        if ($con->excutequery($query))
        {
            $query2 = "SELECT * FROM `quizinfo ORDER BY `id` DESC`";
            $result = mysqli_fetch_assoc($con->getrowsnum($query2));
            $this->id = $result['id'];
        }
        $con->closecon();
    }
    
    function getid()
    {
        return $this->id;
    }
}

?>