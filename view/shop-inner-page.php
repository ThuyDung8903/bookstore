<?php
require_once 'connect/connect.php';

$pageSize = 12; //fixed page size is 12
$lineStart = 1;
$page = 1;
if ((!isset($_GET['page'])) || ($_GET['page'] == '1') || ($_GET['page'] == null)) {
    $lineStart = 0;
    $page = 1;
} else {
    $lineStart = ($_GET['page'] - 1) * $pageSize;
    $page = $_GET['page'];
}
$sql_count = "SELECT count(*) FROM book";
$sql = "SELECT *, book.id as book_id FROM book INNER JOIN author ON book.author_id = author.id INNER JOIN publisher ON book.publisher_id = publisher.id INNER JOIN category ON book.category_id = category.id";
//if get category_id
if (isset($_GET['category_id']) && is_numeric($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $sql_count .= " WHERE book.category_id = {$category_id}";
    $sql .= " WHERE book.category_id = {$category_id}";
}
//if search

$sql .= " ORDER BY book.id ASC LIMIT {$lineStart},{$pageSize}"; //default order by book.id
$query_sql_count = mysqli_query($connect, $sql_count);
$rows = mysqli_fetch_array($query_sql_count);
$totalLine = $rows[0];
$totalPage = ceil($totalLine / $pageSize);
$query_sql = mysqli_query($connect, $sql);
$books = [];
$counter = 0; //count products in this page after LIMIT
while ($book = mysqli_fetch_array($query_sql)) {
    $books[] = $book;
    $counter++;
}
?>

<main class="inner-page-sec-padding-bottom">
    <div class="container">
        <?php if ($totalLine == 0) {
            echo '<h2>No product found</h2>';
        } ?>
        <!-- Start if totalLine >0 -->
        <?php if ($totalLine > 0) : ?>
        <div class="shop-toolbar mb--30">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-4 col-sm-6 mt--10 mt-sm--0">
                    <span class="toolbar-status">
                        <?php
                            $showFrom = $lineStart + 1;
                            if ($page * $pageSize >= $totalLine) {
                                $showTo = $totalLine;
                            } else {
                                $showTo = $page * $pageSize;
                            }
                            ?>
                        Showing <?= $showFrom ?> to <?= $showTo ?> of <?= $totalLine ?>
                        (<?= $totalPage ?> Pages)
                    </span>
                </div>
                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
                    <div class="sorting-selection">
                        <span>Sort By:</span>
                        <select class="form-control nice-select sort-select mr-0">
                            <option value="" selected="selected">Default Sorting</option>
                            <option value="">Sort By:Name (A - Z)</option>
                            <option value="">Sort By:Name (Z - A)</option>
                            <option value="">Sort By:Price (Low &gt; High)</option>
                            <option value="">Sort By:Price (High &gt; Low)</option>
                            <option value="">Sort By:Rating (Highest)</option>
                            <option value="">Sort By:Rating (Lowest)</option>
                            <option value="">Sort By:Model (A - Z)</option>
                            <option value="">Sort By:Model (Z - A)</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-toolbar d-none">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-4 col-sm-6 mt--10 mt-sm--0">
                    <span class="toolbar-status">
                        <?php
                            $showFrom = $lineStart + 1;
                            if ($page * $pageSize >= $totalLine) {
                                $showTo = $totalLine;
                            } else {
                                $showTo = $page * $pageSize;
                            }
                            ?>
                        Showing <?= $showFrom ?> to <?= $showTo ?> of <?= $totalLine ?>
                        (<?= $totalPage ?> Pages)
                    </span>
                </div>
                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
                    <div class="sorting-selection">
                        <span>Sort By:</span>
                        <select class="form-control nice-select sort-select mr-0">
                            <option value="" selected="selected">Default Sorting</option>
                            <option value="">Sort
                                By:Name (A - Z)</option>
                            <option value="">Sort
                                By:Name (Z - A)</option>
                            <option value="">Sort
                                By:Price (Low &gt; High)</option>
                            <option value="">Sort
                                By:Price (High &gt; Low)</option>
                            <option value="">Sort
                                By:Rating (Highest)</option>
                            <option value="">Sort
                                By:Rating (Lowest)</option>
                            <option value="">Sort
                                By:Model (A - Z)</option>
                            <option value="">Sort
                                By:Model (Z - A)</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-product-wrap grid-four with-pagination row space-db--30 shop-border">
            <?php foreach ($books as $book) : ?>
            <div class="col-lg-4 col-sm-6">
                <div class="product-card">
                    <div class="product-grid-content">
                        <div class="product-header">
                            <a href="product-details.php?book_id=<?= $book['book_id'] ?>" class="author">
                                <?php echo $book['author_name']; ?>
                            </a>
                            <h3 class="object-fit: cover"><a href="product-details.php?book_id=<?= $book['book_id'] ?>"
                                    style="padding: 0;text-transform: capitalize;font-size: 16px;font-weight: 600;margin-bottom: 18px;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 1;display: -webkit-box;-webkit-box-orient: vertical;">
                                    <?php echo $book['book_title']; ?>
                                </a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src=<?php echo "uploads/" . $book['book_image']; ?>
                                    alt="<?php echo $book['book_title']; ?>"
                                    style="display: block; margin: auto; width: 90%; height: 300px;">
                                <div class=" hover-contents">
                                    <div class="hover-btns">
                                        <a href="./module/add-to-cart.php?book_id=<?= $book['book_id'] ?>"
                                            class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quickModal<?= $book['book_id'] ?>"
                                            class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <?php if ($book['sale_price'] == $book['book_price']) : ?>
                                <span class="price">$<?php echo $book['book_price']; ?></span>
                                <?php else : ?>
                                <span class="price">$<?php echo $book['sale_price']; ?></span>
                                <del class="price-old">$<?php echo $book['book_price']; ?></del>
                                <span
                                    class="price-discount"><?php echo ceil(100 - ($book['sale_price'] / $book['book_price'] * 100)); ?>%</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <!-- End if totalLine > -->
    </div>
    <!-- Pagination Block -->
    <div class="row pt--30">
        <div class="col-md-12">
            <div class="pagination-block">
                <?php
                //function to pass new parameter value to url
                function pass_to_url($param, $newValue = null)
                {
                    $href = '';
                    $url = $_SERVER['REQUEST_URI'];
                    $query_str = parse_url($url, PHP_URL_QUERY);
                    parse_str($query_str, $query_params);
                    $current_page = explode("?", $url);
                    $href .= $current_page[0];
                    // echo count($query_params);
                    // print_r($query_params);
                    $isFirstParam = 1;
                    $char = '?';
                    $change = 0;
                    if (isset($_GET[$param])) {
                        $query_params[$param] = $newValue;
                        $change = 1;
                    }
                    foreach ($query_params as $key => $val) {
                        if ($key != null) {
                            if ($isFirstParam == 1) {
                                $href .= $char . $key . '=' . $val;
                                $isFirstParam = 0;
                                $char = '&';
                            } else {
                                $href .= $char . $key . '=' . $val;
                            }
                        }
                    }
                    if ($change == 0 && $newValue != null) {
                        $href .= $char . $param . '=' . $newValue;
                    }
                    return $href;
                }
                ?>
                <ul class="pagination-btns flex-center">
                    <li><a href="<?php echo pass_to_url("page", 1); ?>" class="single-btn prev-btn ">|<i
                                class="zmdi zmdi-chevron-left"></i>
                        </a>
                    </li>
                    <li><a href="<?php if ($page == 1) {
                                        echo '#';
                                    } else {
                                        echo pass_to_url("page", $page - 1);
                                    } ?>" class="single-btn prev-btn "><i class="zmdi zmdi-chevron-left"></i>
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                    <li
                        <?php if ((!isset($_GET['page']) && $i == 1) || (isset($_GET['page']) && $i == $_GET['page'])) echo 'class="active"'; ?>>
                        <a href="<?php echo pass_to_url("page", $i); ?>" class="single-btn"><?= $i ?></a>
                    </li>
                    <?php endfor; ?>
                    <li><a href="<?php if ($page == $totalPage) {
                                        echo '#';
                                    } else {
                                        echo pass_to_url("page", $page + 1);
                                    } ?>" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i></a>
                    </li>
                    <li><a href="<?php echo pass_to_url("page", $totalPage); ?>" class="single-btn next-btn"><i
                                class="zmdi zmdi-chevron-right"></i>|</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</main>