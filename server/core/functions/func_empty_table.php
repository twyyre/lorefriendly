<?php

    function emptyTable($seq, $table_name){

        //validate and santisize table name
        // if(is_string($table_name)){
        //     if(strlen($table_name)<=6){
                
        //     }
        // }

        $state = FALSE;

        //$seq = mysqli_connect($hostname="localhost", $username="root", $password="", $database="db_camsystem");
        
        //sql to create table
        $sql = 'TRUNCATE TABLE `' . $table_name .'`';

        if($stmt = mysqli_prepare($seq, $sql)){
            
            if($state = mysqli_stmt_execute($stmt)){

                $state = TRUE;
            } else {

                $state = FALSE;
            }
        } else{

            $state = FALSE;
        }

        //if(is_object($stmt)){echo "object";}else{echo "not";}

        //mysqli_stmt_bind_param($stmt, "s", $table_name);

        

        //sendQuery($stmt, $params=null);

        // if(mysqli_error($seq)>0){
        //     echo "ERROR: " . mysqli_error($seq);
        // }

        if($state = mysqli_error($seq)){
            //return the error
        }else{
            $state = TRUE;
        }
        
        //mysqli_close($seq);

        
        return $state;
        

    }

?>