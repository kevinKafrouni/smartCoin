<?php 
    require('../config/database.php');
    $categoryId=filter_var($_POST['categoryId'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $trdate = $_POST['trdate'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $accountid = $_SESSION['account-id'];
    $trid = $_POST['trid'];
        if(!$trdate){
            $_SESSION['transaction-err']="enter the transaction date";
        }else if(!$amount || $amount==0){
            $_SESSION['transaction-err']="enter the amount";
        
        }else{
            if(!$description){
                $description='';
            }
            $query = "UPDATE `transactions`
            SET
              `category-id` = '$categoryId',
              `account-id` = '$accountid',
              `amount` = '$amount',
              `date` = '$trdate',
              `description` = '$description'
            WHERE
              `transaction-id` = '$trid';
            ";
            $addtransaction = mysqli_query($connection,$query);
            if(!mysqli_errno($connection)){
                header('location: '.ROOT_URL.'transaction-history.php');
                
                
            }else{
                echo("error in the sql");
            }
        }

        if(isset($_SESSION['transaction-err'])){
            $_SESSION['transactionData']=$_POST;
            header('location: '.ROOT_URL.'edit-transaction.php?tri='.$trid);
            die();
        }
?>