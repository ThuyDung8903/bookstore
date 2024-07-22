<!-- Modal -->
<?php
require_once './connect/connect.php';
$sql = "SELECT *, book.id as book_id FROM book INNER JOIN author ON book.author_id = author.id INNER JOIN publisher ON book.publisher_id = publisher.id INNER JOIN category ON book.category_id = category.id";
$query = mysqli_query($connect, $sql);
$books = [];
while ($book = mysqli_fetch_assoc($query)) {
    $books[] = $book;
}
?>

<?php foreach ($books as $book) : ?>
<div class="modal fade modal-quick-view" id="quickModal<?= $book['book_id'] ?>" tabindex="-1" role="dialog"
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
                                <img src="<?php echo "uploads/" . $book['book_image']; ?>"
                                    alt="<?php echo $book['book_title'] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 mt--30 mt-lg--30">
                        <div class="product-details-info pl-lg--30">
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
                                <!-- <div class="count-input-block">
                                        <span class="widget-label">Quanity</span>
                                        <input type="number" class="form-control text-center" value="1">
                                    </div> -->
                                <div class="add-cart-btn">
                                    <a href="./module/add-to-cart.php?book_id=<?= $book['book_id'] ?>"
                                        class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add to
                                        Cart</a>
                                </div>
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