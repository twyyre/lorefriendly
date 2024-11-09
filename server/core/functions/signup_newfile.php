<?php

    session_start();
    require 'register_user.php';

    //if we received a POST request
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(isset($_FILES["pfp"])){

            echo "<br>found";

            $pfp_file = $_FILES["pfp"]["name"];
            $tmp_file = $_FILES["pfp"]["tmp_name"];
            $file_error = $_FILES["pfp"]["error"];

            echo "<br>pfp_file $pfp_file:";
            echo "<br>tmp_file $tmp_file:";
            echo "<br>file_error: $file_error";




            #echo "<br>" . $_FILES["pfp"];
        } else {
            echo "not found";
        }
        
        
        $error = "";
        
        $name = $_POST["name"]; //filter_var($_POST["name"], FILTER_SANITIZE_STRING);

        if(isset($name) and !empty($name)){$name_exists = TRUE;}

        if($name_exists){

            $name = trim($name);
            $name = stripslashes($name);
            $name = htmlspecialchars($name);
            
            if(preg_match('/^[a-zA-Z0-9_@.]+$/', $name)){
                if (strlen($name) >= 4){
                    $name_is_valid = TRUE;
                }else{
                    $error = "Username needs to be atleast 4 characters long.";
                }
            } else {
                $error = "Username can only contain letters, numbers, and underscores.";
            }
        } else {
            $error = "Username field cannot be left blank.";
        }

        
        if($name_is_valid){

            $email = $_POST["email"];
            if(isset($email) and !empty($email)){$email_exists = TRUE;}
            
        } 

        if($email_exists){

            $email = trim($email);
            $email = stripslashes($email);
            $email = htmlspecialchars($email);
            
            if(preg_match('/^[a-zA-Z0-9_@.]+$/', $email)){

                if(strlen($email) >= 4){
                    $email_is_valid = TRUE;
                } else {
                    $error = "Email needs to be atleast 4 characters long.";
                }
            } else {
                $error = "Email can only contain letters, numbers, and underscores.";
            }
        }

        if($email_is_valid){

            $password = $_POST["password"];

            if(isset($password) and !empty($password)){$passowrd_exists = TRUE;}
        }

        if($passowrd_exists){

            $password = trim($password);
            $password = stripslashes($password);
            //$password = htmlspecialchars($password);
            
            if(preg_match('/^[a-zA-Z0-9_@.]+$/', $password)){

                if(strlen($password) >= 4){
                    $password_is_valid = TRUE;
                } else{
                    $error = "Password must be atleast 6 characters long.";
                }
            } else {
                $error = "Password can only contain letters, numbers, and underscores.";
            }
        } else {
            $error = "Password field cannot be left blank.";
        }

        if($password_is_valid){

            $_SESSION["username"] = $name;
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;
        }

        if(isset($error) and !empty($error)){

            $_SESSION["alrt"] = $error;
            header("Location: signup_form.php");
            exit;
        }

        //--------------------------------------------
        if($seq = mysqli_connect("localhost", "root", "", "db_camsystem")){
            $connected = TRUE;
        }

        if($connected){

            echo "connected to database.";

            $sql = "SELECT * FROM users WHERE name = ?;";
            //$sql = "SELECT * FROM users WHERE name = ? AND password = ?;";

            if($stmt = mysqli_prepare($seq, $sql)){
                $statement_prepared = TRUE;
            }
        }

        if($statement_prepared){

            echo "statement prepared.";

            $username = $name;
            //$password = $password;
            
            if(mysqli_stmt_bind_param($stmt, "s", $username)){

                echo "arguments bound.";
                $statement_bound = TRUE;
            } else {
                echo "could not bind arguments";
            }
        }

        if($statement_bound){
            if(mysqli_stmt_execute($stmt)){
                $statement_executed = TRUE;
            } else{
                $statement_executed = FALSE;
            }
        }

        if($statement_executed){

            echo "statement executed.";

            if($rows = mysqli_stmt_get_result($stmt)){
                $result_received = TRUE;
            } else {
                $result_received = FALSE;
            }
        } else {
            echo "<p style='red: green;'>statement failed to execute";
        }

        if($result_received){

            echo "result returned (".$rows->num_rows.") rows";

            if(mysqli_error($seq)){

                $_SESSION["alrt"] = "".mysqli_stmt_error($stmt).".";
                header("Location: signup_form.php");
            }

            if(mysqli_stmt_error($stmt)){
                
                $_SESSION["alrt"] = "".mysqli_stmt_error($stmt).".";
                header("Location: signup_form.php");

            }

            if($rows->num_rows>0){

                echo "user already exists. Try loggin in.";
                $_SESSION["alrt"] = "user already exists. Try loggin in.";
                header("Location: signup_form.php");
                
            } else {

                //register user
                if($state = registerUser($id="", $uid="", $name=$username, $password=$password, $is_admin="", $bank="", $bio="", $cover="", $email=$email, $pfp="", $mobile="", $token="")){

                    echo "result returned (".$rows->num_rows.") rows";
                    echo "user registered successfully.";
                    
                } else {

                    echo "user already exists. Try loggin in.";
                    $_SESSION["alrt"] = "user already exists. Try loggin in.";
                    header("Location: signup_form.php");
                }
            }

        } else {

            echo "failed to get result";
            echo mysqli_error($seq);

        }




        //$link_stat = mysqli_stat($seq);

        //$link_stat = gettype($link_stat);

        //echo "<h4>$link_stat</h4>";

        //require 'validate_login.php';

   
    }
?>

<?php
   
    echo "here the input name and password are compared against mysql database.";

    echo "<br>username: " . $_SESSION["username"];
    echo "<br>password: " . $_SESSION["password"];


?>