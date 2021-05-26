<?php

include_once 'includes/_header.php';
include_once 'database/database.php';
echo $_SESSION['captcha'];
?>

<!-- index-content -->
<div class="index">

    <!--slider_offer-->
    <?php include_once 'includes/_p_sidebar.php' ?>

    <!-- slider -->
    <?php include_once 'includes/_slider.php' ?>

    <!-- first slider pro -->
    <?php include_once 'includes/_1_Index_slider.php' ?>

    <!-- 3pic -->
    <?php include_once 'includes/_1_3pic.php' ?>

    <!-- محصولات پربازدید -->
    <?php include_once 'includes/_2_Index_slider.php' ?>

    <!-- 4-box-categorys -->
    <?php include_once 'includes/_2_3pic.php' ?>

    <!-- محصولات پر فروش -->
    <?php include_once 'includes/_3_Index_slider.php' ?>

    <!-- slides-of-blogs -->
    <?php include_once 'includes/_4_Index_blog.php' ?>
</div>
<!-- the-footer -->
<?php include_once 'includes/_footer.php' ?>
</body>
</html>
