
<?php include_once __DIR__."/../header.php"?>
<div id="content" class="width1024">
    <?php
    include_once __DIR__."/../sidebar.php"
    ?>
    <div class="body">

        <div id="products-list">
            <ul>
                <?php for ($i = 0; $i < sizeof($all_result); $i++):
                    if ($i % 5 === 0) echo "</ul><ul>"
                    ?>
                    <li>
                        <img src="/shop/frontend/imgs/sale30.png" alt="">
                        <a href="/shop/frontend/index.php?model=product&action=view&id=<?=$all_result[$i]['id']?>"><img src="/shop/uploads/products/<?= $all_result[$i]['picture'] ?>" alt=""></a>
                        <h4><a href="/shop/frontend/index.php?model=product&action=view&id=<?=$all_result[$i]['id']?>"><?= $all_result[$i]['title'] ?></a></h4>
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
<?php include_once __DIR__."/../footer.php"?>
