<?php 
    require('partials/header.php');
    $uid=$_SESSION['user-id'];
    $query = "SELECT * FROM users WHERE `user-id`=$uid";
    $result = mysqli_query($connection,$query);
    while($info = mysqli_fetch_assoc($result)): 
?>
<div class="phone-screen">
    <div class="header-section">
<a href="settings.php"><h1><</h1></a>
    <h2 style="text-align: center;margin-right:10rem">Edit your account</h2>
    </div>
    <form action="logic\edit-account-logic.php" method="post">
        <label for="fname">First name</label><input type="text" name="fname" id="fname" value="<?=$info['firstname']?>">
        <label for="lname">Last name</label><input type="text" name="lname" id="lname" value="<?=$info['lastname']?>">
        <label for="fname">username</label><input type="text" name="uname" id="uname" value="<?=$info['username']?>">
        <label for="lname">Last name</label><input type="text" name="email" id="email" value="<?=$info['email']?>">
        <div>
            
            <?php 
               $countquery=" SELECT 
                                SUM(CASE WHEN c.type='expenses' THEN -t.amount ELSE t.amount END) as `amount`,
                                COUNT(*) as `trcount`
                            FROM `transactions` t
                            left join accounts a on `a`.`account-id`= `t`.`account-id`
                            LEFT JOIN `categories` c on c.`category-id`=t.`category-id`
                            WHERE `a`.`user-id`='$uid'
                            GROUP by `user-id`";
                $res = mysqli_query($connection,$countquery);
                
                while($trcount = mysqli_fetch_assoc($res)):
            ?>
            <h3>Transactions made : <?=$trcount['trcount']?></h3>
            <h3>Balance : <?=$trcount['amount']?> $</h3>   
            <?php endwhile?> 
        <div>
        <div class="inline-btns">
        <button type="button" id="deleteButton" class="number-down" style="background-color:#A04242"><a href="delete-account.php">Delete</a></button>
        <button type="submit" name="submit">Save Changes</button>
        </div>
    </form>
    <?php endwhile?>
        </div>
        <script>
            var deleteButton = document.getElementById("deleteButton");

            deleteButton.addEventListener("click", function() {
                var confirmation = confirm("Are you sure you want to delete your account?");
                if (confirmation) {
                    window.location.href = "delete-account.php";
                }
            });
        </script>
</body>
</html>