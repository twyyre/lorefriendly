<?php

    $workingDirectory = getcwd();
    $dirName = dirname(__FILE__);

    require_once $dirName.'/db_model.php';

    define("MODEL_NAME", "Profile");

    class baseModel extends dbModel {
        
        public function __construct(){
            
            parent::__construct();
            
        }
        
        public function show_result($result=null){

            if(!empty($result)){
                
                echo json_encode($result);

            } else { 
                $result = array("ERROR"=>strtolower("result is empty"));
            };

        }

        // public function get(...$args){//id of group

        //     require_once strtolower('get_'.MODEL_NAME.'.php');
            
        //     $get = "get".MODEL_NAME;

        //     $result = $get($this->db, ...$args);
            
        //     $this->show_result($result);

            
            
        // }

        // public function update(...$args){

        //     require_once strtolower('update_'.MODEL_NAME.'.php');

        //     $update = "update".MODEL_NAME;

        //     if($update($this->db, ...$args)){

        //         $result = array("SUCCESS"=>"chat updated");
        //     }
            
        //     $this->show_result($result);

            

        // }

        // public function register(){

        //     require_once strtolower('register_'.MODEL_NAME.'.php');

        //     $register = "register".MODEL_NAME;

        //     if($register($this->db)){

        //         $result = array("SUCCESS"=>"chat registered");
                
        //     } else {
                
        //         $result = array("ERROR"=>strtolower("chat name is taken"));
        //     }

        //     $this->show_result($result);

            

        // }

        

    }

?>