<?php
    
    $admin_id = $_POST['admin-id'];
    $title = $_POST['title'];
    $skill_type = $_POST['skill-type'];
    $qes_num = $_POST['qes-num'];
    $pass_score = $_POST['pass-score'];
    $duration = $_POST['duration'];
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://localhost/SWE2/add-quiz.php?admin-id=".$admin_id."&title=".$title."&skill-type=".$skill_type."&qes-num=".$qes_num."&pass-score=".$pass_score."&duration=".$duration,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "",
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
      ),
    ));

    $quiz_id = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      
        for($i = 0 ; $i < $qes_num ; $i++){
            
            $d = "";
            $e = "";
            
            $question = $_POST['question'];
            $answer = $_POST['answer'];
            $a = $_POST['a'];
            $b = $_POST['b'];
            $c = $_POST['c'];
            if(isset($_POST['d']))   $d = $_POST['d'];
            if(isset($_POST['e']))   $e = $_POST['e'];
            
            $curl2 = curl_init();

            curl_setopt_array($curl2, array(
              CURLOPT_URL => "http://localhost/SWE2/add-question.php?quiz-id=".$quiz_id."&question=".$question."&answer=".$answer."&a=".$a."&b=".$b."&c=".$c."&d=".$d."&e=".$e,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "",
              CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
              ),
            ));

            curl_exec($curl2);
            $err = curl_error($curl2);

            curl_close($curl2);

            if ($err) {
              echo "cURL Error #:" . $err;
            }
            else{echo $i."<br>";}
        }        
        
    }
?>