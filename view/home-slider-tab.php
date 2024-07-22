<?php
require_once 'connect/connect.php';
$sql = "SELECT *, book.id as book_id FROM book INNER JOIN author ON book.author_id = author.id INNER JOIN publisher ON book.publisher_id = publisher.id INNER JOIN category ON book.category_id = category.id";
$query = mysqli_query($connect, $sql);
$books = [];
while ($book = mysqli_fetch_assoc($query)) {
    $books[] = $book;
}
?>
<!--=================================
    Home Slider Tab
    ===================================== -->
<section class="section-padding">
    <h2 class="sr-only">Home Tab Slider Section</h2>
    <div class="container">
        <div class="sb-custom-tab">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop" role="tab"
                        aria-controls="shop" aria-selected="true">
                        Best-Sellers
                    </a>
                    <span class="arrow-icon"></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="men-tab" data-toggle="tab" href="#men" role="tab" aria-controls="men"
                        aria-selected="true">
                        Featured Products
                    </a>
                    <span class="arrow-icon"></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="woman-tab" data-toggle="tab" href="#woman" role="tab" aria-controls="woman"
                        aria-selected="false">
                        New Arrivals
                    </a>
                    <span class="arrow-icon"></span>
                </li>
            </ul>
            <!-- Best-seller -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                    <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"
                        data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 5,
                            "rows":2,
                            "dots":true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>
                        <?php foreach ($books as $book) : ?>
                        <?php if ($book['is_best_seller'] == 1) : ?>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="product-details.php?book_id=<?= $book['book_id'] ?>" class="author">
                                        <?php echo $book['author_name']; ?>
                                    </a>
                                    <h3 class="object-fit: cover"><a
                                            href="product-details.php?book_id=<?= $book['book_id'] ?>"
                                            style="padding: 0;text-transform: capitalize;font-size: 16px;font-weight: 600;margin-bottom: 18px;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 1;display: -webkit-box;-webkit-box-orient: vertical;">
                                            <?php echo $book['book_title']; ?>
                                        </a>
                                    </h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image cover object">
                                        <img src=<?php echo "uploads/" . $book['book_image']; ?>
                                            alt="<?php echo $book['book_title']; ?>" width="90%" height="250px"
                                            style="display: block; margin: auto;">
                                        <div class="hover-contents">
                                            <div class="hover-btns">
                                                <a href="./module/add-to-cart.php?book_id=<?= $book['book_id'] ?>"
                                                    class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
                                                <a href="#" data-toggle="modal"
                                                    data-target="#quickModal<?= $book['book_id'] ?>" class="single-btn">
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
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="tab-pane" id="men" role="tabpanel" aria-labelledby="men-tab">
                    <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"
                        data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 5,
                                        "rows":2,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                        <?php foreach ($books as $book) : ?>
                        <?php if ($book['is_featured_product'] == 1) : ?>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="product-details.php?book_id=<?= $book['book_id'] ?>" class="author">
                                        <?php echo $book['author_name']; ?>
                                    </a>
                                    <h3 class="object-fit: cover"><a
                                            href="product-details.php?book_id=<?= $book['book_id'] ?>"
                                            style="padding: 0;text-transform: capitalize;font-size: 16px;font-weight: 600;margin-bottom: 18px;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 1;display: -webkit-box;-webkit-box-orient: vertical;">
                                            <?php echo $book['book_title']; ?>
                                        </a>
                                    </h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image cover object">
                                        <img src=<?php echo "uploads/" . $book['book_image']; ?>
                                            alt="<?php echo $book['book_title']; ?>" width="90%" height="250px"
                                            style="display: block; margin: auto;">
                                        <div class="hover-contents">
                                            <div class="hover-btns">
                                                <a href="./module/add-to-cart.php?book_id=<?= $book['book_id'] ?>"
                                                    class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
                                                <a href="#" data-toggle="modal"
                                                    data-target="#quickModal<?= $book['book_id'] ?>" class="single-btn">
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
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="tab-pane" id="woman" role="tabpanel" aria-labelledby="woman-tab">
                    <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"
                        data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 5,
                                        "rows":2,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                        <?php foreach ($books as $book) : ?>
                        <?php if ($book['is_new_arrival'] == 1) : ?>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="product-details.php?book_id=<?= $book['book_id'] ?>" class="author">
                                        <?php echo $book['author_name']; ?>
                                    </a>
                                    <h3 class="object-fit: cover"><a
                                            href="product-details.php?book_id=<?= $book['book_id'] ?>"
                                            style="padding: 0;text-transform: capitalize;font-size: 16px;font-weight: 600;margin-bottom: 18px;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 1;display: -webkit-box;-webkit-box-orient: vertical;">
                                            <?php echo $book['book_title']; ?>
                                        </a>
                                    </h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image cover object">
                                        <img src=<?php echo "uploads/" . $book['book_image']; ?>
                                            alt="<?php echo $book['author_name']; ?>" width="90%" height="250px"
                                            style="display: block; margin: auto;">
                                        <div class="hover-contents">
                                            <div class="hover-btns">
                                                <a href="./module/add-to-cart.php?book_id=<?= $book['book_id'] ?>"
                                                    class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
                                                <a href="#" data-toggle="modal"
                                                    data-target="#quickModal<?= $book['book_id'] ?>" class="single-btn">
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
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>