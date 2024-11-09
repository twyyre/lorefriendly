<?php

    //add a user to a group
    require_once 'get_user.php';
    require_once 'get_user_groups.php';
    require_once 'func_send_query.php';

    function addToGroup($seq, $userId, $groupId, $debug=FALSE){
        
        //$user = getUser($seq, id:$userId);
        $debug = TRUE;
        $state = FALSE;

        //check if user already in group here
        $result = getuserGroups($seq, $userId);

        if(!$result){
            if($debug){
                //echo "FALSE";
            }
        } else {
            foreach($result as $group){
                if($group["id"]==$groupId){
                    $result = array("ERROR"=>"User already in group.");
                    echo json_encode($result);
                    return FALSE;
                }
            }
        }

        $tbName = "user_group";

        $query = "INSERT INTO $tbName VALUES (0, ?, ?)";

        
        if($seq){

            if($debug){echo "<p style='color: green;'>connected.</p>";}

        } else {

            if($debug){echo "<p style='color: red;'>connection failed.</p>";}
            if($debug){echo "<p style='color: red;'>".mysqli_error($seq).".</p>";}
        }
        
        
        
        if($stmt = mysqli_prepare($seq, $query)){
        
            if($debug){echo "<p style='color: green;'>statement prepared.</p>";}

            if(mysqli_stmt_bind_param($stmt, "ii", $userId, $groupId)){

                if($debug){echo "<p style='color: green;'>arguments bound.</p>";}

                if(mysqli_stmt_execute($stmt)){

                    if($debug){echo "<p style='color: green;'>statement executed.</p>";}

                    $state = TRUE;

                    //USER ADDED TO GROUP SUCCESSFULLY
                    $result = array("SUCCESS"=>strtolower("User added to group"));
                    echo json_encode($result);
                    return TRUE;

                
                } else{

                    if($debug){
                        echo "<p style='color: red;'>statement failed to execute.</p>";
                        echo "<p style='color: red;'>".mysqli_error($seq).".</p>";
                    }
                }

            }else{

                if($debug){
                    echo "<p style='color: red;'>could not bind arguments.</p>";
                    echo "<p style='color: red;'>".mysqli_error($seq).".</p>";
                }
            }

            
        } else{

            if($debug){
                echo "<p style='color: red;'>statement prepare failed.</p>";
                echo "<p style='color: red;'>".mysqli_error($seq).".</p>";
            }
        }

        return $state;
    
        
    }

?>