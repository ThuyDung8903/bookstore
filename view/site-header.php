<?php
require_once 'connect/connect.php';
session_start();
//lay ra tat ca danh muc
$query = mysqli_query($connect, "SELECT * FROM category WHERE status != 0");
$categories = [];
while ($category = mysqli_fetch_assoc($query)) {
    $categories[] = $category;
}
//print_r($categories);
?>
<div class="site-header header-4 mb--20 d-none d-lg-block">
    <div class="header-top header-top--style-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <ul class="header-top-list">
                        <li class="dropdown-trigger currency-dropdown"><a href="">$ US Dollar </a><i
                                class="fas fa-chevron-down dropdown-arrow"></i>
                            <ul class="dropdown-box">
                                <li><a href="#">VND Vietnam</a></li>
                                <li><a href="#">€ Euro</a></li>
                                <li><a href="#">£ Pound Sterling</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-trigger language-dropdown"><a href=""><span class="flag-img"><img
                                        src="image/icon/eng-flag.png" alt=""></span>en-US </a><i
                                class="fas fa-chevron-down dropdown-arrow"></i>
                            <ul class="dropdown-box">
                                <li> <a href=""> <span class="flag-img"><img src="image/icon/eng-flag.png"
                                                alt=""></span>English</a>
                                </li>
                                <li> <a href=""> <span class="flag-img"><img src="image/icon/vietnam-flag.png"
                                                alt=""></span>Vietnam</a>
                                </li>
                                <li> <a href=""> <span class="flag-img"><img src="image/icon/germany-flag.png"
                                                alt=""></span>Germany</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8 flex-lg-right">
                    <ul class="header-top-list">
                        <li class="dropdown-trigger language-dropdown"><a href=""><i class="icons-left fas fa-user"></i>
                                My Account</a><i class="fas fa-chevron-down dropdown-arrow"></i>
                            <ul class="dropdown-box">
                                <li> <a href="#">My Account</a></li>
                                <li> <a href="#">Order History</a></li>
                                <li> <a href="#">Logout</a></li>
                                <li> <a href="#">Login</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="icons-left fas fa-phone"></i> Contact</a>
                        </li>
                        <li><a href="#"><i class="icons-left fas fa-share"></i> Checkout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle pt--10 pb--10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <a href="index.php" class="site-brand">
                        <img src="image/logo.png" alt="">
                    </a>
                </div>
                <div class="col-lg-5">
                    <div class="header-search-block">
                        <form action="search.php?keyWord=" method="GET">
                            <input type="text" placeholder="Search entire store here" name="keyWord" required>
                            <button type="submit" value="">Search</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-navigation flex-lg-right">
                        <div class="cart-widget">
                            <div class="login-block">
                                <a href="login-register.php" class="font-weight-bold">Login</a> <br>
                                <span>or</span><a href="login-register.php">Register</a>
                            </div>
                            <?php
                            $subTotal = 0;
                            if (isset($_SESSION['cart'])) {
                                $total_quantity = array_sum(array_column($_SESSION['cart'], 'quantity'));

                                foreach ($_SESSION['cart'] as $product) {
                                    if ($product['book_price'] == $product['sale_price']) {
                                        $total = $product['quantity'] * $product['book_price'];
                                    } else {
                                        $total = $product['quantity'] * $product['sale_price'];
                                    }
                                    $subTotal += $total;
                                }
                            }
                            ?>
                            <div class="cart-block">
                                <div class="cart-total">
                                    <span class="text-number">
                                        <?php echo isset($total_quantity) ? $total_quantity : 0; ?>
                                    </span>
                                    <span class="text-item">
                                        Shopping Cart
                                    </span>
                                    <span class="price">$
                                        <?= $subTotal ?>
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </div>
                                <div class="cart-dropdown-block">
                                    <div class=" single-cart-block ">
                                        <?php if (isset($_SESSION['cart'])) :
                                            foreach ($_SESSION['cart'] as $product) : ?>
                                        <div class="cart-product">
                                            <a href="product-details.php?book_id=<?= $product['id'] ?>" class="image">
                                                <img src="uploads/<?php echo $product['book_image']; ?>"
                                                    alt="<?php echo $product['book_title']; ?>" style="width: 60px;">
                                            </a>
                                            <div class="content">
                                                <h3 class="title"><a
                                                        href="product-details.php?book_id=<?= $product['id'] ?>"><?php echo $product['book_title']; ?></a>
                                                </h3>
                                                <p class="price"><span class="qty"><?= $product['quantity'] ?> ×</span>
                                                    $
                                                    <?php if ($product['book_price'] == $product['sale_price']) {
                                                                echo $product['book_price'];
                                                            } else {
                                                                echo $product['sale_price'];
                                                            } ?>
                                                </p>
                                                <a
                                                    href="module/update-cart.php?book_id=<?= $product['id'] ?>&remove=<?= $product['id'] ?>&quantity=0"><button
                                                        class="cross-btn"><i class="fas fa-times"></i></button></a>
                                            </div>
                                        </div>
                                        <?php endforeach;
                                        endif; ?>
                                    </div>
                                    <div class="single-cart-block">
                                        <div class="btn-block">
                                            <a href="cart.php" class="btn">View Cart <i
                                                    class="fas fa-chevron-right"></i></a>
                                            <a href="checkout.php" class="btn btn--primary">Check Out <i
                                                    class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <nav class="category-nav white-nav">
                        <div>
                            <a href="javascript:void(0)" class="category-trigger"><i class="fa fa-bars"></i>Browse
                                categories</a>
                            <ul class="category-menu">
                                <?php foreach ($categories as $category) : ?>
                                <li class="cat-item">
                                    <a href="shop.php?category_id=<?php echo $category['id']; ?>">
                                        <?php echo $category['category_name']; ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header-phone color-white">
                        <div class="icon">
                            <i class="fas fa-headphones-alt"></i>
                        </div>
                        <div class="text">
                            <p>Free Support 24/7</p>
                            <p class="font-weight-bold number">+ 84.247686868</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-navigation flex-lg-right">
                        <ul class="main-menu menu-right main-menu--white li-last-0">
                            <li class="menu-item">
                                <a href="index.php">Home</a>
                            </li>
                            <!-- Shop -->
                            <li class="menu-item has-children mega-menu">
                                <a href="shop.php">shop <i class="fas fa-chevron-down dropdown-arrow"></i></a>
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
                            <!-- Blog -->
                            <li class="menu-item mega-menu">
                                <a href="javascript:void(0)">Blog</i></a>
                            </li>
                            <!-- Contact -->
                            <li class="menu-item">
                                <a href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>