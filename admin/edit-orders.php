<?php
include "includes/header.php";

$act = $_GET['act'];
if ($act == "edit") {
    $id = $_GET['id'];
    $orders = getById("orders", $id);
}
?>

<form method="post" action="save.php" enctype='multipart/form-data'>
    <fieldset>
        <legend class="hidden-first"><?= ($act == "edit") ? "Edit " : "Add New " ?>Orders</legend>
        <input name="cat" type="hidden" value="orders">
        <input name="id" type="hidden" value="<?= $id ?>">
        <input name="act" type="hidden" value="<?= $act ?>">

        <label>Order status id</label>
        <input class="form-control" type="text" name="order_status_id" value="<?= $orders['order_status_id'] ?>" /><br>

        <label>Customer id</label>
        <input class="form-control" type="text" name="customer_id" value="<?= $orders['customer_id'] ?>" /><br>

        <label>Shipping method id</label>
        <input class="form-control" type="text" name="shipping_method_id"
            value="<?= $orders['shipping_method_id'] ?>" /><br>

        <label>Payment method id</label>
        <input class="form-control" type="text" name="payment_method_id"
            value="<?= $orders['payment_method_id'] ?>" /><br>

        <label>Order date</label>
        <input class="form-control" type="text" name="created_at" value="<?= $orders['created_at'] ?>" /><br>

        <label>Total price</label>
        <input class="form-control" type="text" name="total_price" value="<?= $orders['total_price'] ?>" /><br>

        <label>Shipping fee</label>
        <input class="form-control" type="text" name="shipping_fee" value="<?= $orders['shipping_fee'] ?>" /><br>

        <label>Total bill</label>
        <input class="form-control" type="text" name="total_bill" value="<?= $orders['total_bill'] ?>" /><br>

        <label>ShipToName</label>
        <input class="form-control" type="text" name="shipToName" value="<?= $orders['shipToName'] ?>" /><br>

        <label>ShipToPhone</label>
        <input class="form-control" type="text" name="shipToPhone" value="<?= $orders['shipToPhone'] ?>" /><br>

        <label>ShipToAddress</label>
        <textarea class="ckeditor form-control" name="shipToAddress"><?= $orders['shipToAddress'] ?></textarea><br>

        <label>ShipToEmail</label>
        <input class="form-control" type="text" name="shipToEmail" value="<?= $orders['shipToEmail'] ?>" /><br>
        <br>

        <label>Comment</label>
        <input class="form-control" type="text" name="comment" value="<?= $orders['comment'] ?>" /><br>
        <br>
        <input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>