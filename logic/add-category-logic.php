<?php 
    require('../config/database.php');
    $name = filter_var($_POST['category-name'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $color = filter_var($_POST['color'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $logo=filter_var($_POST['select-logo'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $categoryType=filter_var($_POST['category-type'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if(isset($_POST['submit'])){
        if(!$name){
            $_SESSION['add-category-err']="enter the category name";
        }else if(!$color){
            $color="#3CB548";
        }else if(!$logo){
            $logo='travel.svg';
        }else{
            $query = "INSERT INTO categories SET name='$name',type='$categoryType',logo='$logo',color='$color',description=''";
            $addCategory = mysqli_query($connection,$query);
            if(!mysqli_errno($connection)){
                header('location: '.ROOT_URL.'index.php');
            }
        }

        if(isset($_SESSION['add-category-err'])){
            header('location: '.ROOT_URL.'index.php');
            die();
        }

    }else{
        header('location: '.ROOT_URL.'index.php');
        die();
    }
?>