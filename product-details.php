<?php
include_once './connect/connect.php';
//lay ra tat ca danh muc
$query_cat = mysqli_query($connect, "SELECT * FROM category");
$categories = [];
while ($category = mysqli_fetch_assoc($query_cat)) {
    $categories[] = $category;
}

//lay ra 1 sach theo id
$sql = "SELECT *, book.id as book_id FROM book INNER JOIN author ON book.author_id = author.id INNER JOIN publisher ON book.publisher_id = publisher.id INNER JOIN category ON book.category_id = category.id";
if (isset($_GET['book_id']) && is_numeric($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $sql_book_by_id = $sql . " WHERE book.id = {$book_id}";
} else {
    //if has no get book_id
    header("location: shop.php");
}
$query = mysqli_query($connect, $sql_book_by_id);
$books = [];
while ($book = mysqli_fetch_array($query)) {
    $books[] = $book;
}

//get 5 ramdom related book
$sql_related_book = $sql . " WHERE category.id = " . $books[0]['category_id'] . " ORDER BY RAND() LIMIT 5";
$query = mysqli_query($connect, $sql_related_book);
$related_books = [];
while ($related_book = mysqli_fetch_array($query)) {
    $related_books[] = $related_book;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $books[0]['book_title']; ?> |Pustok Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
</head>

<body>
    <div class="site-wrapper" id="top">
        <?php
        include_once './view/site-header.php';
        include_once './view/site-mobile-menu.php';
        include_once './view/sticky-fixed-header.php';
        ?>
        <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a
                                    href="shop.php?category_id=<?php echo $books[0]['category_id']; ?>"><?php echo $books[0]['category_name']; ?></a>
                            </li>
                            <li class="breadcrumb-item active"><?php echo $books[0]['book_title']; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <?php
        include_once './view/product-details-inner-page.php';
        ?>
    </div>
    <?php
    include_once './view/brands-slider.php';
    include_once './view/footer.php';
    ?>
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <script src="js/plugins.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>