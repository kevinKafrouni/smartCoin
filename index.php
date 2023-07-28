<?php 
    require('partials/header.php');
?>
    <main>
    <header>
        <h4>account name</h4>
        <a href="settings.html"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="30" fill="white"><path d="m388-80-20-126q-19-7-40-19t-37-25l-118 54-93-164 108-79q-2-9-2.5-20.5T185-480q0-9 .5-20.5T188-521L80-600l93-164 118 54q16-13 37-25t40-18l20-127h184l20 126q19 7 40.5 18.5T669-710l118-54 93 164-108 77q2 10 2.5 21.5t.5 21.5q0 10-.5 21t-2.5 21l108 78-93 164-118-54q-16 13-36.5 25.5T592-206L572-80H388Zm92-270q54 0 92-38t38-92q0-54-38-92t-92-38q-54 0-92 38t-38 92q0 54 38 92t92 38Zm0-60q-29 0-49.5-20.5T410-480q0-29 20.5-49.5T480-550q29 0 49.5 20.5T550-480q0 29-20.5 49.5T480-410Zm0-70Zm-44 340h88l14-112q33-8 62.5-25t53.5-41l106 46 40-72-94-69q4-17 6.5-33.5T715-480q0-17-2-33.5t-7-33.5l94-69-40-72-106 46q-23-26-52-43.5T538-708l-14-112h-88l-14 112q-34 7-63.5 24T306-642l-106-46-40 72 94 69q-4 17-6.5 33.5T245-480q0 17 2.5 33.5T254-413l-94 69 40 72 106-46q24 24 53.5 41t62.5 25l14 112Z"/></svg></a>
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
        <a href="statistics.html"><h3>Overview ></h3></a>
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
        <a href="transaction-history.html"><h3>View All ></h3></a>
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
    

<div class="popup-window" id="popup" style="display: none;">
    <div class="transaction-step transaction-step1" id="transaction-step1">
        <div class="transaction-type">
        <button id="income-btn" class="active-income-btn" onclick="activate('income')">Income</button>
        <button id="expense-btn" class="" onclick="activate('expense')">Expense</button>
    </div>
    <h3>categories</h3>
    
    <div class="categories" id="expense-category" style="display: none;">
        <div class="category">car</div>
        <div class="category">food</div>
        <div class="category">house</div>
        <div class="category">gym</div>
        <div class="category">Clothes</div>
        <div class="category">books</div>
        <div class="add-category" onclick="swap('transaction-step1','add-category-section')">+</div>
    </div>
    <div class="categories" id="income-category" >
        <div class="category">Pay</div>
        <div class="category">gifts</div>
        <div class="category">Stocks</div>
        <div class="category">refunds</div>
        <div class="add-category" onclick="swap('transaction-step1','add-category-section')">+</div>
    </div>
    <div class="next-step">
        <button class="light-text" onclick="hide('popup')">Cancel</button>
        <button style="color: white;" onclick="swap('transaction-step1','transaction-step2')">Next</button>
    </div>
    </div>

    <div class="transaction-step transaction-step2" id="transaction-step2" style="display: none;">
        <div class="transaction-properties">
            <h2>Income</h2>
            <div class="category-chosen">
                <div class="category-logo">
                    <svg xmlns="http://www.w3.org/2000/svg" height="28" viewBox="0 -960 960 960" width="28" fill="white"><path d="M652-416q25 0 44.5-19.5t19.5-45q0-25.5-19.5-44.5T652-544q-25 0-44.5 19T588-480.5q0 25.5 19.5 45T652-416ZM180-233v53-600 547Zm0 113q-23 0-41.5-18T120-180v-600q0-23 18.5-41.5T180-840h600q24 0 42 18.5t18 41.5v134h-60v-134H180v600h600v-133h60v133q0 24-18 42t-42 18H180Zm358-173q-34 0-54-20t-20-53v-227q0-34 20-53.5t54-19.5h270q34 0 54 19.5t20 53.5v227q0 33-20 53t-54 20H538Zm284-60v-253H524v253h298Z"/></svg>
                </div>
                <h3>Stocks</h3>
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
        <button class="light-text" onclick="hide('popup');swap('transaction-step2','transaction-step1')">Cancel</button>
        <button style="color: white;">Done</button>
    </div>
    </div>


    <div class="transaction-step add-category-section" id="add-category-section" style="display: none;">
        <div class="transaction-properties">
            <h2>Add Category</h2>
            <div class="category-chosen">
                <div class="chosen-category-logo">
                    <svg xmlns="http://www.w3.org/2000/svg" height="28" viewBox="0 -960 960 960" width="28" fill="white"><path d="M652-416q25 0 44.5-19.5t19.5-45q0-25.5-19.5-44.5T652-544q-25 0-44.5 19T588-480.5q0 25.5 19.5 45T652-416ZM180-233v53-600 547Zm0 113q-23 0-41.5-18T120-180v-600q0-23 18.5-41.5T180-840h600q24 0 42 18.5t18 41.5v134h-60v-134H180v600h600v-133h60v133q0 24-18 42t-42 18H180Zm358-173q-34 0-54-20t-20-53v-227q0-34 20-53.5t54-19.5h270q34 0 54 19.5t20 53.5v227q0 33-20 53t-54 20H538Zm284-60v-253H524v253h298Z"/></svg>
                </div>
                <h3 id="title">Stocks</h3>
            </div>

    </div>
    <div class="input-section">
        <h3>Name</h3>
        <input type="text" id="input-title" onchange="changetitle('title')">
    </div>
    <div class="input-section">
        <h3>Color</h3>
        <div class="category-color">
            <input type="color" id="color-picker">
          </div>
    </div>
    <div class="input-section">
        <h3>Logo</h3>
        <textarea name="" id="" cols="40" rows="5"></textarea>
    </div>
    
    <div class="next-step">
        <button class="light-text" onclick="swap('add-category-section','transaction-step1')">Cancel</button>
        <button style="color: white;" onclick="swap('add-category-section','transaction-step1')">Done</button>
    </div>

    </div>
</div>
</main>
<?php 
include('partials/navigation.php');
?>
</body>
</html>