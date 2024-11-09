<?php

    function dbConnect($hostname, $username, $password, $database){
        return mysqli_connect($hostname, $username, $password, $database);
    }

    function dbClose($seq){
        mysqli_close($seq);
    }
    
?>