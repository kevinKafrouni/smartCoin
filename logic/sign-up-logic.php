<?php
    require('../config/database.php');
    if(isset($_POST['submit'])){
        $fname = filter_var($_POST['fname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lname = filter_var($_POST['lname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
        $password = filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $checkpassword = filter_var($_POST['checkpassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if(!$fname){
            $_SESSION['signup-err'] = "Enter your first name";
        }else if(!$lname){
            $_SESSION['signup-err'] = "Enter your last name";
        }else if(!$username){
            $_SESSION['signup-err'] = "Enter a username";
        }else if(!$email){
            $_SESSION['signup-err'] = "Enter an email";
        }else if(!$password){
            $_SESSION['signup-err'] ="Enter the password";
            
        }else if(strlen($password)<8){
            $_SESSION['signup-err'] ="Password should be at least 8 characters";
        }else if($password!=$checkpassword){
            $_SESSION['signup-err'] ="Passwords doesn't match";
        }else{
            echo"passed tests";
            $query = "SELECT * FROM users WHERE username='$username'";
            $users_data = mysqli_query($connection,$query);
            if(mysqli_num_rows($users_data)>0){
                $_SESSION['signup-err'] ="Username already exists";
            }
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);
            }
            if(isset($_SESSION['signup-err'])){
                $_SESSION['signup-data'] = $_POST;
                header('location: '.ROOT_URL.'sign-up.php');
                die();
            }else{
                $insert_user_query = "INSERT INTO users SET firstname = '$fname', lastname='$fname', username='$username',email='$email' , password='$hashed_password'";
                $insert_user = mysqli_query($connection,$insert_user_query);
                if(!mysqli_errno($connection)){
                    header('location: ' . ROOT_URL . 'login.php');
                   $_SESSION['signup-success'] = "Registration successful. Please login" ;
                   die();
                   
                }
            }
        }else{
        header('location: '.ROOT_URL.'login.php');
    }

?>