<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-category.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
    Category</a>

<h1>Category</h1>
<p>This table includes <?php echo counting("category", "id"); ?> category.</p>

<table id="sorted" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Category name</th>
            <th>Status</th>

            <th class="not">Edit</th>
            <th class="not">Delete</th>
        </tr>
    </thead>

    <?php
	$category = getAll("category");
	if ($category) foreach ($category as $categorys) :
	?>
    <tr>
        <td><?php echo $categorys['id'] ?></td>
        <td><?php echo $categorys['category_name'] ?></td>
        <td><?php echo $categorys['status'] == 1 ? "1-Active" : "0-Not active" ?></td>


        <td><a href="edit-category.php?act=edit&id=<?php echo $categorys['id'] ?>"><i
                    class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="save.php?act=delete&id=<?php echo $categorys['id'] ?>&cat=category"
                onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>