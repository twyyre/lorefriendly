<?php

    $dirName = dirname(__FILE__);

    require_once 'models/base_model.php';

    class actionModel extends baseModel{

        public function get(...$args){

            require_once 'get_action.php';
            
            $result = getAction($this->db,...$args);
            
            $this->show_result($result);

            exit;
            
        }

        public function update(...$args){

            require_once 'update_action.php';

            if(updateProfile($this->db, ...$args)){

                $result = array("SUCCESS"=>"profile updated");

                $this->show_result($result);
            }

            exit;

        }

        public function register(...$params){

            require_once 'register_action.php';

            if(registerAction($this->db, ...$params)){

                $result = array("SUCCESS"=>"action registered");
                    
                $this->show_result($result);
                // return TRUE;

            } else {
                // echo "could not add action. 321";
                // header("Location: dashboard.php");
                // return FALSE;
                exit;
            }

            exit;

        }

        public function registerAll(...$params){ //registers an action for all profiles
            
            //NEEDS RE-WRITING

            require_once 'func_send_query.php';
            require_once 'register_action.php';
            

            //get number of profiles
            $seq = $this->db;
            $sql = "SELECT * FROM profiles";
            

            if($result = sendQuery($seq, $sql)){
                $profileCount =  count($result);
            }

            else {
                return array("ERROR"=>mysqli_error($seq));

            }

            //register action for each account

            for($i=1; $i<$profileCount; $i++){

                $profile_id = $i;

                if(registerAction($this->db, null, $profile_id, ...$params)){

                    $result = array("SUCCESS"=>"action registered for all profiles");
                        
                    // return TRUE;
    
                } else {
                    $result = array("ERROR"=>"could not add action");
                    // header("Location: dashboard.php");
                    // return FALSE;
                    exit;
                }

            }

            
            $this->show_result($result);
            exit;

        }

        public function getProfileActions($profile_id){
            
            //get the actions of a certain profile
            $seq = $this->db;
            $sql = "SELECT * FROM actions where profile_id=?";
            // echo "<br>profile_id: $profile_id";

            
            if($stmt = mysqli_prepare($seq, $sql)){
                // echo "<br>statement prepared";

                if(mysqli_stmt_bind_param($stmt, "i", $profile_id)){
                    // echo "<br>arguments bound";


                    if($result = mysqli_stmt_execute($stmt)){
                        // echo "<br>statement executed";


                        if($rows = mysqli_stmt_get_result($stmt)->fetch_all(MYSQLI_ASSOC)){

                            // echo "<br>result received";
                            if(count($rows)){
                                $result = $rows;
                            } else {
                                return array("ERROR"=>"No results");
                            }
                            
                        } else {
                            return array("ERROR"=>mysqli_error($seq));
                        }
                    } else {
        
                        return array("ERROR"=>mysqli_error($seq));

                    }
                } else {
    
                    return array("ERROR"=>mysqli_error($seq));

                }
            } else {

                return array("ERROR"=>mysqli_error($seq));

            }

            $sql = "DELETE FROM actions WHERE profile_id=?";
            $seq = $this->db;
            
            if($stmt = mysqli_prepare($seq, $sql)){

                // echo "<br>DELETE statement prepared";


                if(mysqli_stmt_bind_param($stmt, "i", $profile_id)){

                    // echo "<br>DELETE arguments bound";


                    if($state = mysqli_stmt_execute($stmt)){
                        // echo "<br>DELETE statement executed";

                        return $result;
                    } else {
        
                        return array("ERROR"=>mysqli_error($seq));

                    }
                } else {
    
                    return array("ERROR"=>mysqli_error($seq));

                }
            } else {

                return array("ERROR"=>mysqli_error($seq));

            }

            return $result;
        }
        
        public function getAll(){
            
            //get all actions
            $seq = $this->db;
            $sql = "SELECT * FROM actions";
            
            require_once 'func_send_query.php';

            if($result = sendQuery($seq, $sql)){
                return $result;
            }

            else {
                return array("ERROR"=>mysqli_error($seq));

            }
        }

        public function deleteAction(){
            //
        }

        public function deleteAll(){
            //
        }

        // public function get_groups($id){//id of user

        //     require_once 'get_user_groups.php';

        //     $result = getuserGroups($this->db, $id);

            // echo json_encode($result);

        //     exit;
            
        // }

        // public function get_tasks($id){//id of user

        //     require_once 'get_user_groups.php';
        //     require_once 'get_user_tasks.php';

        //     $result = getuserTasks($this->db, $id);

            // echo json_encode($result);

        //     exit;
            
        // }
    }

    

?>