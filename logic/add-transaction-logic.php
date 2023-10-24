<?php 
    require('../config/database.php');
    $categoryId=filter_var($_POST['categoryId'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $trdate = $_POST['trdate'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $accountid = $_SESSION['account-id'];
        if(!$trdate){
            $_SESSION['transaction-err']="enter the transaction date";
        }else if(!$amount || $amount==0){
            $_SESSION['transaction-err']="enter the amount";
        
        }else{
            if(!$description){
                $description='';
            }
            $query = "INSERT INTO `transactions` (`category-id`,`account-id`,`amount`,`date`,`description`) VALUES ('$categoryId','$accountid','$amount','$trdate','$description')";
            echo("error in the query");
            $addtransaction = mysqli_query($connection,$query);
            echo("error in the connection");
            if(!mysqli_errno($connection)){
                header('location: '.ROOT_URL.'index.php');
                
                
            }else{
                echo("error in the sql");
            }
        }

        if(isset($_SESSION['transaction-err'])){
            $_SESSION['transactionData']=$_POST;
            header('location: '.ROOT_URL.'transaction-step2.php');
            die();
        }


        //this is for oriana
?>