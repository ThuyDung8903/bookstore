<!-- Cart Page Start -->
<?php
require_once './connect/connect.php';
?>
<main class="cart-page-main-block inner-page-sec-padding-bottom">
    <div class="cart_area cart-area-padding">
        <div class="container">
            <div class="page-section-title">
                <h1>Shopping Cart</h1>
            </div>
            <?php if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) : ?>
            <div class="row">
                <div class="col-12">
                    <form action="#" method="POST">
                        <!-- Cart Table -->
                        <div class="cart-table table-responsive mb--40">
                            <table class="table">
                                <!-- Head Row -->
                                <thead>
                                    <tr>
                                        <th class="pro-remove"></th>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Product Row -->
                                    <?php if (isset($_SESSION['cart'])) : ?>
                                    <?php foreach ($_SESSION['cart'] as $product) : ?>
                                    <tr>
                                        <td class="pro-remove">
                                            <a
                                                href="module/update-cart.php?book_id=<?= $product['id'] ?>&remove=<?= $product['id'] ?>&quantity=0"><i
                                                    class="far fa-trash-alt" style="font-size: 20px;"></i></a>
                                        </td>
                                        <td class="pro-thumbnail">
                                            <a href="product-details.php?book_id=<?= $product['id'] ?>"><img
                                                    src="./uploads/<?php echo $product['book_image']; ?>"
                                                    alt="<?php echo $product['book_title']; ?>" /></a>
                                        </td>
                                        <td class="pro-title">
                                            <a href="product-details.php?book_id=<?= $product['id'] ?>"
                                                target="blank"><?php echo $product['book_title']; ?></a>
                                        </td>
                                        <?php if ($product['book_price'] == $product['sale_price']) { ?>
                                        <td class="pro-price"><span>$<?php echo $product['book_price']; ?></span></td>
                                        <?php } else { ?>
                                        <td class="pro-price"><span>$<?php echo $product['sale_price']; ?></span></td>
                                        <?php } ?>
                                        <!-- <td class="pro-quantity">
                                                    <div class="pro-qty" style="margin: 0px 0px 0px 16px;">
                                                        <div class="count-input-block">
                                                            <a href="update-cart.php?book_id=<?= $product['id'] ?>&quantity=-1">
                                                                <button class="w3-button-sm w3-light-gray" style="width: 30px; height: 30px;">-</button>
                                                            </a>

                                                            <input type="number" style="padding: 0; width: 30px; height: 30px;" class="form-control text-center" name="quantity<?= $product['id'] ?>" value="<?php echo $product['quantity']; ?>">

                                                            <a href="update-cart.php?book_id=<?= $product['id'] ?>&quantity=1">
                                                                <button class="w3-button-sm w3-light-gray" style="width: 30px; height: 30px;">+</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td> -->
                                        <td>
                                            <div class="buttons_added">
                                                <a
                                                    href="module/update-cart.php?book_id=<?= $product['id'] ?>&quantity=-1">
                                                    <input class="minus is-form" type="button" value="-">
                                                </a>

                                                <input aria-label="quantity" class="input-qty" min="1" name="quantity"
                                                    type="number" value="<?php echo $product['quantity']; ?>" disabled>

                                                <a
                                                    href="module/update-cart.php?book_id=<?= $product['id'] ?>&quantity=1">
                                                    <input class="plus is-form" type="button" value="+">
                                                </a>
                                            </div>
                                        </td>
                                        <?php if ($product['book_price'] == $product['sale_price']) { ?>
                                        <td class="pro-subtotal">
                                            <span>$<?php echo $product['book_price'] * $product['quantity']; ?></span>
                                        </td>
                                        <?php } else { ?>
                                        <td class="pro-subtotal">
                                            <span>$<?php echo $product['sale_price'] * $product['quantity']; ?></span>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                    <!-- Discount Row  -->
                                    <tr>
                                        <td colspan="6" class="actions">
                                            <div class="update-block text-right">
                                                <input type="submit" class="btn btn-outlined" name="update_cart"
                                                    value="Update cart">
                                                <!-- <input type="hidden" id="_wpnonce" name="_wpnonce" value="05741b501f"><input type="hidden" name="_wp_http_referer" value="/petmark/cart/"> -->
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-section-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb--30 mb-lg--0">
                    <!-- slide Block 5 / Normal Slider -->
                    <div class="cart-block-title">
                        <!-- <h2>YOU MAY BE INTERESTED IN…</h2> -->
                    </div>
                    <div class="product-slider sb-slick-slider" data-slick-setting='{
							          "autoplay": true,
							          "autoplaySpeed": 8000,
							          "slidesToShow": 2}' data-slick-responsive='[
                                                                                    {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                                                                    {"breakpoint":768, "settings": {"slidesToShow": 3} },
                                                                                    {"breakpoint":575, "settings": {"slidesToShow": 2} },
                                                                                    {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                                                                    {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                                                                ]'>
                    </div>
                </div>
                <!-- Cart Summary -->
                <div class="col-lg-6 col-12 d-flex">
                    <div class="cart-summary">
                        <div class="cart-summary-wrap">
                            <h4 style="font-size: 30px;"><span>Cart Summary</span></h4>
                            <?php
                            $subTotal = 0;
                            foreach ($_SESSION['cart'] as $product) : ?>
                            <?php if ($product['book_price'] == $product['sale_price']) {
                                    $total = $product['quantity'] * $product['book_price'];
                                } else {
                                    $total = $product['quantity'] * $product['sale_price'];
                                }
                                $subTotal += $total;
                                ?>
                            <?php endforeach; ?>
                            <p style="font-size: 20px;">Sub Total <span
                                    class=" text-primary">$<?php echo $subTotal; ?></span></p>
                        </div>
                        <div class="cart-summary-button">
                            <a href="checkout.php" class="checkout-btn c-btn btn--primary">Checkout</a>
                            <!-- <button class="update-btn c-btn btn-outlined">
                                Update Cart
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if (!isset($_SESSION['cart']) || $_SESSION['cart'] == null) : ?>
    <div>
        <h2>No product in cart</h2>
        <div><a class="btn btn--primary" href="shop.php">Back to Shop</a></div>
    </div>
    <?php endif; ?>
</main>
<style>
.buttons_added {
    opacity: 1;
    display: inline-block;
    display: -ms-inline-flexbox;
    display: inline-flex;
    white-space: nowrap;
    vertical-align: top;
}

.is-form {
    overflow: hidden;
    position: relative;
    background-color: #f9f9f9;
    height: 2.2rem;
    width: 2rem;
    padding: 0;
    text-shadow: 1px 1px 1px #fff;
    border: 1px solid #ddd;
}

.is-form:focus,
.input-text:focus {
    outline: none;
}

.is-form.minus {
    border-radius: 4px 0 0 4px;
}

.is-form.plus {
    border-radius: 0 4px 4px 0;
}

.input-qty {
    background-color: #fff;
    width: 2rem;
    height: 2.2rem;
    text-align: center;
    font-size: 1rem;
    display: inline-block;
    vertical-align: top;
    margin: 0;
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    border-left: 0;
    border-right: 0;
    padding: 0;
}

.input-qty::-webkit-outer-spin-button,
.input-qty::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>
<!-- Cart Page End -->