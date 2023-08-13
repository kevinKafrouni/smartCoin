<?php 
    require('partials/header.php');
    $fname = $_SESSION['signup-data']['fname'] ?? null;
    $lname = $_SESSION['signup-data']['lname'] ?? null;
    $username = $_SESSION['signup-data']['username'] ?? null;
    $email = $_SESSION['signup-data']['email'] ?? null;
    $password = $_SESSION['signup-data']['password'] ?? null;
    $checkpassword = $_SESSION['signup-data']['checkpassword'] ?? null;
    
?>
<div class="phone-screen"> 
    <h2 style="text-align: center;">Create an account</h2>
    <?php if(isset($_SESSION['signup-err'])) : ?>
        <div class="alert-message error">
            <p><?=$_SESSION['signup-err'];
            unset($_SESSION['signup-err']);?></p>
        </div>
        <?php endif;?>

    <form action="logic/sign-up-logic.php" method="POST">
        <label for="fname">First Name</label><input type="text" name="fname" id="fname" value="<?=$fname?>">
        <label for="lname">Last Name</label><input type="text" name="lname" id="lname" value="<?=$lname?>">
        <label for="username">Username</label><input type="text" name="username" id="username" value="<?=$username?>">
        <label for="email">Email</label><input type="mail" name="email" id="email" value="<?=$email?>">
        <label for="password">Password</label><input type="password" name="password" id="password" value="<?=$password?>">
        <label for="checkpassword">Verify Password</label><input type="password" name="checkpassword" id="checkpassword" value="<?=$checkpassword?>">
        <button type="submit" name="submit">Create</button>
        
    </form>
    <div>
        <p class="form-end">Already Have an account ? <span><a href="login.php">Login</a></span></p>
    </div>
    </div>
</body>
</html>