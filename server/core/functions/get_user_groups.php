<?php

    //get groups of user
    function getuserGroups($seq, $userId, $debug=FALSE){
        
        require_once 'func_send_query.php';
        require_once 'genpass.php';
        require_once 'func_db_connect.php';

        $tbName = "user_group";

        $query = "SELECT * FROM `$tbName` WHERE user_id=?";
        
        $state = FALSE;

        if($seq){

            if($debug){echo "<p style='color: green;'>connected.</p>";}

        } else {

            if($debug){echo "<p style='color: red;'>connection failed.</p>";}
            if($debug){echo "<p style='color: red;'>".mysqli_error($seq).".</p>";}
        }
        
        
        if($stmt = mysqli_prepare($seq, $query)){
        
            if($debug){echo "<p style='color: green;'>statement prepared.</p>";}

            if(mysqli_stmt_bind_param($stmt, "i", $userId)){

                if($debug){echo "<p style='color: green;'>arguments bound.</p>";}

                if(mysqli_stmt_execute($stmt)){

                    if($debug){echo "<p style='color: green;'>statement executed.</p>";}
                    $state = TRUE;

                    if($rows = mysqli_stmt_get_result($stmt)->fetch_all(MYSQLI_ASSOC)){

                        $result = $rows;

                        if(count($result)>0){

                            
                            return $result;
                
                        } else {

                            $result = FALSE;
                            
                            return $result;
                            
                        }
                    
                    } else {
                        return FALSE;
                    }
                    
                    

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

