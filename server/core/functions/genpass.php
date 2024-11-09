<?php

    function generateSalt() {

        $alphabet = " !\"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\\]^_`abcdefghijklmnopqrstuvwxyz";
        $alphabet = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";


        $salt = array(); //remember to declare $pass as an array

        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache

        for ($i = 0; $i < 15 ; $i++) {
            $n = rand(0, $alphaLength);
            $salt[] = $alphabet[$n];
        }

        return implode($salt); //turn the array into a string
    }

    // function injectSalt($salt, $password){


    //     //assign array size equal to length of password and salt
    //     $length = strlen($salt) + strlen($password);
    //     $final = array();

    //     for($i=0; $i<$length; $i++){
    //         $final[$i] = -1;
    //     }

    //     echo "<hr><br>password + salt count: " . strlen($password) + strlen($salt) . "<br>";

    //     echo "<br>final count: " . count($final) . "<br />";

    //     //assign password characters to array slots then shuffle
    //     for($i=0; $i<strlen($password); $i++){$final[$i] = $password[$i];}
    //     //shuffle($final);

    //     echo "<br>password: " . $password . "<br />";

    //     echo "<br>final password: " . implode($final) . "<br />";

    //     //get null slots to push salt to
    //     $null_slots = array();

    //     for($i=0; $i<count($final); $i++){
    //         if($final[$i]==-1){
    //             array_push($null_slots, $i);
    //         }
    //     }

    //     echo "null slots (" . count($null_slots) . "): " . implode($null_slots);

    //     //push salt characters to null slots
    //     for($i=0; $i<strlen($salt); $i++){
    //         $index = rand(0, count($null_slots)-1);
    //         $final[$null_slots[$index]] = $salt[$i];
    //     }

    //     echo "<br>final after salt is added (" . count($final) . "): " . implode($final);

    //     for($i=0; $i<strlen($password); $i++){
    //         echo $password[$i];
    //     }

    //     echo "<hr><br>final count: " . count($final) . "<br>";
    //     for($i=0; $i<count($final)-1; $i++){
    //         echo $final[$i];
    //     }

    //     echo "<hr>";
        
    //     //echo "<br>FINAL: " . count($final);

    //     $salt_pos_list = $null_slots;

    //     // for($i=0;$i<strlen($salt);$i++){

    //     //     $salt_pos = random_int(0, strlen($salt));
    //     //     $char = substr($salt, $salt_pos);

    //     //     $pass_pos = random_int(0, strlen($password));

    //     //     $password  = substr_replace($password, $char, $pass_pos, 0);

    //     //     array_push($salt_pos_list, $pass_pos); //save salt character position to an array so it can be sanitized later

    //     // }
       
    //     return array(implode($final), $salt_pos_list);
    // }

    // function sanitzeSalt($salt_pos_list, $password){

    //     for($i=0; $i<count($salt_pos_list); $i++){

    //         $salt_char = $password[$salt_pos_list[$i]];
    //         $salt_char_pos = strpos($password, $salt_char);
    //         $password = substr_replace($password, "", $salt_char_pos, 0);

    //         //echo "<br> removed: $salt_char";

    //     }

    //     return $password;
    // }

    // $password = "IAMTHEBONEOFMYSWORD";

    // echo "<br>pure: " . $password;
    
    // $salt = generateSalt();

    // list($password, $salt_pos_list) = injectSalt($salt, $password);

    // echo "<br>salty: " . $password;
    // echo "<br>salt (" . strlen($salt). "): " . $salt;
    // //echo "<br> char:". $password[$salt_pos_list[0]];

    // $password = sanitzeSalt($salt_pos_list, $password);
    
    // echo "<br>sanitized: <span style='background:yellow;'>" . $password . "</span><br>";

    
    // echo "<hr>";
    // echo $salt_pos_list;

?>
