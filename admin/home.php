<?php
include "includes/header.php";
?>
<h1>Dashboard</h1>
<p>Tables in database</p>
<table class="table table-striped">
    <tr>
        <th class="not">Table</th>
        <th class="not">Entries (Number of records)</th>
    </tr>

    <tr>
        <td><a href="author.php">Author</a></td>
        <td><?= counting("author", "id") ?></td>
    </tr>

    <tr>
        <td><a href="book.php">Book</a></td>
        <td><?= counting("book", "id") ?></td>
    </tr>

    <tr>
        <td><a href="category.php">Category</a></td>
        <td><?= counting("category", "id") ?></td>
    </tr>

    <tr>
        <td><a href="customer.php">Customer</a></td>
        <td><?= counting("customer", "id") ?></td>
    </tr>

    <tr>
        <td><a href="order_detail.php">Order_detail</a></td>
        <td><?= counting("order_detail", "id") ?></td>
    </tr>

    <tr>
        <td><a href="order_status.php">Order_status</a></td>
        <td><?= counting("order_status", "id") ?></td>
    </tr>

    <tr>
        <td><a href="orders.php">Orders</a></td>
        <td><?= counting("orders", "id") ?></td>
    </tr>

    <tr>
        <td><a href="payment_method.php">Payment_method</a></td>
        <td><?= counting("payment_method", "id") ?></td>
    </tr>

    <tr>
        <td><a href="publisher.php">Publisher</a></td>
        <td><?= counting("publisher", "id") ?></td>
    </tr>

    <tr>
        <td><a href="shipping_method.php">Shipping_method</a></td>
        <td><?= counting("shipping_method", "id") ?></td>
    </tr>

    <tr>
        <td><a href="users.php">Users</a></td>
        <td><?= counting("users", "id") ?></td>
    </tr>
</table>
<?php include "includes/footer.php"; ?>