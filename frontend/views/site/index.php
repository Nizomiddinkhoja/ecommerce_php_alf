
<?php include_once __DIR__ . "/../header.php" ?>

<div id="banner-container" class="width1024">
    <div id="slider">
        <div class="slides">
            <div class="slide"><a href="#"><img src="imgs/banner1.jpg" alt=""></a></div>
            <div class="slide"><a href="#"><img src="imgs/banner2.jpg" alt=""></a></div>
            <div class="slide"><a href="#"><img src="imgs/banner2.jpg" alt=""></a></div>
        </div>
        <a href="#" class="banner-btn btn-left"><span></span><img src="imgs/banner_arrow_left.png" alt=""></a>
        <a href="#" class="banner-btn btn-right"><span></span><img src="imgs/banner_arrow_right.png" alt=""></a>

    </div>
    <div id="rand-product-banner">
        <h3>Deal of the Month</h3>
        <div class="slugan">The human Face of Big Data</div>
        <div class="pic"><a href="#"><img src="/shop/frontend/imgs/book01.jpg" alt=""></a></div>
        <div class="price">
            <span>Save 45% Today</span>
            <b>$123.0</b>
        </div>
        <div class="btn-buy">
            <a href="#">Buy now</a>
        </div>
    </div>
</div>
<div id="content" class="width1024">

    <?php
    include_once __DIR__."/../sidebar.php"
    ?>
    <div class="body">
        <div class="bookmarks desktop-element">
            <ul>
                <li class="active"><a href="#">Best sellers</a></li>
                <li><a href="#">New Arrivals</a></li>
                <li><a href="#">Used Books</a></li>
                <li><a href="#">Special Offers</a></li>
            </ul>
        </div>
        <div class="bookmarks-mobile mobile-element">
            <select onchange="document.location=this.value">
                <option value="#">Best sellers</option>
                <option value="#">New Arrivals</option>
                <option value="#">Used Books</option>
                <option value="#">Special Offers</option>
            </select>
        </div>
        <div id="products-list">
            <ul>
                <?php for ($i = 0; $i < sizeof($all_result); $i++):

                    if ($i % 5 === 0) echo "</ul><ul>"
                    ?>
                    <li>
                        <img src="/shop/frontend/imgs/sale30.png" alt="">
                        <a href="/shop/frontend/index.php?model=product&action=view&id=<?= $all_result[$i]['id'] ?>"><img
                                    src="/shop/uploads/products/<?= $all_result[$i]['picture'] ?>" alt=""></a>
                        <h4>
                            <a href="/shop/frontend/index.php?model=product&action=view&id=<?= $all_result[$i]['id'] ?>"><?= $all_result[$i]['title'] ?></a>
                        </h4>
                        <div class="price"><?= $all_result[$i]['price'] ?></div>
                    </li>
                <?php endfor; ?>
            </ul>

            <div class="pager">
                <div class="link-to-begin"><a href="#"><<</a></div>
                <div class="link-to-left"><a href="#"> <</a></div>
                <div class="link-pager"><a href="#">1</a></div>
                <div class="link-pager"><a href="#">2</a></div>
                <div class="link-pager active"><a href="#">3</a></div>
                <div class="link-pager"><a href="#">4</a></div>
                <div class="link-pager"><a href="#">5</a></div>
                <div class="link-to-right"><a href="#">></a></div>
                <div class="link-to-end"><a href="#">>></a></div>
            </div>
        </div>

    </div>
</div>

<?php include_once __DIR__ . "/../footer.php" ?>
