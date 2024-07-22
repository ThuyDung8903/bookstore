<div class="site-mobile-menu">
    <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
        <div class="container">
            <div class="row align-items-sm-end align-items-center">
                <div class="col-md-4 col-7">
                    <a href="index.php" class="site-brand">
                        <img src="image/logo.png" alt="">
                    </a>
                </div>
                <div class="col-md-5 order-3 order-md-2">
                    <nav class="category-nav">
                        <div>
                            <a href="javascript:void(0)" class="category-trigger"><i class="fa fa-bars"></i>Browse
                                categories</a>
                            <ul class="category-menu">
                                <?php foreach ($categories as $category) : ?>
                                <li class="cat-item">
                                    <a href="shop.php?category_id=<?= $category['id'] ?>">
                                        <?php echo $category['category_name']; ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-3 col-5  order-md-3 text-right">
                    <div class="mobile-header-btns header-top-widget">
                        <ul class="header-links">
                            <li class="sin-link">
                                <a href="cart.php" class="cart-link link-icon"><i class="ion-bag"></i></a>
                            </li>
                            <li class="sin-link">
                                <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
                                        class="ion-navicon"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--Off Canvas Navigation Start-->
    <aside class="off-canvas-wrapper">
        <div class="btn-close-off-canvas">
            <i class="ion-android-close"></i>
        </div>
        <div class="off-canvas-inner">
            <!-- search box start -->
            <div class="search-box offcanvas">
                <form action="search.php?keyWord=" method="GET">
                    <input type="text" placeholder="Search entire store here" name="keyWord" required>
                    <button type="submit" value="">Search</button>
                </form>
            </div>
            <!-- search box end -->
            <!-- mobile menu start -->
            <div class="mobile-navigation">
                <!-- mobile menu navigation start -->
                <nav class="off-canvas-nav">
                    <ul class="mobile-menu main-mobile-menu">
                        <li class="menu-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Blog</a>
                        </li>
                        <li class="menu-item">
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
                                        <li><a href="shop.php?category_id=<?= $category['id'] ?>">
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
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- mobile menu end -->
            <nav class="off-canvas-nav">
                <ul class="mobile-menu menu-block-2">
                    <li class="menu-item-has-children">
                        <a href="#">Currency - USD $ <i class="fas fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li> <a href="#">USD $</a></li>
                            <li> <a href="#">EUR €</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Lang - Eng<i class="fas fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li>Eng</li>
                            <li>Ban</li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">My Account <i class="fas fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="">My Account</a></li>
                            <li><a href="">Order History</a></li>
                            <li><a href="">Transactions</a></li>
                            <li><a href="">Downloads</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="off-canvas-bottom">
                <div class="contact-list mb--10">
                    <a href="" class="sin-contact"><i class="fas fa-mobile-alt"></i>(12345) 78790220</a>
                    <a href="" class="sin-contact"><i class="fas fa-envelope"></i>examle@handart.com</a>
                </div>
                <div class="off-canvas-social">
                    <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="single-icon"><i class="fas fa-rss"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </aside>
    <!--Off Canvas Navigation End-->
</div>