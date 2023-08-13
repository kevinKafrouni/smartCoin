<?php 
    require('partials/header.php');
    if(!isset($_SESSION['user-id'])){
        header('location:'.ROOT_URL.'login.php');
    }
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['color']) && isset($_POST['logo']) && isset($_POST['type'])) {
        $_SESSION['transactiondata'] = $_POST;
    }
    
    if (isset($_SESSION['transactiondata'])) {
        if (isset($_SESSION['transactiondata']['id'])) {
            $id = $_SESSION['transactiondata']['id'];
        } else {
            $id = '';
        }
    
        if (isset($_SESSION['transactiondata']['name'])) {
            $name = $_SESSION['transactiondata']['name'];
        } else {
            $name = '';
        }
    
        if (isset($_SESSION['transactiondata']['color'])) {
            $color = $_SESSION['transactiondata']['color'];
        } else {
            $color = '';
        }
    
        if (isset($_SESSION['transactiondata']['logo'])) {
            $logo = $_SESSION['transactiondata']['logo'];
        } else {
            $logo = '';
        }
    
        if (isset($_SESSION['transactiondata']['type'])) {
            $type = $_SESSION['transactiondata']['type'];
        } else {
            $type = ''; 
        }
    } else {
        header('Location: '.ROOT_URL.'index.php');
        exit;
    }
?>
<div class="phone-screen">
    <h1>Add Transaction</h1>
    <div class="transaction">
    <form action="logic/add-transaction-logic.php" method="post">
        <div class="transaction-properties">
            <h2><?=$type?></h2>
            <div class="category-chosen">
                <div class="category-logo" style="background-color=<?=$color?>">
                    <img src='<?='category_options/'.$logo?>' style="width=70%">
                </div>
                <h3><?=$name?></h3>
            </div>
            <input type="hidden" name="categoryId" value=<?=$id?>>

    </div>
    <div class="input-section">
        <h3>Date</h3>
        <input type="date" name="trdate" id="dateInput" value="<?=date('Y-m-d')?>">
    </div>
    <div class="input-section">
        <h3>Amount</h3>
        <div class="amount-input">
            <input type="number" name="amount" class="amount-field" id="amount" value="0">
            <span>$</span>
          </div>
    </div>
    <div class="input-section">
        <h3>Description</h3>
        <textarea name="description" id="" cols="40" rows="5"></textarea>
    </div>
    
    <div class="next-step">
        <a href="index.php"><button type="button" class="light-text">Cancel</button></a>
        <button type="submit" style="color: white;">Done</button>
    </div>
    </div>
    </form>
    </div>
</div>
    <script src="js/main.js"></script>
    <script>
    const getTodayDateString = ()=> {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Set the default value of the date input to today's date
    const dateInput = document.getElementById('dateInput');
    dateInput.value = getTodayDateString();
    </script>
</body>
</html>