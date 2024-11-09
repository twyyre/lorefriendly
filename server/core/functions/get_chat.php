<?php

    //$rows = sendQuery($seq, $sql=$sql, $params=null);

    function getChat($seq, $id=null, $uid=null, $username=null, $content=null, $debug=FALSE){

        require_once 'func_send_query.php';
        require_once 'genpass.php';
        require_once 'func_db_connect.php';

        $tbName = "chats";

        $query = "SELECT * FROM `$tbName` WHERE ";
        $types = "";
        $not_first = FALSE;

        $params = [];

        if(isset($id) and !empty($id)){if($not_first){$query .= " AND ";}; $query .= "id = ?"; $types.="i";  $not_first = TRUE; array_push($params, $id);}
        if(isset($uid) and !empty($uid)){if($not_first){$query .= " AND ";}; $query .= "uid = ?"; $types.="i";  $not_first = TRUE; array_push($params, $uid);}
        if(isset($username) and !empty($username)){if($not_first){$query .= " AND ";}; $query .= "username = ?"; $types.="s";  $not_first = TRUE; array_push($params, $username);}
        if(isset($content) and !empty($content)){if($not_first){$query .= " AND ";}; $query .= "content = ?"; $types.="s";  $not_first = TRUE; array_push($params, $content);}

        $state = FALSE;
        
        // echo $query;
        // exit;

        if($seq){

            if($debug){
                echo "<p style='color: green;'>connected.</p>";
            }

        } else {

            if($debug){
                echo "<p style='color: red;'>connection failed.</p>";
                echo "<p style='color: red;'>".mysqli_error($seq).".</p>";
            }
        }
        
        
        
        if($stmt = mysqli_prepare($seq, $query)){
        
            if($debug){
                echo "<p style='color: green;'>statement prepared.</p>";
            }

            if(mysqli_stmt_bind_param($stmt, $types,    ...$params)){

                // echo $query;
                // echo "<br>types: " . $types;
                // echo "<br>types:" . strlen($types);
                

                if($debug){
                    echo "<p style='color: green;'>arguments bound.</p>";
                }

                if(mysqli_stmt_execute($stmt)){

                    if($debug){
                        echo "<p style='color: green;'>statement executed.</p>";
                    }

                    $state = TRUE;

                    if($rows = mysqli_stmt_get_result($stmt)->fetch_all(MYSQLI_ASSOC)){

                        $result = $rows;//array();

                        // for($i=0;$i<$rows->num_rows;$i++){
                    
                        //     $row = $rows->fetch_row();

                        //     array_push($result, $row);
                        // }   

                        if(count($result)>0){

                            // foreach(array_reverse($result) as $row){
                            // echo "<br />id: $row[0].<br/>"
                            // . "name: $row[2].<br />"
                            // . "password: $row[3].<br />"
                            // . "regdate: $row[12].<hr>";
                            // }

                            return $result;
                
                        } else {
                            if($debug){
                                echo "<br>NO SUCH USER.";
                            }

                            return $result;
                        }
                    
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

        // return $state;
    }
?>