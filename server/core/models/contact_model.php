<?php

    $workingDirectory = getcwd();
    $dirName = dirname(__FILE__);
    require_once $dirName.'/base_model.php';

    class contactModel extends baseModel{

        public function __construct(){
            parent::__construct();
        }
        public function submit(
            $name="name",	
            $email="email@email.com",
            $mobile="0910953021",
            $message="hello world",
            $debug=FALSE
        ){

            require_once getcwd().'/core/functions/submit_contactform.php';

            // $to = "info@isterlab.com";
            // $subject = "رسالة من الموقع";
            // $message = "hello world";
            // $headers = "From: info@isterlab.com";

            // if (mail($to, $subject, $message, $headers)) {
            //     // echo "Email sent successfully!";
            // } else {
            //     // echo "Email sending failed.";
            // }

            if($sqlparam = prepareContactFormQuery(
                $name, 
                $email, 
                $mobile, 
                $message)){

                $sql = $sqlparam[0];
                $params = $sqlparam[1];

                if($this->stmt = $this->db->prepare($sql)){

                    if($this->stmt->execute($params)){
                        $result = array("SUCCESS"=>"client registered");
                        return $result;
                    }
                }
            }
        }
    }

?>