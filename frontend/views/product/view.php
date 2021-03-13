<?php include_once __DIR__ . "/../header.php" ?>

<script src="script/comments.js"></script>

<div id="breadcrumbs" class="width1024">
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Discounts and Clearance</a></li>
        <li><?= $product['title'] ?></li>
    </ul>
</div>

<div id="product-content" class="width1024">
    <div id="content" class="body">

        <div id="product">
            <div class="columns">
                <div class="column">
                    <!--                    <img src="/shop/frontend/imgs/product-image.jpg" alt="">-->
                    <img src="/shop/uploads/products/<?= $product['picture'] ?>" alt="" width="252px" height="393">
                </div>
                <div class="column" style="width: 100%;">
                    <h1><?= $product['title'] ?></h1>
                    <div class="info">
                        <p><?= $product['preview'] ?></p>
                    </div>
                    <div class="price-block">
                        <div>
                            <div class="label">Our price: <span>$<?= $product['price'] ?></span></div>
                            <div class="statistics">Was $200 Save $20</div>
                            <form action="/shop/frontend/index.php?model=basket&action=addProduct" method="post">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                <button>Add to card</button>
                            </form>
                        </div>
                        <div class="secure">
                            <div>Safe, Secure Shopping</div>
                            <div>
                                <img src="/shop/frontend/imgs/payments01.jpg" alt="">
                                <img src="/shop/frontend/imgs/payments02.jpg" alt="">
                                <img src="/shop/frontend/imgs/payments03.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="product-info">
                <div class="columns">
                    <div class="column">
                        <div class="bookmarks">
                            <ul>
                                <li class="active"><a href="#">Product information</a></li>
                                <li><a href="#">Other detail</a></li>
                            </ul>
                        </div>
                        <div class="contents">

                            <div class="content short">
                                <?= $product['preview'] ?>
                            </div>
                            <div class="content full hide">
                                <?= $product['content'] ?>
                            </div>

                        </div>
                        <div class="comments-list">
                            <h4>Comments</h4>
                            <div id="comments"></div>
                            <form id="comment-form" action="#">
                                <input type="hidden" name="product_id" value="<?= $_GET['id'] ?? '' ?>">
                                <h4>Write a comment</h4>
                                <div>
                                    <label>Your name</label>
                                    <input type="text" name="username">
                                </div>
                                <div>
                                    <label>Email</label>
                                    <input type="email" name="email">
                                </div>
                                <div>
                                    <label>Message</label>
                                    <textarea name="message" cols="30" rows="10"></textarea>
                                </div>
                                <div>
                                    <button>Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="product-list column">
                        <h4>Your may also like</h4>
                        <ul>
                            <li>
                                <div><a href="#"><img src="/shop/frontend/imgs/sales01.png" alt=""></a></div>
                                <div>
                                    <h3><a href="#">The Hare With Amber Eyes</a></h3>
                                    <div class="price">$45.00</div>
                                    <div>
                                        <button>Read me</button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div><a href="#"><img src="/shop/frontend/imgs/sales01.png" alt=""></a></div>
                                <div>
                                    <h3><a href="#">The Hare With Amber Eyes</a></h3>
                                    <div class="price">$45.00</div>
                                    <div>
                                        <button>Read me</button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div><a href="#"><img src="/shop/frontend/imgs/sales01.png" alt=""></a></div>
                                <div>
                                    <h3><a href="#">The Hare With Amber Eyes</a></h3>
                                    <div class="price">$45.00</div>
                                    <div>
                                        <button>Read me</button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div><a href="#"><img src="/shop/frontend/imgs/sales01.png" alt=""></a></div>
                                <div>
                                    <h3><a href="#">The Hare With Amber Eyes</a></h3>
                                    <div class="price">$45.00</div>
                                    <div>
                                        <button>Read me</button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div><a href="#"><img src="/shop/frontend/imgs/sales01.png" alt=""></a></div>
                                <div>
                                    <h3><a href="#">The Hare With Amber Eyes</a></h3>
                                    <div class="price">$45.00</div>
                                    <div>
                                        <button>Read me</button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div><a href="#"><img src="/shop/frontend/imgs/sales01.png" alt=""></a></div>
                                <div>
                                    <h3><a href="#">The Hare With Amber Eyes</a></h3>
                                    <div class="price">$45.00</div>
                                    <div>
                                        <button>Read me</button>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . "/../footer.php" ?>
