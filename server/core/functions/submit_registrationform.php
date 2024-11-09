<?php

    // require_once getcwd().'/core/functions/func_send_query.php';

    function prepareRegistrationQuery(
        
        $name=null,
        $email=null,
        $mobile=null,
        $age=null,
        $course=null,
        $debug=FALSE
        
        ){
        
        // $state = FALSE;

        $tbName = "registrationformentries";

        //check if name exists
        // require_once getcwd().'/core/functions/func_send_query.php';
        // $sql = "SELECT * FROM `$tbName` WHERE name='$name';";
        // if($result = sendQuery($seq, $sql)){return FALSE;} 

        // //check if email exists
        // $sql = "SELECT * FROM `$tbName` WHERE email='$email';";
        // if($result = sendQuery($seq, $sql)){return FALSE;} 
        
        $query = "INSERT INTO `$tbName` (name, email, mobile, age, courseid, registration_date) VALUES (:name, :email, :mobile, :age, :courseid, CURRENT_TIMESTAMP)";

        $params = [];

        $params[":name"] = $name;
        $params[":email"] = $email;
        $params[":mobile"] = $mobile;
        $params[":age"] = $age;
        $params[":courseid"] = $course;
        
        return array($query, $params);
        
    }
?>