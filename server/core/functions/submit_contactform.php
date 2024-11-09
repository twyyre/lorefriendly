<?php

    // require_once getcwd().'/core/functions/func_send_query.php';

    function prepareContactFormQuery(
        
        $name=null,
        $email=null,
        $mobile=null,
        $message=null,
        $debug=FALSE
        
        ){
        
        // $state = FALSE;

        $tbName = "contactformentries";

        //check if name exists
        require_once getcwd().'/core/functions/func_send_query.php';
        // $sql = "SELECT * FROM `$tbName` WHERE name='$name';";
        // if($result = sendQuery($seq, $sql)){return FALSE;} 

        // //check if email exists
        // $sql = "SELECT * FROM `$tbName` WHERE email='$email';";
        // if($result = sendQuery($seq, $sql)){return FALSE;} 
        
        $query = "INSERT INTO `$tbName` (name, email, mobile, message, registration_date) VALUES (:name, :email, :mobile, :message, CURRENT_TIMESTAMP)";

        $params = [];

        $params[":name"] = $name;
        $params[":email"] = $email;
        $params[":mobile"] = $mobile;
        $params[":message"] = $message;
        
        return array($query, $params);
        
    }
?>