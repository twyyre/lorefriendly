<?php
    
    $dirName = dirname(__FILE__);
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $ip = $_SERVER['REMOTE_ADDR'];
    $rateLimit = 1; // Maximum requests per minute

    // Check if the IP has exceeded the rate limit
    if (isset($_SESSION['last_request_time'][$ip]) && (time() - $_SESSION['last_request_time'][$ip] < 60)) {
        $requestCount = isset($_SESSION['request_count'][$ip]) ? $_SESSION['request_count'][$ip] + 1 : 1;
        $_SESSION['request_count'][$ip] = $requestCount;

        if ($requestCount > $rateLimit) {
            // Handle rate limit exceeded
            die('Too many requests. Please try again later.');
        }
    } else {
        $_SESSION['last_request_time'][$ip] = time();
        $_SESSION['request_count'][$ip] = 1;
    }

    require_once getcwd().'/core/models/api_model.php';

    $api = new API();
    
    //GET URI SEGMENTS
    $url = $api->getUrl();

    $uri = $url[0];
    $params = $url[1];

    if(!empty($uri[3])){

        $modelName = strtolower($uri[3]);

        if(!empty($uri[4])){ 

            $methodName = strtolower($uri[4 ]);

            require_once $dirName."\core\models\\" . strtolower($modelName) . "_model.php";
            
            $modelName .= "Model";
            $model = new $modelName();
            
            if(!empty($_SERVER["QUERY_STRING"])){
                parse_str($_SERVER["QUERY_STRING"], $params);
                
 
                //change array to indexed array to be unpacked
                // echo "<hr>";
                // print_r($params); 
                // echo $params["profileId"];
                // echo "<hr>";

                // exit();
            } else {
                $params = [];
                $result = null;
            }

            $result = $model->{$methodName}(...$params);
            echo json_encode($result);
        } else {

            $result = array("ERROR"=>strtolower("METHOD NAME is missing."));
            echo json_encode($result);
        }
    } else {
        
        $result = array("ERROR"=>strtolower("MODEL NAME is missing."));
        echo json_encode($result);
    }
?>