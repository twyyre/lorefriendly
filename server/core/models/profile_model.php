<?php

    $workingDirectory = getcwd();
    $dirName = dirname(__FILE__);
    require_once $dirName.'/base_model.php';

    class profileModel extends baseModel{

        public function __construct(){

            parent::__construct();

        }

        public function get($profileId){ # < I found out that the name of the parameter variable matters here as it will be the one expected from the link

            // echo "<p>get() method called.</p>";

            $sql = "SELECT * FROM profiles WHERE profileId = :id";
            $this->stmt = $this->db->prepare($sql);
            $this->bind("id", strval($profileId));

            $result = $this->execute();

            return $result;
            
        }

        public function getByEmail($profileEmail){ # < I found out that the name of the parameter variable matters here as it will be the one expected from the link

            $sql = "SELECT * FROM profiles WHERE profileEmail = :email";
            $this->stmt = $this->db->prepare($sql);
            $this->bind("email", strval($profileEmail));

            $result = $this->execute();

            return $result;
            
        }

        public function update(...$args){

            require_once getcwd().'/core/functions/update_profile.php';

            if($sqlparam = query_updateProfile(...$args)){

                $sql = $sqlparam[0];
                $params = $sqlparam[1];

                // echo $sql;
                // echo "<hr>";
                // echo "<p>PARAMETERS:</p>";
                // print_r($params);
                // echo "<hr>";

                // echo "<p>query created.</p>";

                if($this->stmt = $this->db->prepare($sql)){

                    // echo "<p>statement prepared.</p>";

                    // echo "<hr>".$sql."<hr>";
                
                    $result = $this->stmt->execute($params);

                    // echo "<hr>";

                    // echo json_encode($result);
                }

                $result = array("SUCCESS"=>"profile updated");

                // echo "<hr>";
                // $this->show_result($result);
                // echo "<hr>";

            }

                return $result;

        }

        public function register(
            $profileName="none",
            $profileEmail="none",
            $profilePassword="none",
            $profileGroup=0,
            $profileLink="none",
            $profileState=0,
            $profileInit=0,
            $profileRegdate=null,
            $profileLastlogin=null,
            $profileClient=1,
            $debug=FALSE
        ){

            
            require_once getcwd().'/core/functions/register_profile.php';

            if($sqlparam = query_registerProfile($profileName, $profileEmail, $profilePassword, $profileGroup, $profileLink, $profileState, $profileInit, $profileRegdate, $profileLastlogin, $profileClient)){

                $sql = $sqlparam[0];
                $params = $sqlparam[1];

                if($this->stmt = $this->db->prepare($sql)){

                    if($this->stmt->execute($params)){
                        $result = array("SUCCESS"=>"profile registered");
                        return $result;
                    }
                }

            }


        }

        public function getAll(){

            
            // echo "<p>getAll() method called.</p>";


            $sql = "SELECT * FROM profiles where profileState = 1";
            $this->query($sql);

            $result = $this->execute();

            return $result;
        }

        public function getActive(){

            
            // echo "<p>getAll() method called.</p>";


            $sql = "SELECT * FROM profiles where profileState = 1";
            $this->query($sql);

            $result = $this->execute();

            return $result;
        }

        public function getPending(){

            
            // echo "<p>getAll() method called.</p>";


            $sql = "SELECT * FROM profiles where profileState = 5";
            $this->query($sql);

            $result = $this->execute();

            return $result;
        }

        public function getDisabled(){

            
            // echo "<p>getAll() method called.</p>";


            $sql = "SELECT * FROM profiles where profileState = 2";
            $this->query($sql);

            $result = $this->execute();

            return $result;
        }

        public function getLocked(){

            
            // echo "<p>getAll() method called.</p>";


            $sql = "SELECT * FROM profiles where profileState = 3";
            $this->query($sql);

            $result = $this->execute();

            return $result;
        }

        public function getRestricted(){

            
            // echo "<p>getAll() method called.</p>";


            $sql = "SELECT * FROM profiles where profileState = 4";
            $this->query($sql);

            $result = $this->execute();

            return $result;
        }

        // public function get_groups($id){//id of user

        //     require_once 'get_user_groups.php';

        //     $result = getuserGroups($this->db, $id);

        //     echo json_encode($result);

        //     exit;
            
        // }

        // public function get_tasks($id){//id of user

        //     require_once 'get_user_groups.php';
        //     require_once 'get_user_tasks.php';

        //     $result = getuserTasks($this->db, $id);

        //     echo json_encode($result);

        //     exit;
            
        // }
    }

?>