<?php

    
    include_once 'func_send_query.php';

    function query_updateProfile($profileId=null, $profileName=null, $profileEmail=null, $profilePassword=null, $profileGroup=null, $profileLink=null, $profileState=null, $profileInit=null, $profileRegdate=null, $profileLastlogin=FALSE, $profileClient=null, $debug=FALSE){

        $query = "UPDATE `profiles` SET ";
        $types = "";
        $not_first = FALSE;

        $params = [];

        if(isset($profileName) and !empty($profileName)){if($not_first){$query .= ", ";}; $query .= "profileName = :name"; $types.="s";  $not_first = TRUE; $params["profileName"]=$profileName;}
        if(isset($profileEmail) and !empty($profileEmail)){if($not_first){$query .= ", ";}; $query .= "profileEmail = :email"; $types.="s";  $not_first = TRUE; $params["profileEmail"]=$profileEmail;}
        if(isset($profilePassword) and !empty($profilePassword)){if($not_first){$query .= ", ";}; $query .= "profilePassword = :password"; $types.="s";  $not_first = TRUE; $params["profilePassword"]=$profilePassword;}
        if(isset($profileGroup) and !empty($profileGroup)){if($not_first){$query .= ", ";}; $query .= "profileGroup = :group"; $types.="i";  $not_first = TRUE; $params["profileGroup"]=$profileGroup;}
        if(isset($profileLink) and !empty($profileLink)){if($not_first){$query .= ", ";}; $query .= "profileLink = :link"; $types.="s";  $not_first = TRUE; $params["profileLink"]=$profileLink;}
        if(isset($profileState) and !empty($profileState)){if($not_first){$query .= ", ";}; $query .= "profileState = :state"; $types.="i";  $not_first = TRUE; $params["profileState"]=$profileState;}
        if(isset($profileInit) and !empty($profileInit)){if($not_first){$query .= ", ";}; $query .= "profileInit = :init"; $types.="i";  $not_first = TRUE; $params["profileInit"]=$profileInit;}
        if(isset($profileRegdate) and !empty($profileRegdate)){if($not_first){$query .= ", ";}; $query .= "profileRegDate = :regdate"; $types.="i";  $not_first = TRUE; $params["profileRegdate"]=$profileRegdate;}
        if(isset($profileLastlogin) and !empty($profileLastlogin)){if($not_first){$query .= ", ";}; $query .= "profileLastLoginDate = :lastlogin"; $types.="i";  $not_first = TRUE; $params["profileLastlogin"]=$profileLastlogin;}
        if(isset($profileClient) and !empty($profileClient)){if($not_first){$query .= ", ";}; $query .= "profileClient = :profilec"; $types.="i";  $not_first = TRUE; $params["profileClient"]=$profileClient;}
        
        $query .= " WHERE profileId = $profileId;";

        $params2 = array();

        if(!empty($params["profileName"])){
            $params2[":name"] = $params["profileName"];
        }

        if(!empty($params["profileEmail"])){
            $params2[":email"] = $params["profileEmail"];
        }

        if(!empty($params["profilePassword"])){
            $params2[":password"] = $params["profilePassword"];
        }

        if(!empty($params["profileGroup"])){
            $params2[":group"] = $params["profileGroup"];
        }

        if(!empty($params["profileLink"])){
            $params2[":link"] = $params["profileLink"];
        }

        if(!empty($params["profileState"])){
            $params2[":state"] = $params["profileState"];
        }

        if(!empty($params["profileInit"])){
            $params2[":init"] = $params["profileInit"];
        }

        if(!empty($params["profileRegdate"])){
            $params2[":regdate"] = $params["profileRegdate"];
        }

        if(!empty($params["profileLastLogin"])){
            $params2[":lastlogin"] = $params["profileLastLogin"];
        }

        if(!empty($params["profileClient"])){
            $params2[":profilec"] = $params["profileClient"];
        }
        
        return array($query, $params2);
    }
?>