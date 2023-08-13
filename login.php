<?php 
    require('partials/header.php');

    $username =  $_SESSION['login-data']['username'] ?? null;
    $password =  $_SESSION['login-data']['password'] ?? null;
    
?>
<div class="phone-screen">
    <h2 style="text-align: center;">Login to your account</h2>
    <?php if(isset($_SESSION['signup-success'])) : ?>
        <div class="alert-message success">
            <p><?=$_SESSION['signup-success'];
            unset($_SESSION['signup-success']);?></p>
        </div>
        <?php endif;?>
        <?php if(isset($_SESSION['login-err'])) : ?>
        <div class="alert-message error">
            <p><?=$_SESSION['login-err'];
            unset($_SESSION['login-err']);?></p>
        </div>
        <?php endif;?>
    <form action="logic\login-logic.php" method="post">
        <label for="username">Username</label><input type="text" name="username" id="username" value="<?=$username?>">
        <label for="password">Password</label><input type="password" name="password" id="password" value="<?=$password?>">
        <button type="submit" name="submit">Login</button>
    </form>
    <div>
        <p class="form-end">New user ? <span><a href="sign-up.php">Sign up</a></span></p>
    </div>
        </div>
</body>
</html>