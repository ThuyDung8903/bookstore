<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-order_status.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
    Order status</a>

<h1>Order_status</h1>
<p>This table includes <?php echo counting("order_status", "id"); ?> order_status.</p>

<table id="sorted" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Description</th>

            <th class="not">Edit</th>
            <th class="not">Delete</th>
        </tr>
    </thead>

    <?php
    $order_status = getAll("order_status");
    if ($order_status) foreach ($order_status as $order_statuss) :
    ?>
    <tr>
        <td><?php echo $order_statuss['id'] ?></td>
        <td><?php echo $order_statuss['description'] ?></td>


        <td>
            <a href="edit-order_status.php?act=edit&id=<?php echo $order_statuss['id'] ?>"><i
                    class="glyphicon glyphicon-edit"></i></a>
        </td>
        <td><a href="save.php?act=delete&id=<?php echo $order_statuss['id'] ?>&cat=order_status"
                onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>