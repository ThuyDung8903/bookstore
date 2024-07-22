<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-customer.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
    Customer</a>

<h1>Customer</h1>
<p>This table includes <?php echo counting("customer", "id"); ?> customer.</p>

<table id="sorted" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Fullname</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>

            <th class="not">Edit</th>
            <th class="not">Delete</th>
        </tr>
    </thead>

    <?php
	$customer = getAll("customer");
	if ($customer) foreach ($customer as $customers) :
	?>
    <tr>
        <td><?php echo $customers['id'] ?></td>
        <td><?php echo $customers['username'] ?></td>
        <td><?php echo $customers['fullname'] ?></td>
        <td><?php echo $customers['address'] ?></td>
        <td><?php echo $customers['phone'] ?></td>
        <td><?php echo $customers['email'] ?></td>


        <td><a href="edit-customer.php?act=edit&id=<?php echo $customers['id'] ?>"><i
                    class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="save.php?act=delete&id=<?php echo $customers['id'] ?>&cat=customer"
                onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>