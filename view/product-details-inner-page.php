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
<main class="inner-page-sec-padding-bottom">
    <?php foreach ($books as $book) : ?>
    <div class="container">
        <div class="row mb--60">
            <div class="col-lg-5 mb--30">
                <!-- Product Details Slider Big Image-->
                <div class="single-slide">
                    <img src="uploads/<?php echo $book['book_image']; ?>" alt="<?php echo $book['book_title']; ?>"
                        style="height: auto;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="product-details-info pl-lg--30 ">
                    <h3 class="product-title" style="font-size: 30px;"><?php echo $book['book_title']; ?></h3>
                    <ul class="list-unstyled">
                        <li>Author: <span class="list-value"><?php echo $book['author_name']; ?></span></li>
                        <li>Publisher: <span class="list-value"><?php echo $book['publisher_name']; ?></span>
                        </li>
                        <li>Category: <span class="list-value"><?php echo $book['category_name']; ?></span></li>
                    </ul>
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
                    <article class="product-details-article">
                        <h4 class="sr-only">Product Summery</h4>
                        <p><?php echo $book['short_description']; ?></p>
                    </article>
                    <div class="add-to-cart-row">
                        <div class="count-input-block">
                            <span class="widget-label">Quanity</span>
                            <input type="number" class="form-control text-center" id="quantity-add-to-cart" value="1"
                                min="1">
                        </div>
                        <div class="add-cart-btn">
                            <a id="link-add-to-cart"
                                href="./module/add-to-cart.php?book_id=<?= $book['book_id'] ?>&quantity=1"
                                class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add to
                                Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sb-custom-tab review-tab section-padding">
            <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab"
                        aria-controls="tab-1" aria-selected="true">
                        DESCRIPTION
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
                        aria-selected="true">
                        REVIEWS
                    </a>
                </li>
            </ul>
            <div class="tab-content space-db--20" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                    <article class="review-article">
                        <h1 class="sr-only">Tab Article</h1>
                        <p><?php echo $book['detail_description']; ?></p>
                    </article>
                </div>
                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                    <div class="review-wrapper">
                        <h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
                        <div class="rating-row pt-2">
                            <p class="d-block">Your Rating</p>
                            <span class="rating-widget-block">
                                <input type="radio" name="star" id="star1">
                                <label for="star1"></label>
                                <input type="radio" name="star" id="star2">
                                <label for="star2"></label>
                                <input type="radio" name="star" id="star3">
                                <label for="star3"></label>
                                <input type="radio" name="star" id="star4">
                                <label for="star4"></label>
                                <input type="radio" name="star" id="star5">
                                <label for="star5"></label>
                            </span>
                            <form action="./" class="mt--15 site-form ">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="message">Comment</label>
                                            <textarea name="message" id="message" cols="30" rows="10"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="name">Name *</label>
                                            <input type="text" id="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="text" id="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input type="text" id="website" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="submit-btn">
                                            <a href="#" class="btn btn-black">Post Comment</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <!--=================================
    RELATED BOOKS
    ===================================== -->
    <section class="">
        <div class="container">
            <div class="section-title section-title--bordered">
                <h2>RELATED BOOKS</h2>
            </div>
            <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                        "autoplay": true,
                        "autoplaySpeed": 8000,
                        "slidesToShow": 4,
                        "dots":true
                    }' data-slick-responsive='[
                        {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                        {"breakpoint":992, "settings": {"slidesToShow": 3} },
                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                        {"breakpoint":480, "settings": {"slidesToShow": 1} }
                    ]'>
                <?php foreach ($related_books as $related_book) : ?>
                <div class="single-slide">
                    <div class="product-card">
                        <div class="product-header">
                            <a href="product-details.php?book_id=<?= $related_book['book_id'] ?>" class="author">
                                <?php echo $related_book['author_name']; ?>
                            </a>
                            <h3 class="object-fit: cover"><a
                                    href="product-details.php?book_id=<?= $related_book['book_id'] ?>"
                                    style="padding: 0;text-transform: capitalize;font-size: 16px;font-weight: 600;margin-bottom: 18px;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 1;display: -webkit-box;-webkit-box-orient: vertical;"><?php echo $related_book['book_title']; ?></a>
                            </h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="uploads/<?php echo $related_book['book_image']; ?>"
                                    alt="<?php echo $related_book['book_title']; ?>"
                                    style="display: block; margin: auto; width: 90%; height: 300px;">
                                <div class="hover-contents">
                                    <div class="hover-btns">
                                        <a href="./module/add-to-cart.php?book_id=<?= $related_book['book_id'] ?>"
                                            class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="#" data-toggle="modal"
                                            data-target="#quickModal<?= $related_book['book_id'] ?>" class="single-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <?php if ($related_book['sale_price'] == $related_book['book_price']) : ?>
                                <span class="price">$<?php echo $related_book['book_price']; ?></span>
                                <?php else : ?>
                                <span class="price">$<?php echo $related_book['sale_price']; ?></span>
                                <del class="price-old">$<?php echo $related_book['book_price']; ?></del>
                                <span class="price-discount">
                                    <?php echo ceil(100 - ($related_book['sale_price'] / $related_book['book_price'] * 100)) . "%"; ?>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <?php foreach ($related_books as $related_book) : ?>
    <div class="modal fade modal-quick-view" id="quickModal<?= $related_book['book_id'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="quickModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="product-details-modal">
                    <div class="row">
                        <div class="col-lg-5">
                            <!-- Product Details Slider Big Image-->
                            <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
                                                    "slidesToShow": 1,
                                                    "arrows": false,
                                                    "fade": true,
                                                    "draggable": false,
                                                    "swipe": false,
                                                    "asNavFor": ".product-slider-nav"
                                                    }'>
                                <div class="single-slide">
                                    <img src="<?php echo "uploads/" . $related_book['book_image']; ?>"
                                        alt="<?php echo $related_book['book_title'] ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 mt--30 mt-lg--30">
                            <div class="product-details-info pl-lg--30">
                                <h3 class="product-title" style="font-size: 30px;">
                                    <?php echo $related_book['book_title']; ?></h3>
                                <ul class="list-unstyled">
                                    <li>Author: <span
                                            class="list-value"><?php echo $related_book['author_name']; ?></span></li>
                                    <li>Publisher: <span
                                            class="list-value"><?php echo $related_book['publisher_name']; ?></span>
                                    </li>
                                    <li>Category: <span
                                            class="list-value"><?php echo $related_book['category_name']; ?></span></li>
                                </ul>
                                <div class="price-block">
                                    <?php if ($related_book['sale_price'] == $related_book['book_price']) : ?>
                                    <span class="price">$<?php echo $related_book['book_price']; ?></span>
                                    <?php else : ?>
                                    <span class="price">$<?php echo $related_book['sale_price']; ?></span>
                                    <del class="price-old">$<?php echo $related_book['book_price']; ?></del>
                                    <span
                                        class="price-discount"><?php echo ceil(100 - ($related_book['sale_price'] / $related_book['book_price'] * 100)); ?>%</span>
                                    <?php endif; ?>
                                </div>
                                <article class="product-details-article">
                                    <h4 class="sr-only">Product Summery</h4>
                                    <p><?php echo $related_book['short_description']; ?></p>
                                </article>
                                <div class="add-to-cart-row">
                                    <form>
                                        <!-- <div class="count-input-block">
                                            <span class="widget-label">Quanity</span>
                                            <input type="number" class="form-control text-center" value="1" min="1">
                                        </div> -->
                                        <div class="add-cart-btn">
                                            <a href="./module/add-to-cart.php?book_id=<?= $related_book['book_id'] ?>"
                                                class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add
                                                to
                                                Cart</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="widget-social-share">
                        <span class="widget-label">Share:</span>
                        <div class="modal-social-share">
                            <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</main>