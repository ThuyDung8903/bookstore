<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-shipping_method.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add
    New Shipping method</a>

<h1>Shipping method</h1>
<p>This table includes <?php echo counting("shipping_method", "id"); ?> shipping_method.</p>

<table id="sorted" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Description</th>
            <th>Shipping fee</th>
            <th>Status</th>

            <th class="not">Edit</th>
            <th class="not">Delete</th>
        </tr>
    </thead>

    <?php
	$shipping_method = getAll("shipping_method");
	if ($shipping_method) foreach ($shipping_method as $shipping_methods) :
	?>
    <tr>
        <td><?php echo $shipping_methods['id'] ?></td>
        <td><?php echo $shipping_methods['description'] ?></td>
        <td><?php echo $shipping_methods['shipping_fee'] ?></td>
        <td><?php echo $shipping_methods['status'] == 1 ? "1-Active" : "0-Not active" ?></td>

        <td><a href="edit-shipping_method.php?act=edit&id=<?php echo $shipping_methods['id'] ?>"><i
                    class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="save.php?act=delete&id=<?php echo $shipping_methods['id'] ?>&cat=shipping_method"
                onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>