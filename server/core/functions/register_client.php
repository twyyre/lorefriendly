<?php

    require_once 'func_send_query.php';

    function query_registerClient(
        
        $clientName=null,
        $clientCapacity=null,
        $clientLimit=null,
        $clientState=null,	
        $clientSpecs=null,
        $clientUser=null,
        $clientMachine=null,
        $clientArch=null,
        $clientRam=null,
        $clientCpu=null,
        $clientSystem=null,
        $clientPython=null,
        $clientPlatform=null,
        $clientCpuCount=null,
        $clientWorkingDirectory=null,
        $clientSecret=null,
        $clientRegDate=null,
        $debug=FALSE
        ){
        
        // $state = FALSE;

        $tbName = "clients";

        //check if name exists
        require_once 'func_send_query.php';
        // $sql = "SELECT * FROM `$tbName` WHERE name='$name';";
        // if($result = sendQuery($seq, $sql)){return FALSE;} 

        // //check if email exists
        // $sql = "SELECT * FROM `$tbName` WHERE email='$email';";
        // if($result = sendQuery($seq, $sql)){return FALSE;} 
        
        $query = "INSERT INTO `$tbName` (clientName, clientCapacity, clientLimit, clientState, clientSpecs, clientUser, clientMachine, clientArch, clientRam, clientCpu, clientSystem, clientPython, clientPlatform, clientCpuCount, clientWorkingDirectory, clientSecret, clientRegDate) VALUES (:name, :capacity, :limit, :state, :specs, :user, :machine, :arch, :ram, :cpu, :system, :python, :platform, :ccount, :wdirectory, :secret, CURRENT_TIMESTAMP)";

        $params = [];

        $params[":name"] = $clientName;
        $params[":capacity"] = $clientCapacity;
        $params[":limit"] = $clientLimit;
        $params[":state"] = $clientState;
        $params[":specs"] = $clientSpecs;
        $params[":user"] = $clientUser;
        $params[":machine"] = $clientMachine;
        $params[":arch"] = $clientArch;
        $params[":ram"] = $clientRam;
        $params[":cpu"] = $clientCpu;
        $params[":system"] = $clientSystem;
        $params[":python"] = $clientPython;
        $params[":platform"] = $clientPlatform;
        $params[":ccount"] = $clientCpuCount;
        $params[":wdirectory"] = $clientWorkingDirectory;
        $params[":secret"] = $clientSecret;
        // $params[":regdate"] = $profileRegdate;

        
        
        return array($query, $params);
        
    }
?>