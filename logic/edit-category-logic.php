<?php 
    require('../config/database.php');
    $name = filter_var($_POST['category-name'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $color = filter_var($_POST['color'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $logo=filter_var($_POST['select-logo'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $categoryType=filter_var($_POST['category-type'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $categoryId=filter_var($_POST['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
        if(!$name){
            $_SESSION['edit-category-err']="enter the category name";
        }else if(!$color){
            $color="#3CB548";
        }else if(!$logo){
            $logo='travel.svg';
        }else{
            $query = "UPDATE `categories` SET `name` = '$name', `color` = '$color',`logo` = '$logo' WHERE `category-id` = $categoryId";
            $addCategory = mysqli_query($connection,$query);
            if(!mysqli_errno($connection)){
                header('location: '.ROOT_URL.'index.php?status=category');
                
            }else{
                echo("error in the sql");
            }
        }

        if(isset($_SESSION['edit-category-err'])){
            $_SESSION['categoryData']=$_POST;
            header('location: '.ROOT_URL.'edit-category.php');
            
            die();
        }
?>