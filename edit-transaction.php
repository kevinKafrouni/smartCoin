<?php 
    require('partials/header.php');
    if(!isset($_SESSION['user-id'])){
        header('location:'.ROOT_URL.'login.php');
    }
    if(isset($_GET['tri'])){
        $trid=$_GET['tri'];
        $query="SELECT t.`category-id`,t.`transaction-id`,t.date,t.`account-id`,t.timedelete,c.name,c.type,c.logo,c.color,
        CASE WHEN c.type='expenses' THEN -t.amount ELSE t.amount END as `amount`
        FROM `transactions` t
        LEFT JOIN `categories` c on c.`category-id`=t.`category-id`
        WHERE t.`transaction-id`='$trid'    
        ";
        $transaction=mysqli_query($connection,$query);
        
?>
<div class="phone-screen light-screen">
    <h1 style="text-align:center">Edit transaction</h1>
    <form action="logic/edit-transaction-logic.php" method="post">
        <div class="transaction-properties">
            <?php while($data=mysqli_fetch_assoc($transaction)):?>
            <h2><?=$data['type']?></h2>
            <div class="category-chosen">
                <div class="category-logo" style="background-color=<?=$data['color']?>">
                    <img src='<?='category_options/'.$data['logo']?>' style="width=70%">
                </div>
                <h3><?=$data['name']?></h3>
            </div>
            <input type="hidden" name="categoryId" value="<?=$data['category-id']?>">
            <input type="hidden" name="trid" value="<?=$data['transaction-id']?>">

    </div>
    <div class="input-section">
        <h3>Date</h3>
        <input type="date" name="trdate" id="dateInput" value="<?=$data['date']?>">
    </div>
    <div class="input-section">
        <h3>Amount</h3>
        <div class="amount-input">
            <input type="number" name="amount" class="amount-field" id="amount" value="<?=$data['amount']?>">
            <span>$</span>
          </div>
    </div>
    <div class="input-section">
        <h3>Description</h3>
        <textarea name="description" id="" cols="40" rows="5"></textarea>
    </div>
    
    <div class="next-step">
        <a href="index.php"><button type="button" class="light-text">Cancel</button></a>
        <a href="delete.php?t=tr&id=<?=$data['transaction-id']?>"><button type="button" class="number-down">Delete</button></a>
        <button type="submit" style="color: white;">Done</button>
    </div>
    <?php endwhile?>
    </div>
    </form>
    
    </div>
<?php 
    }else{
        header("location:transaction-history.php");
    }
?>
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