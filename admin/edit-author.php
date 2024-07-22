<?php
include "includes/header.php";

$act = $_GET['act'];
if ($act == "edit") {
    $id = $_GET['id'];
    $author = getById("author", $id);
}
?>

<form method="post" action="save.php" enctype='multipart/form-data'>
    <fieldset>
        <legend class="hidden-first"><?= ($act == "edit") ? "Edit " : "Add New " ?>Author</legend>
        <input name="cat" type="hidden" value="author">
        <input name="id" type="hidden" value="<?= $id ?>">
        <input name="act" type="hidden" value="<?= $act ?>">

        <label>Author name</label>
        <input class="form-control" type="text" name="author_name" value="<?= $author['author_name'] ?>" /><br>
        <br>
        <input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>