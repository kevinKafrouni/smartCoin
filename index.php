<?php 
    require('partials/header.php');
    if(!isset($_SESSION['user-id'])){
        header('location:'.ROOT_URL.'login.php');
    }
?>
<div class="phone-screen">
    <main>
    <header>
        <h4>account name</h4>
        <a href="settings.php"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="30" fill="white"><path d="m388-80-20-126q-19-7-40-19t-37-25l-118 54-93-164 108-79q-2-9-2.5-20.5T185-480q0-9 .5-20.5T188-521L80-600l93-164 118 54q16-13 37-25t40-18l20-127h184l20 126q19 7 40.5 18.5T669-710l118-54 93 164-108 77q2 10 2.5 21.5t.5 21.5q0 10-.5 21t-2.5 21l108 78-93 164-118-54q-16 13-36.5 25.5T592-206L572-80H388Zm92-270q54 0 92-38t38-92q0-54-38-92t-92-38q-54 0-92 38t-38 92q0 54 38 92t92 38Zm0-60q-29 0-49.5-20.5T410-480q0-29 20.5-49.5T480-550q29 0 49.5 20.5T550-480q0 29-20.5 49.5T480-410Zm0-70Zm-44 340h88l14-112q33-8 62.5-25t53.5-41l106 46 40-72-94-69q4-17 6.5-33.5T715-480q0-17-2-33.5t-7-33.5l94-69-40-72-106 46q-23-26-52-43.5T538-708l-14-112h-88l-14 112q-34 7-63.5 24T306-642l-106-46-40 72 94 69q-4 17-6.5 33.5T245-480q0 17 2.5 33.5T254-413l-94 69 40 72 106-46q24 24 53.5 41t62.5 25l14 112Z"/></svg></a>
    </header>

    <?php 
        $aid = $_SESSION['account-id'];
        $bquery = "SELECT t.`account-id`,
        SUM(CASE WHEN c.type='expenses' THEN -t.amount ELSE t.amount END) as `amount`
        FROM `transactions` t
        LEFT JOIN `categories` c on c.`category-id`=t.`category-id`
        WHERE `account-id`='$aid' 
        GROUP BY t.`account-id`
        ";

        $bresult = mysqli_query($connection,$bquery);
        while($balance = mysqli_fetch_assoc($bresult)){
            $mybalance = $balance['amount'];
        };
        $_SESSION['balance']= $mybalance;
        $upbquery = "UPDATE `accounts` SET `balance` = '$mybalance' WHERE `account-id` = '$aid';";
        $updatebalance = mysqli_query($connection,$upbquery);
    ?>
    <section class="balance-overview">
        <div class="balance">
            <h4>Balance</h4>
            <h1><?=$mybalance?>$</h1>
        </div>
        <div>
            <?php 
                $today = new DateTime;
                $month = $today->format('M');

                $prevbalancequery = "SELECT 
                    t.`account-id`,
                    SUM(CASE WHEN c.type='expenses' THEN -t.amount ELSE t.amount END) as `amount`
                FROM 
                    `transactions` t
                LEFT JOIN 
                    `categories` c on c.`category-id` = t.`category-id`
                WHERE 
                    t.`account-id` = '1' AND
                    DATE_FORMAT(t.date, '%Y-%m') = DATE_FORMAT(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m')
                GROUP BY 
                    t.`account-id`;
                ";
                $prevbalance = mysqli_query($connection,$prevbalancequery);
                while($prevb = mysqli_fetch_assoc($prevbalance)){
                    $pb = $prevb['amount'];
                    $changeperc = round((($mybalance-$pb)/$mybalance)*100,1);
                    if($changeperc<0){
                        $changestat="number-down";
                    }else{
                        $changestat="number-up";
                        $changeperc = "+".$changeperc;
                    }
                }
            ?>
            <p class="light-text"><?=$month?></p>
            <p class="<?=$changestat?>"><?=$changeperc?>%</p>
        </div>
    </section>

    <div class="add-transaction">
        <svg xmlns="http://www.w3.org/2000/svg" id="add-transaction" height="32" viewBox="0 -960 960 960" width="32" fill="white" onclick="Show('popup')"><path d="M450-450H200v-60h250v-250h60v250h250v60H510v250h-60v-250Z"/></svg>
        <h4>New Transaction</h4>
    </div>

    <?php 

        $prevdetquery="SELECT 
                            t.`account-id`,
                            c.type,
                            SUM(CASE WHEN c.type='expenses' THEN -t.amount ELSE t.amount END) as `amount`
                        FROM `transactions` t
                        LEFT JOIN `categories` c on c.`category-id` = t.`category-id`
                        WHERE t.`account-id` = '1' AND DATE_FORMAT(t.date, '%Y-%m') = DATE_FORMAT(CURRENT_DATE - INTERVAL 1 MONTH, '%Y-%m')
                        GROUP BY t.`account-id`,c.type;
                        ";
        $prevdet = mysqli_query($connection,$prevdetquery);
        $prevtot_in=0;$prevtot_out=0;
        while($prevmdet=mysqli_fetch_assoc($prevdet)){
            $prevamount = $prevmdet['amount'];
            if($prevmdet['type']=="income"){
                $prevtot_in = $prevamount;
            }else{
                $prevtot_exp = $prevamount;
            }
        }

        

        $detquery = "SELECT 
                        t.`account-id`,
                        c.type,
                        SUM(CASE WHEN c.type='expenses' THEN -t.amount ELSE t.amount END) as `amount`
                    FROM `transactions` t
                    LEFT JOIN `categories` c on c.`category-id` = t.`category-id`
                    WHERE t.`account-id` = '1' AND DATE_FORMAT(t.date, '%Y-%m') = DATE_FORMAT(CURRENT_DATE, '%Y-%m')
                    GROUP BY t.`account-id`,c.type;
                    ";
        $monthdet = mysqli_query($connection,$detquery);
        $tot_in=0;$tot_out=0;
        while($curmdet=mysqli_fetch_assoc($monthdet)){
            $amount = $curmdet['amount'];
            if($curmdet['type']=="income"){
                $tot_in = $amount;
            }else{
                $tot_exp = $amount;
            }
        }
        $inchangeperc = round((($tot_in-$prevtot_in)/$tot_in)*100,1);
        $expchangeperc = round((($tot_exp-$prevtot_exp)/$tot_exp)*100,1);

        if($inchangeperc<0){
            $instat="number-down";
            $intrend =  "trend-down";
            $inarrow = "category_options/trend_down.svg";   
        }else{
            $instat="number-up";
            $intrend =  "trend-up";
            $inarrow = "category_options/trend-up.svg";   
        }
        if($expchangeperc>0){
            $expstat="number-down";
            $exptrend =  "trend-down";
            $exparrow = "category_options/trend_down.svg";   
        }else{
            $expstat="number-up";
            $exptrend =  "trend-up";
            $exparrow = "category_options/trend-up.svg";   
        }
    ?>

    <div class="section-header">
        <h3>Statistics</h3>
        <a href="statistics.php"><h3>Overview ></h3></a>
    </div>
    <hr>
    <section class="account-overview">
        <div class="overview">
            <div class="trend <?=$intrend?>">
                <img src=<?=$inarrow?>>
            </div>
            <h2>+<?=$tot_in?>$</h2>
            <div class="type-div">
                <p class="<?=$instat?>"><?=$inchangeperc?>%</p>
                <p>Income</p>
            </div>
        </div>
        <div class="overview">
            <div class="trend <?=$exptrend?>">
            <img src=<?=$exparrow?> style="width=100%">
            </div>
            <h2><?=$tot_exp?>$</h2>
            <div class="type-div">
                <p class="<?=$expstat?>"><?=$expchangeperc?>%</p>
                <p>Expense</p>
            </div>
        </div>
    </section>

    <div class="section-header">
        <h3>Transaction History</h3>
        <a href="transaction-history.php"><h3>View All ></h3></a>
    </div>
    <hr>

    <section class="transaction-history">
    <?php 
        $trquery = "SELECT t.date,t.`account-id`,t.timedelete,c.name,c.type,
        CASE WHEN c.type='expenses' THEN -t.amount ELSE t.amount END as `amount`,
        DATEDIFF(NOW(),t.date) AS days_difference
        FROM `transactions` t
        LEFT JOIN `categories` c on c.`category-id`=t.`category-id`
        ORDER BY t.date DESC
        LIMIT 5";

        $result = mysqli_query($connection,$trquery);
        while($data=mysqli_fetch_assoc($result)):

        $status = $data['type']=='expenses'?'number-down':'number-up';
        $daydiff = $data['days_difference'];
        if($daydiff==0){
            $displaydays="Today";
        }
        else if($daydiff<7){
            $displaydays=$daydiff." day ago";
        }else if($daydiff<30){
            $weeks= floor($daydiff/7);
            $displaydays=$weeks." Week ago";
        }else{
            $months = floor($daydiff/30);
            $displaydays=$months." month ago";
        }
         
    ?>
        <div class="transaction-record">
            <div class="transaction-details">
                
                <h3><?=$data['name']?></h3>
                <p class="light-text"><?=$displaydays?></p>
            </div>
            <h3 class="<?=$status?>"><?=$data['amount']?>$</h3>
        </div>
<?php endwhile ?>
    </section>
    

<div class="popup-window" id="popup" style="display: <?php $_GET['status']='category'?'block':'none'; ?>none;">


<div class="transaction-step transaction-step1" id="transaction-step1" style="height:72%;">
        <div class="transaction-type">
        <button id="income-btn" class="active-income-btn" onclick="activate('income')">Income</button>
        <button id="expense-btn" class="" onclick="activate('expense')">Expense</button>
    </div>
    <h3>categories</h3>
    <div class="categories" id="expense-category" style="display: none;">
    <?php 
        $expenses_categories_query="SELECT * FROM categories WHERE type='expenses'";
        $expenses_categories = mysqli_query($connection,$expenses_categories_query);
        while($expense_category = mysqli_fetch_assoc($expenses_categories)) :
    ?>
        <div class="category" style="background-color:<?=$expense_category['color']?>">
            <img src="<?='category_options/'.$expense_category['logo']?>">
            <div class="hidden-category-details">
                <p><?=$expense_category['name']?></p>
                <div class="forms-btns" style="display:flex;">
                <form action="transaction-step2.php" method="post">
                    <input type="hidden" name="id" value="<?=$expense_category['category-id']?>">
                    <input type="hidden" name="name" value="<?=$expense_category['name']?>">
                    <input type="hidden" name="color" value="<?=$expense_category['color']?>">
                    <input type="hidden" name="logo" value="<?=$expense_category['logo']?>">
                    <input type="hidden" name="type" value="expenses">
                    <button type="submit">Select</button>
                </form>

                <form action="edit-category.php" method="post" class="btn-forms">
                    <input type="hidden" name="id" value="<?=$expense_category['category-id']?>">
                    <input type="hidden" name="name" value="<?=$expense_category['name']?>">
                    <input type="hidden" name="color" value="<?=$expense_category['color']?>">
                    <input type="hidden" name="logo" value="<?=$expense_category['logo']?>">
                    <input type="hidden" name="type" value="expenses">
                    <button type="submit">Edit</button>
                </form>
                </div>
            </div>
        </div>
        <?php endwhile ?>
        <a href="add-category.php"><div class="add-category">+</div></a>
    </div>
    <div class="categories" id="income-category" >
    <?php 
        $income_categories_query="SELECT * FROM categories WHERE type='income'";
        $income_categories = mysqli_query($connection,$income_categories_query);
        while($income_category = mysqli_fetch_assoc($income_categories)) :
    ?>
        <div class="category" style="background-color:<?=$income_category['color']?>" >
            <img src="<?='category_options/'.$income_category['logo']?>">
            <div class="hidden-category-details">
                <p><?=$income_category['name']?></p>
                <div class="forms-btns" style="display:flex;">
                <form action="transaction-step2.php" method="post">
                    <input type="hidden" name="id" value="<?=$income_category['category-id']?>">
                    <input type="hidden" name="name" value="<?=$income_category['name']?>">
                    <input type="hidden" name="color" value="<?=$income_category['color']?>">
                    <input type="hidden" name="logo" value="<?=$income_category['logo']?>">
                    <input type="hidden" name="type" value="income">
                    <button type="submit">Select</button>
                </form>

                <form action="edit-category.php" method="post" class="btn-forms">
                    <input type="hidden" name="id" value="<?=$income_category['category-id']?>">
                    <input type="hidden" name="name" value="<?=$income_category['name']?>">
                    <input type="hidden" name="color" value="<?=$income_category['color']?>">
                    <input type="hidden" name="logo" value="<?=$income_category['logo']?>">
                    <input type="hidden" name="type" value="income">
                    <button type="submit">Edit</button>
                </form>
                </div>
            </div>
        </div>
        <?php endwhile ?>
        <a href="add-category.php"><div class="add-category">+</div></a>
    </div>
    
    <div class="next-step">
        <button class="light-text" onclick="hide('popup')">Cancel</button>
    </div>
    </div>
</div>
</main>
<?php 
include('partials/navigation.php');
?>
</div>
</body>
</html>