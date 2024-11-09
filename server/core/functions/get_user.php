<?php

    function getUser($seq, $id=null, $uid=null, $name=null, $is_admin=null, $bank=null, $bio=null, $cover=null, $email=null, $pfp=null, $mobile=null, $token=null, $debug=FALSE){

        
        require_once 'func_send_query.php';
        require_once 'genpass.php';
        require_once 'func_db_connect.php';

        $tbName = "users";

        $query = "SELECT * FROM `$tbName` WHERE ";
        $types = "";
        $not_first = FALSE;

        $params = [];

        if(isset($id) and !empty($id)){if($not_first){$query .= " AND ";}; $query .= "id = ?"; $types.="i";  $not_first = TRUE; array_push($params, $id);}
        if(isset($uid) and !empty($uid)){if($not_first){$query .= " AND ";}; $query .= "uid = ?"; $types.="i";  $not_first = TRUE; array_push($params, $uid);}
        if(isset($name) and !empty($name)){if($not_first){$query .= " AND ";}; $query .= "name = ?"; $types.="s";  $not_first = TRUE; array_push($params, $name);}
        // if(isset($password) and !empty($password)){if($not_first){$query .= " AND ";}; $query .= "password = ?"; $types.="s";  $not_first = TRUE; array_push($params, $password);}
        if(isset($is_admin) and !empty($is_admin)){if($not_first){$query .= " AND ";}; $query .= "is_admin = ?"; $types.="s";  $not_first = TRUE; array_push($params, $is_admin);}
        if(isset($bank) and !empty($bank)){if($not_first){$query .= " AND ";}; $query .= "bank = ?"; $types.="s";  $not_first = TRUE; array_push($params, $bank);}
        if(isset($bio) and !empty($bio)){if($not_first){$query .= " AND ";}; $query .= "bio = ?"; $types.="s";  $not_first = TRUE; array_push($params, $bio);}
        if(isset($cover) and !empty($cover)){if($not_first){$query .= " AND ";}; $query .= "cover = ?"; $types.="s";  $not_first = TRUE; array_push($params, $cover);}
        if(isset($email) and !empty($email)){if($not_first){$query .= " AND ";}; $query .= "email = ?"; $types.="s";  $not_first = TRUE; array_push($params, $email);}
        if(isset($pfp) and !empty($pfp)){if($not_first){$query .= " AND ";}; $query .= "pfp = ?"; $types.="i";  $not_first = TRUE; array_push($params, $pfp);}
        if(isset($mobile) and !empty($mobile)){if($not_first){$query .= " AND ";}; $query .= "mobile = ?"; $types.="s";  $not_first = TRUE; array_push($params, $mobile);}
        if(isset($token) and !empty($token)){if($not_first){$query .= " AND ";}; $query .= "token = ?"; $types.="s";  $not_first = TRUE; array_push($params, $token);}

        $state = FALSE;
        
        // echo $query;
        // exit;

        if($seq){

            if($debug){echo "<p style='color: green;'>connected.</p>";}

        } else {

            if($debug){echo "<p style='color: red;'>connection failed.</p>";}
            if($debug){echo "<p style='color: red;'>".mysqli_error($seq).".</p>";}
        }
        
        
        
        if($stmt = mysqli_prepare($seq, $query)){
        
            if($debug){echo "<p style='color: green;'>statement prepared.</p>";}

            if(mysqli_stmt_bind_param($stmt, $types,    ...$params)){

                if($debug){echo "<p style='color: green;'>arguments bound.</p>";}

                if(mysqli_stmt_execute($stmt)){

                    if($debug){echo "<p style='color: green;'>statement executed.</p>";}
                    $state = TRUE;

                    if($rows = mysqli_stmt_get_result($stmt)->fetch_all(MYSQLI_ASSOC)){

                        $result = $rows;//array();

                        // for($i=0;$i<$rows->num_rows;$i++){
                    
                        //     $row = $rows->fetch_row();

                        //     array_push($result, $row);
                        // }   

                        if(count($result)>0){

                            $row["password"] = null;
                            
                            return $result;
                
                        } else {

                            $result = FALSE;
                            // echo "<br>count==0";
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