<head>
    <?php require_once '../components/css.php';?>
</head>

<?php require_once '../components/header.php';?>

<form hidden class="main-form slim" id="add_profile" action="backend.php" method="post">

    <h3>Profiles</h3>
    <p>you can add profiles for the bots to use here.</p>
    
    <div class="form-group">
    <label for="profile_name">Name</label>
    <input class="form-control" name="profile_name" id="profile_name"/>
    </div>
    <div class="form-group">
    <label for="profile_email">Email/mobile</label>
    <input class="form-control" type="email" name="profile_email" id="profile_email" />
    </div>
    <div class="form-group">
    <label for="profile_password">Password</label>
    <input class="form-control" type="password" name="profile_password" id="profile_password"/>
    </div>

    <input hidden name="form_type" value="add_profile">
    
    <input class="main-btn btn btn-dark" type="submit">
    
</form>