<?php

    function createTable($seq, $sql){

        require_once 'func_create_tables_sql.php';

        if(func_num_args()>1){
            $args = func_get_args();
        }

        //validate and sanitize table name
        if(is_string($sql)){
            
            if(strlen($sql)<=6){
                
            }
        }

        $state = FALSE;

        if($seq){

            if($stmt = mysqli_prepare($seq, $sql)){
                
                if($state = mysqli_stmt_execute($stmt)){
                    
                    $state = TRUE;

                } else {

                    $state = FALSE;
                    echo "<p style='color: red;'>".mysqli_error($seq).".</p>";
                }

            } else{

                $state = FALSE;
                echo "<p style='color: red;'>".mysqli_error($seq).".</p>";
                
            }

            if($state = mysqli_stmt_error($stmt)){
                
                //return the error
                echo "<p style='color: red;'>".mysqli_error($seq).".</p>";

            }else {

                $state = TRUE;
            }
            
            //mysqli_close($seq);

            } else {

                echo "<p style='color: red;'>".mysqli_error($seq).".</p>";
            }
            
        return $state;
        

    }

?>