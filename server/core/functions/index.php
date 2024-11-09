<?php

    require_once 'models/db_model.php';
    
    require_once 'func_db_connect.php';

    $seq = new dbModel();

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $uri = explode("/", $_SERVER["REQUEST_URI"]);

        if(!empty($uri[2])){//model name

            if(!empty($uri[3])){//method name

                if(is_readable($modelFile = 'models/'.$uri[2].'_model.php')){
                    require_once $modelFile;
                } else {
                    $result = array("ERROR"=>"no such model");
                    echo json_encode($result);
                    exit;
                }
                

                $modelName = $uri[2]."Model";
                $methodName = strtolower($uri[3]);

                echo "<br>modelName: $modelName";
                
                $model = new $modelName();

                $model->$methodName();

                echo json_encode($model);



            } else {
                $result = array("ERROR"=>"method name is missing");
                echo json_encode($result);
                exit;
            }

        } else {
            $result = array("ERROR"=>"model name is missing");
            echo json_encode($result);
            exit;
        };
    }
    
    

?>