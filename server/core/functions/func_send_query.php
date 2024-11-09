<?php

    
    function sendQuery($seq, $sql=null, $params=null, $debug=FALSE){

        $state = FALSE;
        
        $result = array();

        //if $sql holds a stmt object or pure string
        if(is_object($sql)){
            $stmt = $sql;
        } else {
            $stmt = mysqli_prepare($seq, $sql);
            
        }

        try{
            
            //handling parameters
            // if(!empty($params) and (is_array($params))){

            //     $count = count($params);
            //     $types = "";
                
            //     for($i=0;$i<$count;$i++){
            //         $types .= "s";
            //     }

            //     mysqli_stmt_bind_param($stmt, $types, ...$params);

            // }
            
            if(mysqli_stmt_execute($stmt)){

                if($rows = mysqli_stmt_get_result($stmt)->fetch_all(MYSQLI_ASSOC)){

                    // for($i=0;$i<$rows->num_rows;$i++){
                        
                    //     $row = $rows->fetch_row();

                    //     //echo "IS_ARRAY:".is_array($row);
                    //     //exit;
                    //     array_push($result, $row);
                    // }

                    $result = $rows;
                    
                } else {

                    //if($debug){
                        //echo "<br> could not get result.";
                    //}

                    return FALSE;
                }
            } else {
                if($debug){
                    echo "<br>could not execute statement.";
                    echo mysqli_error($seq);
                }
            }

            if(mysqli_errno($seq)){
                if($debug){
                    echo mysqli_error($seq);
                }
            }

            return $result;
        }

        catch(exception $e){
            echo "EXCEPTION: " . $e;
        }
    }
?>