<?php 
    require('partials/header.php');
    if(!isset($_SESSION['user-id'])){
        header('location:'.ROOT_URL.'login.php');
    }

        $id = $_SESSION['categoryData']['id'] ?? null;
        $name = $_SESSION['categoryData']['category-name'] ?? null;
        $color = $_SESSION['categoryData']['color'] ?? null;
        $logo = $_SESSION['categoryData']['select-logo'] ?? null;
        $type = $_SESSION['categoryData']['category-type'] ?? null;
        


    if(isset($_POST['id'])&&isset($_POST['name'])&&isset($_POST['color'])&&isset($_POST['logo'])&&isset($_POST['type'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $color = $_POST['color'];
        $logo = $_POST['logo'];
        $type = $_POST['type'];
    }else{
        header('location'.ROOT_URL.'index.php');
    }
?>

<div class="transaction-step add-category-section" id="add-category-section">
        <div class="transaction-properties">
            <?php
            ?>
            <h2>Edit Category</h2>
            <div class="category-chosen">
                <div class="chosen-category-logo" style="background-color:<?=$color?>">
                <img src='<?='category_options/'.$logo?>' id="selected-logo" >        
            </div>
                <h3 id="title"><?=$name?></h3>
            </div>

    </div>
    <form action="logic/edit-category-logic.php" method="post" >
    <div class="input-group">
    <div class="input-section">
        <h3>Name</h3>
        <input type="text" id="input-title" onchange="changetitle('title')" name="category-name" value="<?=$name?>"> 
    </div>
    <div class="input-section">
        <h3>Color</h3>
        <div class="category-color">
            <input type="color" id="color-picker" name="color" value="<?=$color?>">
          </div>
          <input type="hidden" id="select-logo" name="select-logo" value="<?=$logo?>">
          <input type="hidden" id="category-type" name="category-type" value="<?=$type?>">
          <input type="hidden" name="id" value="<?=$id?>">
    </div>
    
    

    </div>
    <div class="input-section">
        <h3>Logo</h3>
        <div class="select-logo-section">
        <?php
            $imageFolder = 'category_options'; // Change this to the path of your image folder
            $images = scandir($imageFolder);    
            foreach ($images as $image) {
                // Skip "." and ".." entries and only display image files
                if ($image != '.' && $image != '..' && is_file($imageFolder . '/' . $image)) {
                    echo '<img src="' . $imageFolder . '/' . $image . '" onclick="handleImageChange(\'' . $image . '\')" >';
                }
            }
        ?>


        </div>
    </div>
    <div class="results-buttons">
        <a href="index.php?status=category" class="light-text">Cancel</a>
        <button type="submit">Done</button>
        </div>
    </form>
    <?php 
include('partials/navigation.php');
?>
</div>
</body>
</html>
