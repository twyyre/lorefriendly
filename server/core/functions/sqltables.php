<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);



    //USERS TABLE
    $table_name = "users";

    $users_sql = "CREATE TABLE `$table_name` (

        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        uid  VARCHAR(160) NOT NULL,
        name VARCHAR(160) NOT NULL,
        password VARCHAR(160) NOT NULL,
        is_admin VARCHAR(160) NOT NULL,
        bio VARCHAR(160) NOT NULL,
        cover VARCHAR(160) NOT NULL,
        email VARCHAR(160) NOT NULL,
        pfp VARCHAR(160) NOT NULL,
        mobile VARCHAR(160) NOT NULL,
        token VARCHAR(160) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

    )";

    //PROFILES TABLE
    $table_name = "profiles";

    $profiles_sql = "CREATE TABLE `$table_name` (

        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(160),
        email  VARCHAR(160) NOT NULL,
        password VARCHAR(160) NOT NULL,
        is_active VARCHAR(160) NOT NULL,
        last_seen TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    
    )";

        
    //POSTS TABLE
    $table_name = "posts";

    $posts_sql = "CREATE TABLE `$table_name` (

        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        post_content VARCHAR(160) NOT NULL,
        post_category VARCHAR(160) NOT NULL,
        post_type VARCHAR(160) NOT NULL,
        add_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    
    )";

    //COMMENTS TABLE
    $table_name = "comments";

    $comments_sql = "CREATE TABLE `$table_name` (

        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        comment_content  VARCHAR(160) NOT NULL,
        comment_category VARCHAR(160) NOT NULL,
        comment_type VARCHAR(160) NOT NULL,
        add_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

    )";

    //Actions TABLE
    $table_name = "actions";

    $actions_sql = "CREATE TABLE `$table_name` (

        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        profile_id  INT UNSIGNED REFERENCES profiles(id),
        act_name  VARCHAR(30) NOT NULL,
        act_target  VARCHAR(160) NOT NULL,
        act_value  VARCHAR(160) NOT NULL,
        act_chance  VARCHAR(160) NOT NULL,
        is_complete INT(1) NOT NULL,
        submitted TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    
    )";


    //TOKENS TABLE
    $table_name = "tokens";

    $chat_sql = "CREATE TABLE `$table_name` (

        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        token  VARCHAR(160) NOT NULL,
        user_id VARCHAR(160) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

    )";



    
    require_once 'models/db_model.php';


    $dbModel = new dbModel();

    
    if($result = $dbModel->query($users_sql)){
        echo "<p>users table created successfully.</p>";
    } else {
        echo "<p>failed to create users table.</p>";
    }
 

    if($result = $dbModel->query($profiles_sql)){
        echo "<p>profiles table created successfully.</p>";
    } else {
        echo "<p>failed to create profiles table.</p>";
    }

    if($result = $dbModel->query($actions_sql)){
        echo "<p>actions table created successfully.</p>";
    }else {
        echo "<p>failed to create actions table.</p>";
    }

    if($result = $dbModel->query($posts_sql)){
        echo "<p>posts table created successfully.</p>";
    }else {
        echo "<p>failed to create posts table.</p>";
    }

    if($result = $dbModel->query($comments_sql)){
        echo "<p>comments table created successfully.</p>";
    }else {
        echo "<p>failed to create comments table.</p>";
    }

?>