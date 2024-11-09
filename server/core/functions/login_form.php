<?php 
    include_once 'css.php'; 
    session_start();

?>

<form id="loginForm" name="loginForm" action="login.php" method="post" enctype="multipart/form-data">
    <h2>Enter your username and password to login:</h2>

    <label class="title">Username:</label>
    <input name="name" placeholder="enter username" value='' />
    <br>
    <label class="title">Password:</label>
    <input type="password" name="password" placeholder="enter password" value='' />
    <br>
    <input type="submit" value="login"><p><input name="remember" type="checkbox"><span>Remember me</span></p>
    <p> don't have an account? <a href="Signup_form.php">signup now</a></p>
    <p id="alrt"><?php if(isset($_SESSION["alrt"])){echo htmlspecialchars($_SESSION["alrt"]);}?></p>
</form>
