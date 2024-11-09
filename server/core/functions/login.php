<?php

    session_start();

    // foreach ($_POST as $item){
    //     echo array_search($item, $_POST) . ": ". $item;
    // }

    //$_SESSION["alrt"] = "WARNING";

    //if we received a POST request
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $error = "";
        
        filter_var($name = $_POST["name"]);

        if(isset($name) and !empty($name)){

            $name = trim($name);
            $name = stripslashes($name);
            $name = htmlspecialchars($name);
            
            if(preg_match('/^[a-zA-Z0-9_@.]+$/', $name)){

                if(strlen($name) >= 4){

                    $password = $_POST["password"];

                    if(isset($password) and !empty($password)){

                        if(strlen($password) >= 6){

                            $password = trim($password);
                            $password = stripslashes($password);
                            $password = htmlspecialchars($password);
                            
                            if(preg_match('/^[a-zA-Z0-9_]+$/', trim($password))){
                                
                                $_SESSION["username"] = $name;
                                $_SESSION["password"] = $password;

                                if(isset($_POST["remember"]) and $_POST["remember"]==TRUE){
                                    $remember = trim($_POST["remember"]);
                                    $remember = stripslashes($remember);
                                    $remember = htmlspecialchars($remember);  
                                    $remember = TRUE;
                                    
                                } else {
                                    $remember = FALSE;
                                    
                                }

                                $_SESSION["remember"] = $remember;

                                //--------------------------------------------
                                if($seq = mysqli_connect("localhost", "root", "", "db_camsystem")){
                                    
                                    echo "<p style='color: green;'>connected to database.</p>";

                                    $sql = "SELECT * FROM users WHERE name = ?;";

                                    if($stmt = mysqli_prepare($seq, $sql)){

                                        echo "<p style='color: green;'>statement prepared.</p>";

                                        $username = $name;
                                        $password = $password;
                        

                                        if(mysqli_stmt_bind_param($stmt, "s", $username)){

                                            echo "<p style='color: green;'>arguments bound.</p>";

                                        } else{

                                            echo "<p style='color: red;'>could not bind arguments</p>";

                                        }

                                        
                                        if(mysqli_stmt_execute($stmt)){

                                            echo "<p style='color: green;'>statement executed.</p>";

                                            if($rows = mysqli_stmt_get_result($stmt)){

                                                echo "<p style='color: green;'>result returned (".$rows->num_rows.") rows</p>";

                                                if(mysqli_error($seq)){
                                                    echo "<p style='color: green;'>".mysqli_error($seq).".</p>";
                                                }

                                                if(mysqli_stmt_error($stmt)){
                                                    echo "<p style='color: green;'>".mysqli_stmt_error($stmt).".</p>";
                                                }

                                                if($rows->num_rows>0){

                                                
                                                    for($i=0;$i<$rows->num_rows;$i++){
                                                    
                                                        $row = $rows->fetch_row();

                                                        $result = array();

                                                        array_push($result, $row);
                                                        
                                                        echo "<br>row: " . $row[3];
                                                        echo "<br>password: " . $password;
                                                        
                                                        if($password==$row[3]){
                                                            
                                                            //password_verify($_POST["password"], $row[3])){
                                                            //echo "<h1>verified password: " . $_POST["password"] . "</h1>";

                                                            if(!empty($result)){

                                                                if(count($result) > 0){
    
                                                                    $_SESSION["logged_in"] = TRUE;
    
                                                                    header("Location: main_page.php");
                                                                    exit;
    
                                                                    echo "<p style='color: green;'>user logged in.</p>";
    
                                                                    foreach($result as $user_rows){
                                                                        
                                                                        if(is_array($user_rows)){
    
                                                                            echo "<div><div class='row' style='border: solid 1px black;'>";
    
                                                                            echo "
                                                                                <style>
                                                                                    .value{
                                                                                        background: yellow;
                                                                                        margin-left: 10px;
                                                                                        margin-right: 20px;
                                                                                    }
    
                                                                                </style>
    
                                                                                <span class='col'>id <span class='value'>[" . $user_rows[0] . "]</span></span>
                                                                                <span class='col'>uid<span class='value'>[" . $user_rows[1] . "]</span></span>
                                                                                <span class='col'>name<span class='value'>[" . $user_rows[2] . "]</span></span
                                                                                span class='col'>password<span class='value'>[" . $user_rows[3]  . "]</span></span>
                                                                                <span class='col'>is_admin<span class='value'>[" . $user_rows[4] . "]</span></span>
                                                                                <span class='col'>bank<span class='value'>[" . $user_rows[5] . "]</span></span>
                                                                                <span class='col'>bio<span class='value'>[" . $user_rows[6] . "]</span></span>
                                                                                <span class='col'>cover<span class='value'>[" . $user_rows[7] . "]</span></span>
                                                                                <span class='col'>email<span class='value'>[" . $user_rows[8] . "]</span></span>
                                                                                <span class='col'>pfp<span class='value'>[" . $user_rows[9] . "]</span></span>
                                                                                <span class='col'>mobile<span class='value'>[" . $user_rows[10] . "]</span></span>
                                                                                <span class='col'>token<span class='value'>[" . $user_rows[11] . "]</span></span>
                                                                                <span class='col'>reg_date<span class='value'>[" . $user_rows[12] . "]</span></span>
                                                                            
                                                                            ";
    
                                                                            echo "</div>";
                                                                            
                                                                        } else {
                                                                            echo "<br>" . "(" . $rows . ")";
                                                                        }
                                                                    }
    
                                                                } else {
                                                                    echo "<p style='color: red;'>user already exists.</p>";
                                                                }
    
                                                                
    
                                                            } else {
                                                                echo "<p style='color: red;'>result is empty.</p>";
                                                            }
                                                           
                                                        } else {
                                                            // echo "<br>password not verified";
                                                            $error = "invalid password.";
                                                        }

                                                        

                                                        

                                                        
                                                    }
                                                } else {

                                                    echo "invalid login information.";
                                                    
                                                    $_SESSION["alrt"] = "invalid login information.";
                                                    header("Location: login_form.php");
                                                }
                                            }else {
                                                echo "<p style='color: red;'>failed to get result</p>";
                                            }
                                        } else {
                                            echo "<p style='red: green;'>statement failed to execute</p>";
                                        }

                                    } else {

                                        echo "<p style='color: red;'>Statement prepared.</p>";

                                        echo mysqli_error($seq);
                                    }


                                } else {
                                    
                                    echo "<p style='color: red;'>connection failed.</p>";
                                    echo "<p style='color: red;'>".mysqli_error($seq).".</p>";
                                }

                                $link_stat = mysqli_stat($seq);

                                $link_stat = gettype($link_stat);

                                echo "<h4>$link_stat</h4>";

                                require 'validate_login.php';

                            } else{
                                $error = "invalid login information";//"Password can only contain letters, numbers, and underscores.";
                            }

                        } else {
                            $error = "Password must be atleast 6 characters long.";
                        }

                    } else {
                        $error = "Password field cannot be left blank.";
                    }

                } else {
                    $error = "Username needs to be atleast 4 characters long.";
                }

            } else {
                $error = "Username can only contain letters, numbers, and underscores.";
            }
        } else {
            $error = "Username field cannot be left blank.";
        }

        if(isset($error) and !empty($error)){

            $_SESSION["alrt"] = $error;
            header("Location: login_form.php");
            exit;
        }
        
    }
?>

<?php
   
    echo "here the input name and password are compared against mysql database.";

    echo "<br>username: " . $_SESSION["username"];
    echo "<br>password: " . $_SESSION["password"];


?>