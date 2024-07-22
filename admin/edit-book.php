<?php
include "includes/header.php";

$act = $_GET['act'];
if ($act == "edit") {
    $id = $_GET['id'];
    $book = getById("book", $id);
}
?>

<form method="post" action="save.php" enctype='multipart/form-data'>
    <fieldset>
        <legend class="hidden-first"><?= ($act == "edit") ? "Edit " : "Add New " ?>Book</legend>
        <input name="cat" type="hidden" value="book">
        <input name="id" type="hidden" value="<?= $id ?>">
        <input name="act" type="hidden" value="<?= $act ?>">

        <label>Book title</label>
        <input class="form-control" type="text" name="book_title" value="<?= $book['book_title'] ?>" required /><br>

        <label>Book image</label>
        <input class="form-control" type="file" value="" id="book_image" name="book_image" accept="image/*"><br>

        <label>Author</label>
        <div class="form-group">
            <select class="form-control" name="author_id" id="">
                <?php echo queryAllToSelect("author", "", "id", "author_name", $book['author_id']) ?>
            </select>
        </div>
        <!-- <input class="form-control" type="text" name="author_id" value="<?= $book['author_id'] ?>" /><br> -->

        <label>Publisher</label>
        <!-- <input class="form-control" type="text" name="publisher_id" value="<?= $book['publisher_id'] ?>" /><br> -->
        <div class="form-group">
            <select class="form-control" name="publisher_id" id="">
                <?php echo queryAllToSelect("publisher", "", "id", "publisher_name", $book['publisher_id']) ?>
            </select>
        </div>

        <label>Category</label>
        <!-- <input class="form-control" type="text" name="category_id" value="<?= $book['category_id'] ?>" /><br> -->
        <div class="form-group">
            <select class="form-control" name="category_id" id="">
                <?php echo queryAllToSelect("category", "", "id", "category_name", $book['category_id']) ?>
            </select>
        </div>

        <label>Book price</label>
        <input class="form-control" type="text" name="book_price" value="<?= $book['book_price'] ?>" /><br>

        <label>Sale price</label>
        <input class="form-control" type="text" name="sale_price" value="<?= $book['sale_price'] ?>" /><br>

        <label>Short description</label>
        <textarea class="form-control" name="short_description" id=""
            rows="3"><?= $book['short_description'] ?></textarea><br>


        <label>Detail description</label>
        <textarea class="form-control" id="editor"
            name="detail_description"><?= $book['detail_description'] ?></textarea><br>


        <!-- <label>Is best seller</label>
        <input class="form-control" type="text" name="is_best_seller" value="<?= $book['is_best_seller'] ?>" /><br>

        <label>Is featured product</label>
        <input class="form-control" type="text" name="is_featured_product"
            value="<?= $book['is_featured_product'] ?>" /><br>

        <label>Is new arrival</label>
        <input class="form-control" type="text" name="is_new_arrival" value="<?= $book['is_new_arrival'] ?>" /><br>
        <br> -->

        <div class="form-group">
            <div class="form-check">
                <label>Is best seller?</label>
                <input class="form-check-input" type="radio" name="is_best_seller" id="is_best_seller_1" value="1"
                    <?php if ($book['is_best_seller'] == "1") echo "checked"; ?>>
                <label class="form-check-label" for="is_best_seller_1">Yes</label>
                <input class="form-check-input" type="radio" name="is_best_seller" id="is_best_seller_0" value="0"
                    <?php if ($book['is_best_seller'] == "0") echo "checked"; ?>>
                <label class="form-check-label" for="is_best_seller_0">No</label>
            </div>
            <div class="form-check">
                <label>Is featured product?</label>
                <input class="form-check-input" type="radio" name="is_featured_product" id="is_featured_product_1"
                    value="1" <?php if ($book['is_featured_product'] == "1") echo "checked"; ?>>
                <label class="form-check-label" for="is_featured_product_1">Yes</label>
                <input class="form-check-input" type="radio" name="is_featured_productr" id="is_featured_product_0"
                    value="0" <?php if ($book['is_featured_product'] == "0") echo "checked"; ?>>
                <label class="form-check-label" for="is_featured_product_0">No</label>
            </div>
            <div class="form-check">
                <label>Is new arrival?</label>
                <input class="form-check-input" type="radio" name="is_new_arrival" id="is_new_arrival_1" value="1"
                    <?php if ($book['is_new_arrival'] == "1") echo "checked"; ?>>
                <label class="form-check-label" for="is_new_arrival_1">Yes</label>
                <input class="form-check-input" type="radio" name="is_new_arrival" id="is_new_arrival_0" value="0"
                    <?php if ($book['is_new_arrival'] == "0") echo "checked"; ?>>
                <label class="form-check-label" for="is_new_arrival_0">No</label>
            </div>
        </div>

        <label>Book status</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="book_status" value="1"
                <?php if ($book['book_status'] == "1") echo "checked"; ?> /> In stock<br>
            <input class="form-check-input" type="radio" name="book_status" value="0"
                <?php if ($book['book_status'] == "0") echo "checked"; ?> /> Out of stock<br>
        </div>
        <br>

        <input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>