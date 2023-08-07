<?php 
    require('partials/header.php');
    if(!isset($_SESSION['user-id'])){
        header('location:'.ROOT_URL.'login.php');
    }
?>

<div class="add-category-section" id="add-category-section" style="margin-left:-20px;padding-left:1.2rem;">
        <div class="transaction-properties">
        <h2>Add Category</h2>
            <div class="category-chosen">
                <div class="chosen-category-logo">
                <img src='category_options/group.svg' id="selected-logo" >        
            </div>
                <h3 id="title">name</h3>
            </div>
    </div>
    <form action="logic/add-category-logic.php" method="post" >
    <div class="input-group">
    <div class="input-section">
        <h3>Name</h3>
        <input type="text" id="input-title" onchange="changetitle('title')" name="category-name"> 
    </div>
    <div class="input-section">
        <h3>Color</h3>
        <div class="category-color">
            <input type="color" id="color-picker" name="color">
          </div>
          <input type="hidden" id="select-logo" name="select-logo" value="">
          <input type="hidden" id="category-type" name="category-type" value="income">
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
    
    <div class="next-step">
        <a href="index.php"><button type="button" class="light-text">Cancel</button></a>
        <button type="submit" name="submit" style="color: white;">Done</button>
    </div>
        </form>
    </div>
    </div>
    <script src="js/main.js"></script>
</body>
</html>