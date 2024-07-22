<?php
include "includes/header.php";

$act = $_GET['act'];
if ($act == "edit") {
    $id = $_GET['id'];
    $order_detail = getById("order_detail", $id);
}
?>

<form method="post" action="save.php" enctype='multipart/form-data'>
    <fieldset>
        <legend class="hidden-first">Add New Order_detail</legend>
        <input name="cat" type="hidden" value="order_detail">
        <input name="id" type="hidden" value="<?= $id ?>">
        <input name="act" type="hidden" value="<?= $act ?>">

        <label>Book name</label>
        <input class="form-control" type="text" name="book_name" value="<?= $order_detail['book_name'] ?>" /><br>

        <label>Price</label>
        <input class="form-control" type="text" name="price" value="<?= $order_detail['price'] ?>" /><br>

        <label>Quantity</label>
        <input class="form-control" type="text" name="quantity" value="<?= $order_detail['quantity'] ?>" /><br>
        <br>
        <input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>