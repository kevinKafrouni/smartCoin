<?php
    require('../config/database.php');
    
    if(isset($_POST['submit'])){
        
        $username = filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        echo" ".$username;

        if(!$username){
            $_SESSION['login-err'] = "Enter a username";
        }else if(!$password){
            $_SESSION['login-err'] ="Enter the password";
        }else{
            $query = "SELECT * FROM users WHERE username = '$username'";
            $user_data = mysqli_query($connection,$query);
            if(mysqli_num_rows($user_data)==1){
                $user = mysqli_fetch_assoc($user_data);
                $db_password= $user['password'];
                if(password_verify($password,$db_password)){
                    $_SESSION['user-id']= $user['user-id'];
                    header('location: '.ROOT_URL);
                    die();
                }else{
                    $_SESSION['login-err'] = "Invalid Password";
                }
            }else{
                $_SESSION['login-err'] ="Invalid username";
            }
            if(isset($_SESSION['login-err'])){
                $_SESSION['login-data']=$_POST;
                header('location: '.ROOT_URL.'login.php');
                die();
            }
        }
    }else{
        header('location: '.ROOT_URL.'login.php');
        die();
    }

?>