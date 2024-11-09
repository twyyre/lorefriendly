<?php



    require_once "func_send_query.php";
    require_once "func_db_connect.php";

    $dbarray = [$hostname="localhost", $username="id18160771_itameio", $password="1hn\GRU#%1(#|{z1", $database="id18160771_lypybot"];
    
    if($seq = dbConnect(...$dbarray)){

        $sql = "SELECT * FROM profiles";
        
        if($profiles = sendQuery($seq, $sql)){

            echo json_encode($profiles);

        } else {

            $result = array("ERROR"=>"no profiles");
            echo json_encode($result);
            exit;

        }

    } else {
        $result = array("ERROR"=>"could not connect to database");
        echo json_encode($result);
        exit;
    }





?>





