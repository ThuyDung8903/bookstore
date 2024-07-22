<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-book.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Book</a>

<h1>Book</h1>
<p>This table includes <?php echo counting("book", "id"); ?> book.</p>

<table id="sorted" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Book title</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Category</th>
            <th>Book price</th>
            <th>Sale price</th>
            <!-- <th>Short description</th> -->
            <th>Book image</th>
            <!-- <th>Detail description</th> -->
            <th>Book status</th>
            <th>Is best seller</th>
            <th>Is featured product</th>
            <th>Is new arrival</th>

            <th class="not">Edit</th>
            <th class="not">Delete</th>
        </tr>
    </thead>

    <?php
    $query = "SELECT *, book.id as id FROM book INNER JOIN author ON book.author_id = author.id INNER JOIN publisher ON book.publisher_id = publisher.id INNER JOIN category ON book.category_id = category.id";
    $book = qSELECT($query);
    if ($book) foreach ($book as $books) :
    ?>
    <tr>
        <td><?php echo $books['id'] ?></td>
        <td><?php echo $books['book_title'] ?></td>
        <td><?php echo $books['author_name']; ?></td>
        <td><?php echo $books['publisher_name'] ?></td>
        <td><?php echo $books['category_name'] ?></td>
        <td><?php echo $books['book_price'] ?></td>
        <td><?php echo $books['sale_price'] ?></td>
        <!-- <td><?php echo $books['short_description'] ?></td> -->
        <td>
            <?php if ($books['book_image'] != null) : ?>
            <img width="70px" src=<?php echo UPLOAD_PATH . $books['book_image']; ?>
                alt="<?php echo $books['book_title']; ?>">
            <?php endif; ?>
        </td>

        <!-- <td><?php echo $books['detail_description'] ?></td> -->
        <td><?php echo $books['book_status'] == 1 ? "1-In stock" : "0-Out of stock" ?></td>
        <td><?php echo $books['is_best_seller'] == 1 ? "1-Yes" : "0-No" ?></td>
        <td><?php echo $books['is_featured_product'] == 1 ? "1-Yes" : "0-No" ?></td>
        <td><?php echo $books['is_new_arrival'] == 1 ? "1-Yes" : "0-No" ?></td>

        <td><a href="edit-book.php?act=edit&id=<?php echo $books['id'] ?>"><i class="glyphicon glyphicon-edit"></i></a>
        </td>
        <td><a href="save.php?act=delete&id=<?php echo $books['id'] ?>&cat=book"
                onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>