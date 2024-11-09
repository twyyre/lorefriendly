<?php

    
    include_once 'func_send_query.php';

    function query_updateClient(
        $clientSecret=null,
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
        $clientRegDate=null,
        $debug=FALSE
    ){

        $query = "UPDATE `clients` SET ";
        $types = "";
        $not_first = FALSE;

        $params = [];

        if(isset($clientName) and !empty($clientName)){if($not_first){$query .= ", ";}; $query .= "clientName = :name"; $types.="s";  $not_first = TRUE; $params["clientName"]=$clientName;}
        if(isset($clientCapacity) and !empty($clientCapacity)){if($not_first){$query .= ", ";}; $query .= "clientCapacity = :capacity"; $types.="i";  $not_first = TRUE; $params["clientCapacity"]=$clientCapacity;}
        if(isset($clientLimit) and !empty($clientLimit)){if($not_first){$query .= ", ";}; $query .= "clientLimit = :limit"; $types.="s";  $not_first = TRUE; $params["clientLimit"]=$clientLimit;}
        if(isset($clientState) and !empty($clientState)){if($not_first){$query .= ", ";}; $query .= "clientState = :state"; $types.="i";  $not_first = TRUE; $params["clientState"]=$clientState;}
        if(isset($clientSpecs) and !empty($clientSpecs)){if($not_first){$query .= ", ";}; $query .= "clientSpecs = :specs"; $types.="s";  $not_first = TRUE; $params["clientSpecs"]=$clientSpecs;}
        if(isset($clientUser) and !empty($clientUser)){if($not_first){$query .= ", ";}; $query .= "clientUser = :user"; $types.="i";  $not_first = TRUE; $params["clientUser"]=$clientUser;}
        if(isset($clientMachine) and !empty($clientMachine)){if($not_first){$query .= ", ";}; $query .= "clientMachine = :machine"; $types.="i";  $not_first = TRUE; $params["clientMachine"]=$clientMachine;}
        if(isset($clientArch) and !empty($clientArch)){if($not_first){$query .= ", ";}; $query .= "clientArch = :arch"; $types.="i";  $not_first = TRUE; $params["clientArch"]=$clientArch;}
        if(isset($clientRam) and !empty($clientRam)){if($not_first){$query .= ", ";}; $query .= "clientRam = :ram"; $types.="i";  $not_first = TRUE; $params["clientRam"]=$clientRam;}
        if(isset($clientCpu) and !empty($clientCpu)){if($not_first){$query .= ", ";}; $query .= "clientCpu = :cpu"; $types.="i";  $not_first = TRUE; $params["clientCpu"]=$clientCpu;}
        if(isset($clientPlatform) and !empty($clientPlatform)){if($not_first){$query .= ", ";}; $query .= "clientPlatform = :platform"; $types.="i";  $not_first = TRUE; $params["clientPlatform"]=$clientPlatform;}
        if(isset($clientSystem) and !empty($clientSystem)){if($not_first){$query .= ", ";}; $query .= "clientSystem = :system"; $types.="i";  $not_first = TRUE; $params["clientSystem"]=$clientSystem;}
        if(isset($clientPython) and !empty($clientPython)){if($not_first){$query .= ", ";}; $query .= "clientPython = :python"; $types.="i";  $not_first = TRUE; $params["clientPython"]=$clientPython;}
        if(isset($clientCpuCount) and !empty($clientCpuCount)){if($not_first){$query .= ", ";}; $query .= "clientCpuCount = :cpucount"; $types.="i";  $not_first = TRUE; $params["clientCpuCount"]=$clientCpuCount;}
        if(isset($clientWorkingDirectory) and !empty($clientWorkingDirectory)){if($not_first){$query .= ", ";}; $query .= "clientWorkingDirectory = :wdir"; $types.="i";  $not_first = TRUE; $params["clientWorkingDirectory"]=$clientWorkingDirectory;}
        if(isset($clientSecret) and !empty($clientSecret)){if($not_first){$query .= ", ";}; $query .= "clientSecret = :secret"; $types.="i";  $not_first = TRUE; $params["clientSecret"]=$clientSecret;}
        if(isset($clientRegDate) and !empty($clientRegDate)){if($not_first){$query .= ", ";}; $query .= "clientRegDate = :regdate"; $types.="i";  $not_first = TRUE; $params["clientRegDate"]=$clientRegDate;}
        
        $query .= " WHERE clientSecret = '$clientSecret';";

        $params2 = array();

        if(!empty($params["clientName"])){
            $params2[":name"] = $params["clientName"];
        }

        if(!empty($params["clientCapacity"])){
            $params2[":capacity"] = $params["clientCapacity"];
        }

        if(!empty($params["clientLimit"])){
            $params2[":limit"] = $params["clientLimit"];
        }

        if(!empty($params["clientState"])){
            $params2[":state"] = $params["clientState"];
        }

        if(!empty($params["clientSpecs"])){
            $params2[":specs"] = $params["clientSpecs"];
        }

        if(!empty($params["clientUser"])){
            $params2[":user"] = $params["clientUser"];
        }

        if(!empty($params["clientMachine"])){
            $params2[":machine"] = $params["clientMachine"];
        }

        if(!empty($params["clientArch"])){
            $params2[":arch"] = $params["clientArch"];
        }

        if(!empty($params["clientRam"])){
            $params2[":ram"] = $params["clientRam"];
        }

        if(!empty($params["clientCpu"])){
            $params2[":cpu"] = $params["clientCpu"];
        }

        if(!empty($params["clientPlatform"])){
            $params2[":platform"] = $params["clientPlatform"];
        }

        if(!empty($params["clientSystem"])){
            $params2[":system"] = $params["clientSystem"];
        }

        if(!empty($params["clientPython"])){
            $params2[":python"] = $params["clientPython"];
        }

        if(!empty($params["clientCpuCount"])){
            $params2[":cpucount"] = $params["clientCpuCount"];
        }

        if(!empty($params["clientWorkingDirectory"])){
            $params2[":wdir"] = $params["clientWorkingDirectory"];
        }

        if(!empty($params["clientSecret"])){
            $params2[":secret"] = $params["clientSecret"];
        }

        if(!empty($params["clientRegDate"])){
            $params2[":regdate"] = $params["clientRegDate"];
        }
        
        // echo $query;
        // exit();
        return array($query, $params2);
    }
?>