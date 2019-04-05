<?php
    
    $flag = 1;
    if(!isset($_GET['admin-id']))        $flag = 0;
    if(!isset($_GET['title']))           $flag = 0;
    if(!isset($_GET['skill-type']))      $flag = 0;      
    if(!isset($_GET['pass-score']))      $flag = 0;
    if(!isset($_GET['qes-num']))         $flag = 0;
    if(!isset($_GET['duration']))        $flag = 0;
    
    if($flag == 1)
    {    
        $admin_id   = $_GET['admin-id'];
        $title      = $_GET['title'];
        $skill_type = $_GET['skill-type'];
        $pass_score = $_GET['pass-score'];
        $qes_num    = $_GET['qes-num'];
        $duration   = $_GET['duration'];
        
        if($pass_score <= $qes_num)
        {
            $con=mysqli_connect("","","","");
            $query = "INSERT INTO `quizinfo`(`admin-id`, `title`, `skill-type`, `pass-score`, `number-of-questions`, `expected-duration`) VALUES ('$admin_id','$title','$skill_type','$pass_score','$qes_num','$duration')";
            if (mysqli_query($con,$query))
            {
                $query2 = "SELECT * FROM `quizinfo`";
                $query2_result = mysqli_query($con,$query2);
                $result = mysqli_num_rows($query2_result);

                echo $result;
            }
            mysqli_close($con);
        }
    }
?>