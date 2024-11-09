<?php

    //echo "<h1>Profiles View<h1>";

?>


<head>
    <?php require_once '../components/css.php';?>
</head>

<?php require_once '../components/header.php';?>


<h1>profiles view</h1>

<div class="navbar no-bg">

    <div class="nav-item">
        <a class="nav-link" onclick="toggleAddProfile()">Add Profile</a>
    </div>

    <div class="nav-item">
        <a class="nav-link" onclick="toggleAddProfile()">View Profiles</a>    
    </div>

</div>

<form action="backend.php" method="post" id="get_profiles">
    <input hidden name="form_type" value="get_profiles">
    <input type="submit" class=""  value="View Profiles" onclick="toggleViewProfiles()"/>
</form>