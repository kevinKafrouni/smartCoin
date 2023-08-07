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

    <section class="balance-overview">
        <div class="balance">
            <h4>Balance</h4>
            <h1>35,000$</h1>
        </div>
        <div>
            <p class="light-text">24h</p>
            <p class="number-up">+8.6%</p>
        </div>
    </section>

    <div class="add-transaction">
        <svg xmlns="http://www.w3.org/2000/svg" id="add-transaction" height="32" viewBox="0 -960 960 960" width="32" fill="white" onclick="Show('popup')"><path d="M450-450H200v-60h250v-250h60v250h250v60H510v250h-60v-250Z"/></svg>
        <h4>New Transaction</h4>
    </div>

    <div class="section-header">
        <h3>Statistics</h3>
        <a href="statistics.php"><h3>Overview ></h3></a>
    </div>
    <hr>
    <section class="account-overview">
        <div class="overview">
            <div class="trend trend-up">
                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48" fill="white"><path d="m123-240-43-43 292-291 167 167 241-241H653v-60h227v227h-59v-123L538-321 371-488 123-240Z"/></svg>
            </div>
            <h2>+2,621 $</h2>
            <div class="type-div">
                <p class="number-up">11.7%</p>
                <p>Income</p>
            </div>
        </div>
        <div class="overview">
            <div class="trend trend-down">
                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48" fill="white"><path d="M653-240v-60h127L539-541 372-374 80-665l43-43 248 248 167-167 283 283v-123h59v227H653Z"/></svg>
            </div>
            <h2>-835 $</h2>
            <div class="type-div">
                <p class="number-down">7.1%</p>
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
        <div class="transaction-record">
            <div class="transaction-details">
                <h3>Payckeck</h3>
                <p class="light-text">1 day ago</p>
            </div>
            <h3 class="number-up">+16,700$</h3>
        </div>
        <div class="transaction-record">
            <div class="transaction-details">
                <h3>Pizza Delivery</h3>
                <p class="light-text">2 days ago</p>
            </div>
            <h3 class="number-down">-10$</h3>
        </div>
        <div class="transaction-record">
            <div class="transaction-details">
                <h3>Car Rent</h3>
                <p class="light-text">1 Week ago</p>
            </div>
            <h3 class="number-down">-400$</h3>
        </div>
        <div class="transaction-record">
            <div class="transaction-details">
                <h3>Stocks</h3>
                <p class="light-text">1 Week ago</p>
            </div>
            <h3 class="number-up">+950$</h3>
        </div>
        <div class="transaction-record">
            <div class="transaction-details">
                <h3>Party</h3>
                <p class="light-text">3 Weeks ago</p>
            </div>
            <h3 class="number-down">-1,100$</h3>
        </div>

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
                <button>Select</button>
                <button onclick="editCategory('<?=$expense_category['category-id']?>');">Edit</button>
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