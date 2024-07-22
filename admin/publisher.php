<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-publisher.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
    Publisher</a>

<h1>Publisher</h1>
<p>This table includes <?php echo counting("publisher", "id"); ?> publisher.</p>

<table id="sorted" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Publisher name</th>

            <th class="not">Edit</th>
            <th class="not">Delete</th>
        </tr>
    </thead>

    <?php
	$publisher = getAll("publisher");
	if ($publisher) foreach ($publisher as $publishers) :
	?>
    <tr>
        <td><?php echo $publishers['id'] ?></td>
        <td><?php echo $publishers['publisher_name'] ?></td>


        <td><a href="edit-publisher.php?act=edit&id=<?php echo $publishers['id'] ?>"><i
                    class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="save.php?act=delete&id=<?php echo $publishers['id'] ?>&cat=publisher"
                onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>