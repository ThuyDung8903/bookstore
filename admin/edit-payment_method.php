<?php
include "includes/header.php";

$act = $_GET['act'];
if ($act == "edit") {
    $id = $_GET['id'];
    $payment_method = getById("payment_method", $id);
}
?>

<form method="post" action="save.php" enctype='multipart/form-data'>
    <fieldset>
        <legend class="hidden-first"><?= ($act == "edit") ? "Edit " : "Add New " ?>Payment method</legend>
        <input name="cat" type="hidden" value="payment_method">
        <input name="id" type="hidden" value="<?= $id ?>">
        <input name="act" type="hidden" value="<?= $act ?>">

        <label>Description</label>
        <input class="form-control" type="text" name="description" value="<?= $payment_method['description'] ?>" /><br>

        <label>Status</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="1" checked> Active<br>
            <input class="form-check-input" type="radio" name="status" value="0"
                <?php echo ($payment_method['status'] == 0) ? "checked" : ""; ?>> Not active<br>
        </div>
        <br>
        <input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>