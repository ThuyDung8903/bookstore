<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-payment_method.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
    Payment method</a>

<h1>Payment_method</h1>
<p>This table includes <?php echo counting("payment_method", "id"); ?> payment_method.</p>

<table id="sorted" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Description</th>
            <th>Status</th>

            <th class="not">Edit</th>
            <th class="not">Delete</th>
        </tr>
    </thead>

    <?php
	$payment_method = getAll("payment_method");
	if ($payment_method) foreach ($payment_method as $payment_methods) :
	?>
    <tr>
        <td><?php echo $payment_methods['id'] ?></td>
        <td><?php echo $payment_methods['description'] ?></td>
        <td><?php echo $payment_methods['status'] == 1 ? "1-Active" : "0-Not active" ?></td>

        <td><a href="edit-payment_method.php?act=edit&id=<?php echo $payment_methods['id'] ?>"><i
                    class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="save.php?act=delete&id=<?php echo $payment_methods['id'] ?>&cat=payment_method"
                onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>