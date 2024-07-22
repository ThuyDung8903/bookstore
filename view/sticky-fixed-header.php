<div class="sticky-init fixed-header common-sticky">
    <div class="container d-none d-lg-block">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <a href="index.php" class="site-brand">
                    <img src="image/logo.png" alt="">
                </a>
            </div>
            <div class="col-lg-8">
                <div class="main-navigation flex-lg-right">
                    <ul class="main-menu menu-right ">
                        <li class="menu-item">
                            <a href="index.php">Home</a>
                        </li>
                        <!-- Shop -->
                        <li class="menu-item has-children mega-menu">
                            <a href="shop.php">shop<i class="fas fa-chevron-down dropdown-arrow"></i></a>
                            <ul class="sub-menu four-column">
                                <?php
                                $columns = 3;
                                $rows = ceil(count($categories) / $columns);
                                ?>
                                <?php for ($row = 0; $row < $rows; $row++) : ?>
                                <li class="cus-col-25">
                                    <ul class="mega-single-block">
                                        <?php
                                            foreach ($categories as $k => $category) :
                                                if ($k % $rows == $row) : ?>
                                        <li><a href="shop.php?category_id=<?= $category['id']; ?>">
                                                <?php echo $category['category_name']; ?>
                                            </a></li>
                                        <?php
                                                endif;
                                            endforeach;
                                            ?>
                                    </ul>
                                </li>
                                <?php endfor; ?>
                            </ul>
                        </li>
                        <li class="menu-item mega-menu">
                            <a href="javascript:void(0)">Blog</i></a>
                        <li class="menu-item">
                            <a href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>