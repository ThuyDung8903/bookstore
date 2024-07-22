<?php
include "includes/header.php";

$id = (isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '';
if ($id == '') {
    header("Location: orders.php");
    exit();
} else {
    //get order by id, and order detail
    $orders = getOrderById($id);
    if ($orders == null) {
        header("Location: orders.php");
        exit();
    }
}
$orders_detail = getOrdersDetail($id);
$num_item = count($orders_detail);
?>
<!-- Tạm thời bỏ chức năng sửa thông tin đơn hàng <a class="btn btn-primary" href="edit-orders.php?act=edit&id=<?php echo $orders['id'] ?>"> <i
        class="glyphicon glyphicon-pencil"></i> Edit Order</a> -->
<a class="btn btn-primary" href="orders.php"> <i class="glyphicon glyphicon-arrow-left"></i> Back to Orders List</a>
<div class="content">
    <h3>Order Detail</h3>
    <div class="row">
        <form action="update-order-status.php" method="post" enctype='multipart/form-data'>
            <input name="order_id" type="hidden" value="<?= $orders['id'] ?>">
            <input name="old_order_status_id" type="hidden" value="<?= $orders['order_status_id'] ?>">
            <label>Status </label><span class="label label-primary"><?php echo $orders['order_status'] ?></span><br>
            <label>Update status </label>
            <select class="form-control" name="order_status_id">
                <?php echo queryAllToSelect("order_status", "", "id", "description", $orders['order_status_id']) ?>
            </select>
            <br>
            <button type="submit" name="upate_order_status_btn" class="btn btn-primary">Update status</button>
        </form>
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Information</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Order ID:</th>
                            <td><strong>#<?= $orders['id'] ?></strong></td>
                        </tr>
                        <tr>
                            <th>Date created:</th>
                            <td><?php echo $orders['created_at'] ?></td>
                        </tr>
                        <tr>
                            <th>Payment method:</th>
                            <td><?php echo $orders['payment_method'] ?></td>
                        </tr>
                        <tr>
                            <th>Shipping method:</th>
                            <td><?php echo $orders['shipping_method'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Thông tin khách hàng người nhận -->
        <div class="panel panel-default">
            <div class="panel-heading">Customer</div>
            <div class="panel-body">
                <table class="table table-borderless">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Name:</th>
                            <td><?php echo $orders['shipToName'] ?></td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td><?php echo $orders['shipToPhone'] ?></td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td><?php echo $orders['shipToAddress'] ?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?php echo $orders['shipToEmail'] ?></td>
                        </tr>
                        <tr>
                            <th>Note:</th>
                            <td><?php echo $orders['comment'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Thông tin sản phẩm -->
        <div class="panel panel-default">
            <div class="panel-heading">Products</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Product name</th>
                        <th class="text-right">Quantity</th>
                        <th class="text-right">Unit Price</th>
                        <th class="text-right">Total Price</th>
                    </thead>
                    <tbody>
                        <?php
                        $total_quantity = 0;
                        $total_price = 0;
                        ?>
                        <?php for ($i = 0; $i < $num_item; $i++) : ?>
                        <tr>
                            <td class="text-middle"><?= $i + 1 ?></td>
                            <td><a class="text-primary"
                                    href="edit-book.php?act=edit&id=<?php echo $orders_detail[$i]['book_id'] ?>"
                                    target="_blank"><?= $orders_detail[$i]['book_name'] ?></a><br>
                            </td>
                            <td class="text-right"><?= $orders_detail[$i]['quantity'] ?></td>
                            <td class="text-right">
                                $<?= $orders_detail[$i]['price'] ?>
                            </td>
                            <td class="text-right">
                                $<?= $orders_detail[$i]['price'] * $orders_detail[$i]['quantity'] ?>
                            </td>
                        </tr>
                        <?php
                            $total_quantity += $orders_detail[$i]['quantity'];
                            $total_price += $orders_detail[$i]['price'] * $orders_detail[$i]['quantity'];
                            ?>
                        <?php endfor; ?>
                        <tr>
                            <th class="text-right" colspan="2">Total</th>
                            <td class="text-right"><?= $total_quantity ?></td>
                            <td class="text-right" colspan="2">$<?= $total_price ?></td>
                        </tr>
                        <tr>
                            <th class="text-right" colspan="2">Shipping cost</th>
                            <td colspan="3" class="text-right">$<?php echo $orders['shipping_fee'] ?></td>
                        </tr>
                        <tr>
                            <th class="text-right" colspan="2">Total paid</th>
                            <td colspan="3" class="text-right">$<?php echo $orders['total_bill'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-primary" href="orders.php"> <i class="glyphicon glyphicon-arrow-left"></i> Back to Orders List</a>
<?php include "includes/footer.php"; ?>