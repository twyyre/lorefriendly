<?php

    //PROFILES TABLE
    $createProfilesTableSQL = "CREATE TABLE `profiles` (

        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR NOT NULL,
        last_name VARCHAR NOT NULL,
        email VARCHAR,
        password VARCHAR NOT NULL,
        mobile VARCHAR,
        pfp VARCHAR,
        bg VARCHAR,
        description VARCHAR,
        birth_date INT


    )";

    //USERS TABLE
    $createUsersTableSQL = "CREATE TABLE `users` (

        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR NOT NULL,
        last_name VARCHAR NOT NULL,
        email VARCHAR,
        password VARCHAR NOT NULL,
        mobile VARCHAR,
        pfp VARCHAR,
        bg VARCHAR,
        description VARCHAR,
        birth_date INT
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP



    )";

    //ACTIONS TABLE
    $createActionsTableSQL = "CREATE TABLE `actions` (

        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR NOT NULL,
        target VARCHAR NOT NULL,
        value VARCHAR,
        chance VARCHAR NOT NULL,
    
    )";

    //POST POOL TABLE
    $createPostPoolTableSQL = "CREATE TABLE `pool_posts` (

        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR NOT NULL,
        source VARCHAR NOT NULL,
        content VARCHAR,
        user VARCHAR,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

    )";

    //COMMENT POOL TABLE
    $createCommentPoolTableSQL = "CREATE TABLE `pool_comments` (

        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR NOT NULL,
        source VARCHAR NOT NULL,
        content VARCHAR,
        user VARCHAR,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP


    )";

    //MESSAGE POOL TABLE
    $createMessagePoolTableSQL = "CREATE TABLE `pool_messages` (

        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR NOT NULL,
        source VARCHAR NOT NULL,
        content VARCHAR,
        user VARCHAR,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP


    )";

    //USERNAME POOL TABLE
    $createUsernamePoolTableSQL = "CREATE TABLE `pool_usernames` (

        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR NOT NULL,
        source VARCHAR NOT NULL,
        content VARCHAR,
        user VARCHAR,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP


    )";

    //ACTIVITY TABLE
    $createActivityTableSQL = "CREATE TABLE `activity` (

        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        bot_id VARCHAR NOT NULL,
        action VARCHAR NOT NULL,
        target VARCHAR,
        value VARCHAR NOT NULL,
        chance VARCHAR,
        state VARCHAR,
        exec_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP


    )";



    

?>