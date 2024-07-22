<!--Template index-4 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pustok Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="./css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="./css/main.css" />
    <link rel="shortcut icon" type="image/x-icon" href="./image/favicon.ico">
</head>

<body>
    <div class="site-wrapper" id="top">
        <!--================================= Header ===================================== -->
        <?php
        include_once 'view/site-header.php';
        include_once 'view/site-mobile-menu.php';
        include_once 'view/sticky-fixed-header.php';
        include_once 'view/hero-area.php';
        include_once 'view/home-features-section.php';
        include_once 'view/home-category-gallery.php';
        ?>
        <!--================================= Main ===================================== -->
        <?php
        //Home Slider Tab Section (Main Content)
        include_once 'view/home-slider-tab.php';
        include_once 'view/modal-quick-view-product.php';
        include_once 'view/promotion-section.php';
        include_once 'view/home-blog-section.php';
        ?>
    </div>
    <!--================================= Footer ===================================== -->
    <?php
    //include_once 'view\brands-slider.php';
    include_once 'view\footer.php';
    ?>

    <!-- Use Minified Plugins Version For Fast Page Load -->
    <script src="js/plugins.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>