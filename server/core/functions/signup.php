<?php

    session_start();
    require 'genpass.php';
    require 'register_user.php';

    //if we received a POST request
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //PROFILE PIC 
        if(isset($_FILES["pfp"]) and !empty($_FILES["pfp"])){

            $allowed_extensions = array("jpeg", "jpg", "png");

            echo "<br>found";

            $pfp_name = $_FILES["pfp"]["name"];
            $pfp_tmp_name = $_FILES["pfp"]["tmp_name"];
            $file_error = $_FILES["pfp"]["error"];
            $pfp_extension = pathinfo($pfp_name, PATHINFO_EXTENSION);
            $pfp_extension_lowercase = strtolower($pfp_extension);
            

            if(in_array($pfp_extension_lowercase, $allowed_extensions)){
                
                //rename image to user.image.extension 
                $pfp_new_name = $_POST["name"] . "_pfp." . $pfp_extension_lowercase;
                $pfp_upload_path = "uploads/" . $pfp_new_name;
                move_uploaded_file($pfp_tmp_name, $pfp_upload_path);

                echo "<br> new pfp name: $pfp_new_name";
                echo "<br> tmp name: $pfp_tmp_name";


            } else {
                
                $error = "profile picture must be of type .jpeg, .jpg, or .png.";
                header("Location: signup_form.php");
                exit;
            }

            echo "<br>pfp_name $pfp_name:";
            //echo "<br>tmp_name $tmp_name:";
            echo "<br>file_error: $file_error";
            echo "<br>pfp extension: $pfp_extension";

        } else {

            $pfp_new_name = "";

            // $error = "file not found";
            // header("Location: signup_form.php");
            // exit;
        }

        

    

        $error = "";
        
        $email = $_POST["email"];

        if(isset($email) and !empty($email)){

            $email = trim($email);
            $email = stripslashes($email);
            $email = htmlspecialchars($email);
            
            if(filter_var($email, FILTER_VALIDATE_EMAIL) and preg_match('/^[a-zA-Z0-9_@.]+$/', $email)){

                //if  email is valid, continue

                if(strlen($email) >= 4){
        
                    $name = $_POST["name"];//filter_var($_POST["name"], FILTER_SANITIZE_STRING);

                    if(isset($name) and !empty($name)){

                        $name = trim($name);
                        $name = stripslashes($name);
                        $name = htmlspecialchars($name);
                        
                        if(filter_var($_POST["name"], FILTER_SANITIZE_STRING) and preg_match('/^[a-zA-Z0-9_@.]+$/', $name)){

                            //if name  is valid, continue

                            if(strlen($name) >= 4){

                                $password = $_POST["password"];//filter_var($_POST["password"], FILTER_SANITIZE_STRING);

                                if(isset($password) and !empty($password)){

                                    if(strlen($password) >= 6){

                                        $password = trim($password);
                                        $password = stripslashes($password);
                                        $password = htmlspecialchars($password);
                                        // $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 15]);
                                        
                                        

                                        if(true){//preg_match('/^[a-zA-Z0-9_]+$/', trim($password))){

                                            $mobile = $_POST["mobile"];
                                        
                                            if(isset($mobile) and !empty($mobile)){

                                                $mobile = trim($mobile);
                                                $mobile = stripslashes($mobile);
                                                $mobile = htmlspecialchars($mobile);
                                                
                                                if(strlen($mobile)>4){

                                                    if(preg_match('/^[0-9]{10}+$/', $mobile)){

                                                        //if name email is valid, continue
                                                        $_SESSION["username"] = $name;
                                                        $_SESSION["email"] = $email;
                                                        $_SESSION["password"] = $password;
                                                        $_SESSION["mobile"] = $mobile;

                                                        //--------------------------------------------
                                                        if($seq = mysqli_connect("localhost", "root", "", "db_camsystem")){

                                                            //IF CONNECTED TO DB, CONTINUE
                                                            
                                                            echo "<p style='color: green;'>connected to database.</p>";

                                                            $sql = "SELECT * FROM users WHERE name = ?;";
                                                            //$sql = "SELECT * FROM users WHERE name = ? AND password = ?;";

                                                            if($stmt = mysqli_prepare($seq, $sql)){

                                                                echo "<p style='color: green;'>statement prepared.</p>";

                                                                $username = $name;
                                                                //$password = $password;
                                                                
                                                                if(mysqli_stmt_bind_param($stmt, "s", $username)){
                                                                //if(mysqli_stmt_bind_param($stmt, "ss", $username, $password)){
                                                                    echo "<p style='color: green;'>arguments bound.</p>";
                                                                } else{
                                                                    echo "<p style='color: red;'>could not bind arguments</p>";
                                                                }

                                                                
                                                                if(mysqli_stmt_execute($stmt)){

                                                                    echo "<p style='color: green;'>statement executed.</p>";

                                                                    if($rows = mysqli_stmt_get_result($stmt)){

                                                                        echo "<p style='color: green;'>result returned (".$rows->num_rows.") rows</p>";

                                                                        if(mysqli_error($seq)){

                                                                            $_SESSION["alrt"] = "<p style='color: green;'>".mysqli_stmt_error($stmt).".</p>";
                                                                            header("Location: signup_form.php");
                                                                        }

                                                                        if(mysqli_stmt_error($stmt)){
                                                                            
                                                                            $_SESSION["alrt"] = "<p style='color: green;'>".mysqli_stmt_error($stmt).".</p>";
                                                                            header("Location: signup_form.php");

                                                                        }


                                                                        
                                                                        if($rows->num_rows>0){

                                                                            
                                                                            $_SESSION["alrt"] = "user already exists. Try loggin in.";
                                                                            header("Location: signup_form.php");
                                                                            
                                                                        } else {

                                                                            //register user
                                                                            if($state = registerUser($id="", $uid=generateSalt(), $name=$username, $password=$password, $is_admin="", $bank="", $bio="", $cover="", $email=$email, $pfp="default.png", $mobile=$mobile, $token="")){

                                                                                echo "<p style='color: green;'>result returned (".$rows->num_rows.") rows</p>";
                                                                                echo "<p style='color: green;'>user registered successfully.</p>";
                                                                                
                                                                            } else {
                                                                                
                                                                                $_SESSION["alrt"] = "user already exists. Try loggin in.";
                                                                                header("Location: signup_form.php");
                                                                            }
                                                                        }
                                                                    }else {
                                                                        
                                                                        echo "failed to get result";
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

                                                    } else{
                                                        $error = "invalid character in mobile number.";
                                                    }

                                                } else{
                                                    $error = "invalid mobile number.";
                                                }
                                            } else{
                                                $error = "mobile number cannot be left blank.";
                                            }

                                        } else {
                                            $error = "Password can only contain letters, numbers, and underscores.";
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

                } else {
                    $error = "email needs to be atleast 4 characters long.";
                }
            } else {
                $error = "email can only contain letters, numbers, and underscores.";
                $error = "invalid email.";
            }

            
        } else {
            $error = "email cannot be left blank.";
        }

        
       if(isset($error) and !empty($error)){

        $_SESSION["alrt"] = $error;
        header("Location: signup_form.php");
        exit;
        } 
    }

?>

<?php
   
    echo "here the input name and password are compared against mysql database.";

    echo "<br>username: " . $_SESSION["username"];
    echo "<br>password: " . $_SESSION["password"];


?>