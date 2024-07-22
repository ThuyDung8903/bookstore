<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-order_detail.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
    Order_detail</a>

<h1>Order_detail</h1>
<p>This table includes <?php echo counting("order_detail", "id"); ?> order_detail.</p>

<table id="sorted" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Orders id</th>
            <th>Book id</th>
            <th>Book name</th>
            <th>Price</th>
            <th>Quantity</th>

            <th class="not">Edit</th>
            <th class="not">Delete</th>
        </tr>
    </thead>

    <?php
    $order_detail = getAll("order_detail");
    if ($order_detail) foreach ($order_detail as $order_details) :
    ?>
    <tr>
        <td><?php echo $order_details['orders_id'] ?></td>
        <td><?php echo $order_details['book_id'] ?></td>
        <td><?php echo $order_details['book_name'] ?></td>
        <td><?php echo $order_details['price'] ?></td>
        <td><?php echo $order_details['quantity'] ?></td>
        <td><a href="edit-order_detail.php?act=edit&id=<?php echo $order_details['id'] ?>"><i
                    class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="save.php?act=delete&id=<?php echo $order_details['id'] ?>&cat=order_detail"
                onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>