<?php

    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        
        if($_POST["form_type"]=="add_action"){

            if(!empty($_POST["action_profile"])){
                $actionProfile = $_POST["action_profile"];

                if(!empty($_POST["action_name"])){
                    $actionName = $_POST["action_name"];

                    if(!empty($_POST["action_target"])){
                        $actionTarget = $_POST["action_target"];

                        if(!empty($_POST["action_value"])){
                            $actionValue = $_POST["action_value"];
                            if(!empty($_POST["action_chance"])){

                                $actionChance = $_POST["action_chance"];

                                
                                require_once 'models/action_model.php';


                                //REGISTER ACTION
                                
                                $actionArray = [$id=null, $actionProfile, $actionName, $actionTarget, $actionValue, $actionChance, $is_complete=0, $submitted=null];

                                $seq = new actionModel();
                                
                                if($seq->register(...$actionArray)){
                                    echo "<br>registered.";
                                } else {
                                    
                                    $_SESSION["warning"] = "could not add action.";
                                    header("Location: dashboard.php");
                                    exit;
                                }

                            } else {
                                $_SESSION["warning"] = "please select a chance/probability for action.";
                                header("Location: dashboard.php");
                                exit;
                            }
                        } else {
                            $_SESSION["warning"] = "action value cannot be left blank";
                            header("Location: dashboard.php");
                            exit;
                        }
            
                    } else {
                        $_SESSION["warning"] = "action target cannot be left blank.";
                        header("Location: dashboard.php");
                        exit;
                    }
            
                } else {
                    $_SESSION["warning"] = "please choose an action name.";
                    header("Location: dashboard.php");
                    exit;
                }
            } else {
                $_SESSION["warning"] = "please choose a profile.";
                header("Location: dashboard.php");
                exit;
            }
            


        }

        if($_POST["form_type"]=="add_profile"){

            if(!empty($_POST["profile_name"])){

                $profileName = $_POST["profile_name"];

                if(!empty($_POST["profile_email"])){

                    $profileEmail = $_POST["profile_email"];

                    if(!empty($_POST["profile_password"])){

                        $profilePassword = /*password_hash(*/$_POST["profile_password"]/*, PASSWORD_DEFAULT)*/;
                        
                        require_once 'models/profile_model.php';


                        //REGISTER PROFILE
                        
                        $actionArray = [$id=null, $profileName, $profileEmail, $profilePassword, $is_active=FALSE, $last_seen=null];

                        $seq = new profileModel();
                        
                        if($seq->register(...$actionArray)){

                            $_SESSION["alert"] = "profile registered successfully.";
                            header("Location: dashboard.php");
                            exit;

                        } else {
                            
                            $_SESSION["warning"] = "could not add profile.";
                            header("Location: dashboard.php");
                            exit;
                        }
            
                    } else {
                        $_SESSION["warning"] = "profile password cannot be left blank.";
                        header("Location: dashboard.php");
                        exit;
                    }
            
                } else {
                    $_SESSION["warning"] = "profile email cannot be left blank.";
                    header("Location: dashboard.php");
                    exit;
                }
            } else {
                $_SESSION["warning"] = "profile name cannot be left blank.";
                header("Location: dashboard.php");
                exit;
            }
        }

        if($_POST["form_type"]=="get_profiles"){

            setcookie("form_type", $_POST["form_type"]);

            require_once 'models/profile_model.php';
            $model = new profileModel();
            $result = $model->getAll();

            if(is_array($result) and count($result)){

                
                $result = json_encode($result);
                $_SESSION["json_result"] = $result;
                header("Location: dashboard.php");
                exit;
                
                

            } else if(is_array($result) and !count($result)){

                $_SESSION["warning"] = "result is empty.";
                header("Location: dashboard.php");
                exit;

            } else {

                $_SESSION["warning"] = "could not retrieve profiles.";
                header("Location: dashboard.php");
                exit;

            }

        }

        if($_POST["form_type"]=="get_actions"){

            setcookie("form_type", $_POST["form_type"]);

            require_once 'models/action_model.php';
            $model = new actionModel();
            $result = $model->getAll();

            if(is_array($result) and count($result)){

                
                $result = json_encode($result);
                $_SESSION["json_result"] = $result;
                header("Location: dashboard.php");
                exit;
                
                

            } else if(is_array($result) and !count($result)){

                $_SESSION["warning"] = "result is empty.";
                header("Location: dashboard.php");
                exit;

            } else {

                $_SESSION["warning"] = "could not retrieve actions.";
                header("Location: dashboard.php");
                exit;

            }
        }
    }
?>

