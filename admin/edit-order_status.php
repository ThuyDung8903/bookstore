<?php
include "includes/header.php";

$act = $_GET['act'];
if ($act == "edit") {
    $id = $_GET['id'];
    $order_status = getById("order_status", $id);
}
?>

<form method="post" action="save.php" enctype='multipart/form-data'>
    <fieldset>
        <legend class="hidden-first"><?= ($act == "edit") ? "Edit " : "Add New " ?>Order status</legend>
        <input name="cat" type="hidden" value="order_status">
        <input name="id" type="hidden" value="<?= $id ?>">
        <input name="act" type="hidden" value="<?= $act ?>">

        <label>Description</label>
        <input class="form-control" type="text" name="description" value="<?= $order_status['description'] ?>" /><br>
        <br>
        <input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>