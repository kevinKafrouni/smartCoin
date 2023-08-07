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

<div class="transaction-step transaction-step2" id="transaction-step2">
    <form>
        <div class="transaction-properties">
            <h2><?=$type?></h2>
            <div class="category-chosen">
                <div class="category-logo" style="background-color=<?=$color?>">
                    <img src='<?='category_options/'.$logo?>' style='width=30px'>
                </div>
                <h3><?=$name?></h3>
            </div>

    </div>
    <div class="input-section">
        <h3>Date</h3>
        <input type="date">
    </div>
    <div class="input-section">
        <h3>Amount</h3>
        <div class="amount-input">
            <button class="decrement-btn" onclick="updateValue('decrement')">-</button>
            <input type="number" class="amount-field" id="amount" value="0">
            <button class="increment-btn" onclick="updateValue('increment')">+</button>
            <span>$</span>
          </div>
    </div>
    <div class="input-section">
        <h3>Description</h3>
        <textarea name="" id="" cols="40" rows="5"></textarea>
    </div>
    
    <div class="next-step">
        <button type="button" class="light-text" onclick="hide('popup');swap('transaction-step2','transaction-step1')">Cancel</button>
        <button type="submit" style="color: white;">Done</button>
    </div>
    </div>
    </form>
    </div>
    <script src="js/main.js"></script>
</body>
</html>