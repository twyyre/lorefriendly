<?php 
    include_once 'css.php'; 
    session_start();
?>

<form id="signupForm" name="signupForm" action="signup.php" method="post" enctype="multipart/form-data">
    <h2>Choose your username and password:</h2>

    <label class="title">Username:</label>
    <input name="name" placeholder="enter username" />
    <br>
    <label class="title">Email:</label>
    <input name="email" placeholder="enter email" value='' />
    <br>
    <label class="title">Password:</label>
    <input name="password" placeholder="enter password" />
    <br>
    <label class="title">Mobile number:</label>
    <input name="mobile" placeholder="enter mobile number" />
    <br>
    <input type="submit" value="signup"><span> Already have an account? <a href="login_form.php">Login here</a></span>
    <p id="alrt"><?php if(isset($_SESSION["alrt"])){echo htmlspecialchars($_SESSION["alrt"]);}?></p>
</form>