<?php
include "includes/header.php";

$act = $_GET['act'];
if ($act == "edit") {
    $id = $_GET['id'];
    $users = getById("users", $id);
}
?>

<form method="post" action="save.php" enctype='multipart/form-data'>
    <fieldset>
        <legend class="hidden-first"><?= ($act == "edit") ? "Edit " : "Add New " ?>Users</legend>
        <input name="cat" type="hidden" value="users">
        <input name="id" type="hidden" value="<?= $id ?>">
        <input name="act" type="hidden" value="<?= $act ?>">

        <label>Username</label>
        <input class="form-control" type="text" name="username" value="<?= $users['username'] ?>" /><br>

        <label>Password</label>
        <input class="form-control" type="password" name="password" value="" /><br>

        <label>Fullname</label>
        <input class="form-control" type="text" name="fullname" value="<?= $users['fullname'] ?>" /><br>

        <label>Phone</label>
        <input class="form-control" type="text" name="phone" value="<?= $users['phone'] ?>" /><br>

        <label>Email</label>
        <input class="form-control" type="text" name="email" value="<?= $users['email'] ?>" /><br>

        <label>Status</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="1" checked /> Active<br>
            <input class="form-check-input" type="radio" name="status" value="0"
                <?php echo ($users['status'] == 0) ? "checked" : ""; ?> /> Not active<br>
        </div>
        <br>
        <input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>