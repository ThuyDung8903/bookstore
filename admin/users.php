<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-users.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
    Users</a>

<h1>Users</h1>
<p>This table includes <?php echo counting("users", "id"); ?> users.</p>

<table id="sorted" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Password</th>
            <th>Fullname</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Status</th>

            <th class="not">Edit</th>
            <th class="not">Delete</th>
        </tr>
    </thead>

    <?php
    $users = getAll("users");
    if ($users) foreach ($users as $userss) :
    ?>
    <tr>
        <td><?php echo $userss['id'] ?></td>
        <td><?php echo $userss['username'] ?></td>
        <td><?php echo $userss['password'] ?></td>
        <td><?php echo $userss['fullname'] ?></td>
        <td><?php echo $userss['phone'] ?></td>
        <td><?php echo $userss['email'] ?></td>
        <td><?php echo $userss['status'] == 1 ? "1-Active" : "0-Not active" ?></td>

        <td><a href="edit-users.php?act=edit&id=<?php echo $userss['id'] ?>"><i
                    class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="save.php?act=delete&id=<?php echo $userss['id'] ?>&cat=users"
                onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>