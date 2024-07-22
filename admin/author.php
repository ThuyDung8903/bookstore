<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-author.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
    Author</a>

<h1>Author</h1>
<p>This table includes <?php echo counting("author", "id"); ?> author.</p>

<table id="sorted" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author name</th>

            <th class="not">Edit</th>
            <th class="not">Delete</th>
        </tr>
    </thead>

    <?php
	$author = getAll("author");
	if ($author) foreach ($author as $authors) :
	?>
    <tr>
        <td><?php echo $authors['id'] ?></td>
        <td><?php echo $authors['author_name'] ?></td>


        <td><a href="edit-author.php?act=edit&id=<?php echo $authors['id'] ?>"><i
                    class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="save.php?act=delete&id=<?php echo $authors['id'] ?>&cat=author"
                onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>