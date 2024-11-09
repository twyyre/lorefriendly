<?php

class API{
    
    public function getUrl(){
                
        if(isset($_SERVER['REQUEST_URI'])){

            //GET URI SEGMENTS
            $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            //Breaking url into array
            $uri = explode( '/', $uri );

            //Allows you to filter variables as strings/numbers
            // $url = filter_var($url, FILTER_SANITIZE_URL);
        
            parse_str($_SERVER["QUERY_STRING"], $params);

            return array($uri, $params);

        } else{

            return FALSE;
        }
    }

}

?>