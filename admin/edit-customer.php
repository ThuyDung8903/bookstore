<?php
include "includes/header.php";

$act = $_GET['act'];
if ($act == "edit") {
    $id = $_GET['id'];
    $customer = getById("customer", $id);
}
?>

<form method="post" action="save.php" enctype='multipart/form-data'>
    <fieldset>
        <legend class="hidden-first"><?= ($act == "edit") ? "Edit " : "Add New " ?>Customer</legend>
        <input name="cat" type="hidden" value="customer">
        <input name="id" type="hidden" value="<?= $id ?>">
        <input name="act" type="hidden" value="<?= $act ?>">

        <label>Username</label>
        <input class="form-control" type="text" name="username" value="<?= $customer['username'] ?>" readonly /><br>

        <label>Password</label>
        <input class="form-control" type="password" name="password" value="" readonly /><br>

        <label>Fullname</label>
        <input class="form-control" type="text" name="fullname" value="<?= $customer['fullname'] ?>" /><br>

        <label>Address</label>
        <input class="form-control" type="text" name="address" value="<?= $customer['address'] ?>" /><br>

        <label>Phone</label>
        <input class="form-control" type="text" name="phone" value="<?= $customer['phone'] ?>" /><br>

        <label>Email</label>
        <input class="form-control" type="text" name="email" value="<?= $customer['email'] ?>" /><br>
        <br>
        <input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>