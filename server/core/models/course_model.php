<?php

    $workingDirectory = getcwd();
    $dirName = dirname(__FILE__);
    require_once $dirName.'/base_model.php';

    class courseModel extends baseModel{

        public function __construct(){
            parent::__construct();
        }
        public function enroll(
            $name="name name name",	
            $email="email@email.email",
            $mobile="0910000000",
            $age="-1",
            $course="-1",
            $debug=FALSE
        ){

            require_once getcwd().'/core/functions/submit_registrationform.php';

            // $to = "info@isterlab.com";
            // $subject = "رسالة من الموقع";
            // $message = "hello world";
            // $headers = "From: info@isterlab.com";

            // if (mail($to, $subject, $message, $headers)) {
            //     // echo "Email sent successfully!";
            // } else {
            //     // echo "Email sending failed.";
            // }

            if($sqlparam = prepareRegistrationQuery(
                $name, 
                $email, 
                $mobile, 
                $age,
                $course
                )){

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