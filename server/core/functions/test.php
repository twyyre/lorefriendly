<?php

    //
    require_once 'func_create_table.php';
    require_once 'func_empty_table.php';

    require_once 'func_delete_table.php';
    require_once 'register_user.php';
    require_once 'genpass.php';
    require_once 'func_db_connect.php';
    //post functions
    require_once 'register_profile.php';
    require_once 'register_post.php';
    require_once 'register_task.php';
    require_once 'register_chat.php';
    require_once 'register_message.php';
    //update fucntions
    require_once 'update_user.php';
    require_once 'update_profile.php';
    require_once 'update_message.php';
    require_once 'update_post.php';
    require_once 'update_chat.php';
    require_once 'update_task.php';
    //get functions
    require_once 'get_user.php';
    require_once 'get_task.php';
    require_once 'get_post.php';
    require_once 'get_profile.php';
    require_once 'get_message.php';
    require_once 'get_chat.php';
    require 'add_to_group.php';
    require 'get_group_users.php';
    require 'get_user_tasks.php';

    $dbarray = [$hostname="localhost", $username="id18160771_itameio", $password="1hn\GRU#%1(#|{z1", $database="id18160771_lypybot"];
    
    if($seq = dbConnect(...$dbarray)){

        echo "<br>connected";

        //REGISTER PROFILE
        echo "<hr> REGISTER PROFILE";
        
        $profileArray = [$id="", $name=generateSalt(), $email=generateSalt(), $password=generateSalt(), $is_active=generateSalt(), $last_seen=20211224];
        
        if(registerProfile($seq, ...$profileArray)){
            echo "<br>registered";
        } else {
            echo "<br>unable to register";
        }
    } else {
        echo "<br>unable to connect.";
    }

            
    

    // echo "<hr> REGISTER POST";

    // exit; 
    // //REGISTER POST
    // $postArray = [$id="", $uid=generateSalt(), $publicdate=time(), $userimage="default.pfp", $username=generateSalt(), $postimage="default.pfp", $content="this is the post's text content"];

    // registerPost($seq, ...$postArray);

    // echo "<hr> REGISTER TASK";

    // //REGISTER TASK
    // $taskArray = [$id="", $uid=generateSalt(), $uid_admin=generateSalt(), $admin_name=generateSalt(), $admin_image=generateSalt(), $publish_date=time(), $is_deleted=FALSE, $is_complete=FALSE, $is_selected=TRUE, $uid_group=generateSalt(), $group_name=generateSalt(), $post_image="default.php", $task_title="task title", $task_desc="this is a task description."];

    // registerTask($seq, ...$taskArray);

    // echo "<hr> REGISTER CHAT";

    // //REGISTER CHAT
    // $chatArray = [$id="", $username=generateSalt(), $content=generateSalt()];

    // registerChat($seq, ...$chatArray);

    // echo "<hr> REGISTER MESSAGE";

    // //REGISTER MESSAGE
    // $messagesArray = [$id="", $username=generateSalt(), $content=generateSalt()];

    // registerMessage($seq, ...$messagesArray);

 
    // //GET CHAT
    // echo "<hr> GET CHAT <br>";
    // getChat($seq, id: 1);
    
    // //GET MESSAGE
    // echo "<hr> GET MESSAGE <br>";
    // getmessage($seq, id: 1);
    
    // //GET PROFILE
    // echo "<hr> GET PROFILE <br>";
    // getProfile($seq, id: 1);
    
    // //GET POST
    // echo "<hr> GET POST <br>";
    // getPost($seq, id: 1);
    
    // //GET TASK
    // echo "<hr> GET TASK <br>";
    // getTask($seq, id: 1);
    
    // //GET USER
    // echo "<hr> GET USER <br>";
    // getUser($seq, name: "itameio");


    // //UPDATE USER
    // echo "<hr> UPDATE USER";
    // updateUser($seq, id:1, name:"lol");

    // //UPDATE PROFILE
    // echo "<hr> UPDATE PROFILE";
    // updateProfile($seq, id:1, name:"updatedProfile", members: 9);

    // //UPDATE MESSAGE
    // echo "<hr> UPDATE MESSAGE";
    // updateMessage($seq, id:1, username:"updatedMessage");

    // //UPDATE POST
    // echo "<hr> UPDATE POST";
    // updatePost($seq, id:1, username: "updatedPost");

    // //UPDATE CHAT 
    // echo "<hr> UPDATE CHAT";
    // updateChat($seq, id:1, username: "updatedChat");

    // //UPDATE TASK
    // echo "<hr> UPDATE TASK";
    // $arr = array("username"=>"itameio");
    // $arr = json_encode($arr);
    // $arr = json_decode($arr, TRUE);
    // $arr["secondusername"] = "killasd";
    // $arr["ONE"] = "1";
    // $arr["TWO"] = "2";
    // $arr["THREE"] = "3";
    // $arr["FOUR"] = "4";

    // $arr = json_encode($arr);

    // updateTask($seq, id:1, admin_name: $arr);


    dbClose($seq);

?>