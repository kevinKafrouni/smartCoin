<?php 
    require('partials/header.php');
?>
<div class="phone-screen">
    <div class="header-section">
        <a href="index.php"><h1><</h1></a>
        <div class="right-side">
        <div class="account-info">
        <h4>account name</h4>
        <h3><?=$_SESSION['balance']?>$</h3>
    </div>
        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="30" fill="white"><path d="m388-80-20-126q-19-7-40-19t-37-25l-118 54-93-164 108-79q-2-9-2.5-20.5T185-480q0-9 .5-20.5T188-521L80-600l93-164 118 54q16-13 37-25t40-18l20-127h184l20 126q19 7 40.5 18.5T669-710l118-54 93 164-108 77q2 10 2.5 21.5t.5 21.5q0 10-.5 21t-2.5 21l108 78-93 164-118-54q-16 13-36.5 25.5T592-206L572-80H388Zm92-270q54 0 92-38t38-92q0-54-38-92t-92-38q-54 0-92 38t-38 92q0 54 38 92t92 38Zm0-60q-29 0-49.5-20.5T410-480q0-29 20.5-49.5T480-550q29 0 49.5 20.5T550-480q0 29-20.5 49.5T480-410Zm0-70Zm-44 340h88l14-112q33-8 62.5-25t53.5-41l106 46 40-72-94-69q4-17 6.5-33.5T715-480q0-17-2-33.5t-7-33.5l94-69-40-72-106 46q-23-26-52-43.5T538-708l-14-112h-88l-14 112q-34 7-63.5 24T306-642l-106-46-40 72 94 69q-4 17-6.5 33.5T245-480q0 17 2.5 33.5T254-413l-94 69 40 72 106-46q24 24 53.5 41t62.5 25l14 112Z"/></svg>
    </div>
</div>
<div class="section-header">
    <h3>Transaction History</h3>
</div>
<hr>
<?php 
        $daysquery = "SELECT DISTINCT date FROM transactions ORDER BY date DESC";
        $result = mysqli_query($connection,$daysquery);
        while($days = mysqli_fetch_assoc($result)):
            $day = $days['date'];
            $totalquery = "SELECT t.`account-id`,c.type,
            SUM(CASE WHEN c.type='expenses' THEN -t.amount ELSE t.amount END) as `amount`
            FROM `transactions` t
            LEFT JOIN `categories` c on c.`category-id`=t.`category-id`
            WHERE t.date='$day' and `account-id`='1' 
            GROUP BY c.type,t.`account-id`
            ORDER BY c.type";
            $total = mysqli_query($connection,$totalquery);
            
            $tot_income="";
            $tot_expense="";
            while($tot = mysqli_fetch_assoc($total)){
                $tot['type']=="income"?$tot_income="Income:+".$tot['amount']:$tot_expense="Expense:".$tot['amount'];
            }
            
              
    ?>
    <div class="day-balance">
        <div class="header-info">
            <h5><?=$day?></h5>
            <div class="day-balance-detail">
                <h5 class="number-down"><?=$tot_expense?></h5>
                <h5 class="number-up"><?=$tot_income?></h5>
            </div>
        </div>
        <div class="transaction-group">
            <?php 
                $query="SELECT t.`transaction-id`,t.date,t.`account-id`,t.timedelete,c.name,c.type,c.logo,c.color,
                CASE WHEN c.type='expenses' THEN -t.amount ELSE t.amount END as `amount`
                FROM `transactions` t
                LEFT JOIN `categories` c on c.`category-id`=t.`category-id`
                WHERE t.date='$day'";
                $transactions = mysqli_query($connection,$query);
                while($tr = mysqli_fetch_assoc($transactions)):
                    $status = $tr['type']=="income"?"number-up":"number-down";
                    $amount = $tr['amount'];
            ?>
            <a href="edit-transaction.php?tri=<?=$tr['transaction-id']?>">
            <div class="single-transaction">
                <div class="category-chosen">
                        <div class="category-logo" style="background-color:<?=$tr['color']?>">
                            <img src="<?='category_options/'.$tr['logo']?>" style="width:90%">
                        </div>
                        <h3><?=$tr['name']?></h3>
                </div>
                <div>
                    <h3 class="<?=$status?>"><?=$amount?></h3>
                </div>

            </div>
            </a>
            <?php endwhile?>
        </div>
    </div>
    <?php endwhile?>
        <?php 
include('partials/navigation.php');
?>
</div>
</body>
</html>