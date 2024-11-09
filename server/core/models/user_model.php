<?php

    $workingDirectory = getcwd();
    $dirName = dirname(__FILE__);
    require_once 'models/base_model.php';

    class userModel extends baseModel{
        
        public function show_result($result=null){

            if(!empty($result)){
                
                echo json_encode($result);
            } else {
                
                $result = array("ERROR"=>strtolower("result is empty"));
                echo json_encode($result);
            };

            exit;
            
        }

        public function get(...$args){

            require_once 'get_user.php';
            
            $result = getUser($this->db,...$args);
            
            $this->show_result($result);

            exit;
            
        }

        public function update(...$args){

            require_once 'update_user.php';

            if(updateUser($this->db, ...$args)){

                $result = array("SUCCESS"=>"user updated");

                $this->show_result($result);
            }

            exit;

        }

        public function register($uid="noValue", $name="noValue", $password="noValue", $is_admin="noValue", $bank="noValue", $bio="noValue", $cover="noValue", $email="noValue", $pfp="noValue", $mobile="noValue", $token="noValue"){

            require_once 'register_user.php';

            if(registerUser($this->db, $uid, $name, $password, $is_admin, $bank, $bio, $cover, $email, $pfp, $mobile, $token)){

                $result = array("SUCCESS"=>"user registered");
                    
                $this->show_result($result);
            }

            exit;

        }

        public function get_groups($id){//id of user

            require_once 'get_user_groups.php';

            $result = getuserGroups($this->db, $id);

            echo json_encode($result);

            exit;
            
        }

        public function get_tasks($id){//id of user

            require_once 'get_user_groups.php';
            require_once 'get_user_tasks.php';

            $result = getuserTasks($this->db, $id);

            echo json_encode($result);

            exit;
            
        }

    }

?>