<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Checkout |Pustok Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
</head>

<body>
    <div class="site-wrapper" id="top">
        <?php
        include_once './view/site-header.php';
        include_once './view/site-mobile-menu.php';
        include_once './view/sticky-fixed-header.php';
        ?>
        <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php if (!isset($_SESSION['cart']) || $_SESSION['cart'] == null) : ?>
                        <div class="order-complete-message text-center">
                            <h1>Opp !</h1>
                            <p>You have no item in your cart</p>
                            <div><a class="btn btn--primary" href="shop.php">Back to Shop</a></div>
                        </div>
                        <?php else : ?>
                        <!-- Checkout Form s-->
                        <div class="checkout-form">
                            <div class="row row-40">
                                <div class="col-12">
                                    <h1 class="quick-title">Checkout</h1>
                                    <!-- Slide Down Trigger  -->
                                    <div class="checkout-quick-box">
                                        <p><i class="far fa-sticky-note"></i>Returning customer? <a href="javascript:"
                                                class="slide-trigger" data-target="#quick-login">Click
                                                here to login</a></p>
                                    </div>
                                    <!-- Slide Down Blox ==> Login Box  -->
                                    <div class="checkout-slidedown-box" id="quick-login">
                                        <form action="./">
                                            <div class="quick-login-form">
                                                <p>If you have shopped with us before, please enter your details in the
                                                    boxes below. If you are a new
                                                    customer
                                                    please
                                                    proceed to the Billing & Shipping section.</p>
                                                <div class="form-group">
                                                    <label for="quick-user">Username or email *</label>
                                                    <input type="text" placeholder="" id="quick-user">
                                                </div>
                                                <div class="form-group">
                                                    <label for="quick-pass">Password *</label>
                                                    <input type="text" placeholder="" id="quick-pass">
                                                </div>
                                                <div class="form-group">
                                                    <div class="d-flex align-items-center flex-wrap">
                                                        <a href="#" class="btn btn-outlined   mr-3">Login</a>
                                                        <div class="d-inline-flex align-items-center">
                                                            <input type="checkbox" id="accept_terms" class="mb-0 mr-1">
                                                            <label for="accept_terms" class="mb-0">I’ve read and accept
                                                                the terms &amp; conditions</label>
                                                        </div>
                                                    </div>
                                                    <p><a href="javascript:" class="pass-lost mt-3">Lost your
                                                            password?</a></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Slide Down Trigger  -->
                                    <div class="checkout-quick-box">
                                        <p><i class="far fa-sticky-note"></i>Have a coupon? <a href="javascript:"
                                                class="slide-trigger" data-target="#quick-cupon">
                                                Click here to enter your code</a></p>
                                    </div>
                                    <!-- Slide Down Blox ==> Cupon Box -->
                                    <div class="checkout-slidedown-box" id="quick-cupon">
                                        <form action="./">
                                            <div class="checkout_coupon">
                                                <input type="text" class="mb-0" placeholder="Coupon Code">
                                                <a href="" class="btn btn-outlined">Apply coupon</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-7 mb--20">
                                    <!-- Start Form place order -->
                                    <?php
                                        $shipping_methods = getAll('shipping_method');
                                        $payment_methods = getAll('payment_method');
                                        ?>
                                    <form name="form-place-order" action="module/place-order.php" method="POST">
                                        <!-- Billing Address -->
                                        <div id="billing-form" class="mb-40">
                                            <h4 class="checkout-title">Billing Address</h4>
                                            <div class="row">
                                                <div class="col-12 mb--20">
                                                    <label>Full Name*</label>
                                                    <input type="text" name="shipToName" placeholder="Full Name"
                                                        required>
                                                </div>
                                                <div class="col-md-6 col-12 mb--20">
                                                    <label>Email Address*</label>
                                                    <input type="email" name="shipToEmail" placeholder="Email Address"
                                                        required>
                                                </div>
                                                <div class="col-md-6 col-12 mb--20">
                                                    <label>Phone*</label>
                                                    <input type="text" name="shipToPhone" placeholder="Phone number"
                                                        required>
                                                </div>
                                                <div class="col-12 mb--20">
                                                    <label>Address*</label>
                                                    <input type="text" name="shipToAddress"
                                                        placeholder="Ship to address" required>
                                                </div>
                                                <div class="col-12 col-12 mb--20">
                                                    <label>Shipping method (select to see shipping cost)*</label>
                                                    <select name="shipping_method_id" id="shipping_method"
                                                        class="nice-select">
                                                        <?php foreach ($shipping_methods as $shipping_method) : ?>
                                                        <option value="<?= $shipping_method['id'] ?>"
                                                            cost="<?= $shipping_method['shipping_fee'] ?>">
                                                            <?= $shipping_method['description'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-12 mb--20">
                                                    <label>Payment method*</label>
                                                    <select name="payment_method_id" class="nice-select">
                                                        <?php foreach ($payment_methods as $payment_method) : ?>
                                                        <option value="<?= $payment_method['id'] ?>">
                                                            <?= $payment_method['description'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-12 mb--20 ">
                                                    <div class="block-border check-bx-wrapper">
                                                        <div class="check-box">
                                                            <input type="checkbox" id="create_account">
                                                            <label for="create_account">Create an Acount?</label>
                                                        </div>
                                                        <!-- <div class="check-box">
                                                        <input type="checkbox" id="shiping_address" data-shipping>
                                                        <label for="shiping_address">Ship to Different Address</label>
                                                    </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Shipping Address -->
                                        <!-- <div id="shipping-form" class="mb--40">
                                        <h4 class="checkout-title">Shipping Address</h4>
                                        <div class="row">
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>First Name*</label>
                                                <input type="text" placeholder="First Name">
                                            </div>
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Last Name*</label>
                                                <input type="text" placeholder="Last Name">
                                            </div>
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Email Address*</label>
                                                <input type="email" placeholder="Email Address">
                                            </div>
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Phone no*</label>
                                                <input type="text" placeholder="Phone number">
                                            </div>
                                            <div class="col-12 mb--20">
                                                <label>Company Name</label>
                                                <input type="text" placeholder="Company Name">
                                            </div>
                                            <div class="col-12 mb--20">
                                                <label>Address*</label>
                                                <input type="text" placeholder="Address line 1">
                                                <input type="text" placeholder="Address line 2">
                                            </div>
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Country*</label>
                                                <select class="nice-select">
                                                    <option>Bangladesh</option>
                                                    <option>China</option>
                                                    <option>country</option>
                                                    <option>India</option>
                                                    <option>Japan</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Town/City*</label>
                                                <input type="text" placeholder="Town/City">
                                            </div>
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>State*</label>
                                                <input type="text" placeholder="State">
                                            </div>
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Zip Code*</label>
                                                <input type="text" placeholder="Zip Code">
                                            </div>
                                        </div>
                                    </div> -->
                                        <div class="order-note-block mt--30">
                                            <label for="order-note">Order notes</label>
                                            <textarea id="order-note" cols="30" rows="10" class="order-note"
                                                name="comment"
                                                placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="row">
                                        <!-- Cart Total -->
                                        <div class="col-12">
                                            <div class="checkout-cart-total">
                                                <h2 class="checkout-title">YOUR ORDER</h2>
                                                <h4>Product <span>Total</span></h4>
                                                <ul>
                                                    <?php
                                                        $subTotal = 0;
                                                        if (isset($_SESSION['cart'])) :
                                                            foreach ($_SESSION['cart'] as $product) :
                                                        ?>
                                                    <li><span class="left"><?= $product['book_title'] ?> X
                                                            <?= sprintf("%02d", $product['quantity']) ?></span><span
                                                            class="right">$<?php
                                                                                                                                                if ($product['book_price'] == $product['sale_price']) {
                                                                                                                                                    $total = $product['quantity'] * $product['book_price'];
                                                                                                                                                } else {
                                                                                                                                                    $total = $product['quantity'] * $product['sale_price'];
                                                                                                                                                }
                                                                                                                                                echo $total;
                                                                                                                                                $subTotal += $total;
                                                                                                                                                ?></span>
                                                    </li>
                                                    <?php endforeach;
                                                        endif; ?>
                                                </ul>
                                                <p>Sub Total <span>$<?= $subTotal ?></span></p>
                                                <p>Shipping Fee <span id="shipping_fee">$5.00</span>
                                                </p>
                                                <h4>Grand Total <span id="grand_total">$104.00</span></h4>
                                                <input type="hidden" name="sub_total" value="<?= $subTotal ?>">
                                                <input type="hidden" name="shipping_fee" value="">
                                                <input type="hidden" name="grand_total" value="">
                                                <!-- <div class="method-notice mt--25">
                                                    <article>
                                                        <h3 class="d-none sr-only">blog-article</h3>
                                                        Sorry, it seems that there are no available payment methods for
                                                        your state. Please contact us if you
                                                        require
                                                        assistance
                                                        or wish to make alternate arrangements.
                                                    </article>
                                                </div> -->
                                                <div class="term-block">
                                                    <input type="checkbox" id="accept_terms2" checked disabled>
                                                    <label for="accept_terms2">I’ve read and accept the terms &
                                                        conditions</label>
                                                </div>
                                                <button type="submit" name="btn-place-order"
                                                    class="place-order w-100">Place order</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                <!-- End Form place order -->
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php
    include_once './view/brands-slider.php';
    include_once './view/footer.php';
    ?>
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <script src="js/plugins.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>