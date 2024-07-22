<?php
if (!isset($_GET['order_id']) || !is_numeric($_GET['order_id'])) {
	header('location: index.php');
	exit();
} else {
	$order_id = $_GET['order_id'];
};
?>
<!-- Template order-complete -->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Order complete |Pustok Book Store</title>
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
                            <li class="breadcrumb-item active">Order Complete</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- order complete Page Start -->
        <section class="order-complete inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row">
                    <?php
					$order = getOrderById($order_id);
					$orders_detail = getOrdersDetail($order['id']);
					$subTotal = 0;
					$total_quantity = 0;
					?>
                    <div class="col-12">
                        <div class="order-complete-message text-center">
                            <h1>Thank you !</h1>
                            <p>Your order has been received.</p>
                        </div>
                        <ul class="order-details-list">
                            <li>Order Number: <strong><?= $order['id'] ?></strong></li>
                            <li>Date: <strong><?= $order['created_at'] ?></strong></li>
                            <li>Total: <strong>$<?= $order['total_bill'] ?></strong></li>
                            <li>Payment Method: <strong><?= $order['payment_method'] ?></strong></li>
                            <li>Shipping Method: <strong><?= $order['shipping_method'] ?></strong></li>
                        </ul>
                        <!-- <p>Pay with cash upon delivery.</p> -->
                        <h3 class="order-table-title">Order Details</h3>
                        <div class="table-responsive">
                            <table class="table order-details-table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									foreach ($orders_detail as $item) :
									?>
                                    <tr>
                                        <td><a
                                                href="product-details.php?book_id=<?= $item['book_id'] ?>"><?= $item['book_name'] ?></a>
                                            <strong>×
                                                <?= $item['quantity'] ?></strong>
                                        </td>
                                        <td><span>$<?php $subTotal +=	$item['price'] * $item['quantity'];
														$total_quantity += $item['quantity'];
														echo number_format($item['price'] * $item['quantity'], 2); ?></span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Subtotal:<strong>(<?= $total_quantity ?> item)</strong></th>
                                        <td><span>$<?php echo number_format($subTotal, 2) ?></span></td>
                                    </tr>
                                    <tr>
                                        <th>Shipping fee:</th>
                                        <td>$<?= number_format($order['shipping_fee'], 2) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Grand Total:</th>
                                        <td><span>$<?= number_format($order['total_bill'], 2) ?></span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div><br><a class="btn btn--primary" href="index.php">Go to home page</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- order complete Page End -->
    </div>
    <!--=================================
  Brands Slider
===================================== -->
    <?php
	include_once 'view/brands-slider.php';
	include_once 'view/footer.php';
	?>
    <!--=================================
    Footer Area
===================================== -->

    <!-- Use Minified Plugins Version For Fast Page Load -->
    <script src="js/plugins.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>