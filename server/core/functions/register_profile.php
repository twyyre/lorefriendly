<?php

    require_once 'func_send_query.php';

    function query_registerProfile(
        
        $profileName=null,
        $profileEmail=null,
        $profilePassword=null,
        $profileGroup=null,
        $profileLink=null,
        $profileState=null,
        $profileInit=null,
        $profileRegdate=null,
        $profileLastlogin=FALSE,
        $profileClient=null,
        $debug=FALSE
        
        ){
        
        // $state = FALSE;

        $tbName = "profiles";

        //check if name exists
        require_once 'func_send_query.php';
        // $sql = "SELECT * FROM `$tbName` WHERE name='$name';";
        // if($result = sendQuery($seq, $sql)){return FALSE;} 

        // //check if email exists
        // $sql = "SELECT * FROM `$tbName` WHERE email='$email';";
        // if($result = sendQuery($seq, $sql)){return FALSE;} 
        
        $query = "INSERT INTO `$tbName` (profileName, profileEmail, profilePassword, profileGroup, profileLink, profileState, profileInit, profileRegdate, profileLastLoginDate, profileClient) VALUES (:name, :email, :password, :group, :link, :state, :init, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :client)";

        $params = [];

        $params[":name"] = $profileName;
        $params[":email"] = $profileEmail;
        $params[":password"] = $profilePassword;
        $params[":group"] = $profileGroup;
        $params[":link"] = $profileLink;
        $params[":state"] = $profileState;
        $params[":init"] = $profileInit;
        // $params[":regdate"] = $profileRegdate;
        // $params[":lastlogin"] = $profileLastlogin;
        $params[":client"] = $profileClient;

        
        
        return array($query, $params);
        
    }
?>