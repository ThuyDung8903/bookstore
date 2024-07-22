<?php
include "includes/header.php";
?>
<style>
.table-vertical-align td {
    vertical-align: baseline !important;
}
</style>
<!-- Chức năng Thêm đơn hàng phía Admin chưa thực hiện <a class="btn btn-primary" href="edit-orders.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
    Orders</a> -->

<h1>Orders</h1>
<p>This table includes <?php echo counting("orders", "id"); ?> orders.</p>

<table id="sorted" class="table table-bordered">
    <thead>
        <tr>
            <th>OrderID</th>
            <th>Created at</th>
            <th>Username</th>
            <th>Customer</th>
            <th>Products</th>
            <th>Total Price</th>
            <th>Shipping</th>
            <th>Total bill</th>
            <th>Comment</th>
            <th>Status</th>
            <th class="not">Action</th>
        </tr>
    </thead>

    <?php
    $orders = getAllOrders();
    if ($orders) foreach ($orders as $orderss) :
    ?>
    <?php {
            $orders_detail = getOrdersDetail($orderss['id']);
            //var_dump($orders_detail);
        }
        ?>
    <tr>
        <td class="text-center">
            <p class="text-primary">#<?php echo $orderss['id'] ?></p>
        </td>
        <td><?php echo $orderss['created_at'] ?></td>
        <td><?php echo $orderss['username'] ?></td>
        <td>
            <p class="text-primary"><?php echo $orderss['shipToPhone'] ?></p>
            <?php echo $orderss['shipToName'] ?><br>
            <?php echo $orderss['shipToAddress'] ?><br>
            <?php echo $orderss['shipToEmail'] ?><br>
        </td>
        <!-- <td>Demo product 1</td>
        <td>1</td>
        <td>
            <p class="text-secondary font-weight-light">$ 99.5</p>
        </td> -->
        <td>
            <?php foreach ($orders_detail as $item) : ?>
            <small>[ID: <?= $item['book_id'] ?>]</small>
            <p><?php echo $item['book_name'] . ' |Qty: ' . $item['quantity'] . ' |$' . $item['price'] ?></p>
            <?php endforeach; ?>
        </td>
        <td class="text-right">$<?php echo $orderss['total_price'] ?></td>
        <td class="text-right">
            <p class="text-secondary">$<?php echo $orderss['shipping_fee'] ?></p>
            <p class="text-info"><?php echo $orderss['shipping_method'] ?></p>

        </td>
        <td class="text-right">
            <p class="text-primary">$ <?php echo $orderss['total_bill'] ?></p>
            <p class="text-info"><?php echo $orderss['payment_method'] ?></p>
        </td>
        <td><?php echo $orderss['comment'] ?></td>
        <td><?php echo $orderss['order_status'] ?></td>
        <td>
            <a href="view-orders-detail.php?id=<?php echo $orderss['id'] ?>" target="blank"><i
                    class="glyphicon glyphicon-list-alt"></i></a>
            <!-- Tạm thời bỏ chức năng sửa thông tin đơn hàng <a href="edit-orders.php?act=edit&id=<?php echo $orderss['id'] ?>"><i
                    class="glyphicon glyphicon-edit"></i></a> -->
            <a href="save.php?act=delete&id=<?php echo $orderss['id'] ?>&cat=orders"
                onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>