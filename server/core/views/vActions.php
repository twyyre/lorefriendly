<head>
    <?php require_once '../components/css.php';?>
</head>

<?php require_once '../components/header.php';?>


<h1>actions view</h1>

<div class="navbar no-bg">

    <div class="nav-item">
        <a class="nav-link" onclick="toggleAddAction()">Add New Action</a>
    </div>

    <div class="nav-item">
        <a class="nav-link" onclick="toggleAddAction()">View Actions</a>
    </div>
</div>

<div >
    <form action="backend.php" method="post" id="get_actions">
    <input hidden name="form_type" value="get_actions">
    <input type="submit" class=""  value="View Actions" onclick="toggleViewActions()"/>
    </form>
</div>

<form hidden class="main-form slim" id="add_action" action="backend.php" method="post">

        <h3>Actions</h3>
        <p>you can add actions for the bots to execute from here.</p>

        <div class="">
        <label for="action_profile">Choose a Profile:</label>
        <select name="action_profile" class="form-select form-select-sm" id="action_profile" aria-label="Default select example">
            <option value="ALL" selected>ALL</option>
        
            <?php
            
                if(!empty($profileNames)){
                    foreach($profileNames as $row){
                        echo '<option value="'.$row["id"].'">'.$row["name"]/*.'('.$row["email"].')'*/.'</option>';
                    }
                }

            ?>
            
            
        </select>
        </div>
        
        <div class="form-group">
        <label for="action_name">Action</label>
        <select class="form-control" name="action_name" id="action_name">
            <option value="post quote">post quote</option>
            <option value="send message">send message</option>
            <option value="send friend request">send friend request</option>
            <option value="add suggested user">add suggested user</option>
            <option value="react to post">react to post</option>
            <option value="react to comment">react to comment</option>
            <option value="comment on post">comment on post</option>
            <option value="share to profile">share to profile</option>
            <option value="share to group">share to group</option>
        </select>
        </div>
        
        <div class="form-group">
        <label for="action_target">Action Target</label>
        <input class="form-control" name="action_target" id="action_target"/>
        </div>
        <div class="form-group">
        <label for="action_value">Action Value</label>
        <input class="form-control" name="action_value" id="action_value" />
        </div>
        <div class="form-group">
        <label for="action_chance">Action Chance <span id="chanceView"></span></label>
        <input class="form-control form-range bg-dark" style="border: none; padding: 5px; margin-right: 10px; margin-left: 10px;" name="action_chance" id="action_chance" type="range" min="0" max="100" value="100"/>
        </div>

        <input hidden name="form_type" value="add_action">
        
        <input class="main-btn btn btn-dark" type="submit">
        
    </form>