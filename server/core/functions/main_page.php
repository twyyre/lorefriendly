<?php

    session_start();

    if($_SESSION["logged_in"]==TRUE or $_COOKIE["logged_in"]){

        echo "Welcome!";

        echo '<br><a href="logout.php" >sign out</a>';

    } else {

        header("Location: login_form.php");

    }
    

?>
