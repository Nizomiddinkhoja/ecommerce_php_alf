<?php include_once __DIR__ . "/../header.php" ?>
<div id="content" class="width1024">
    <?php
    include_once __DIR__ . "/../sidebar.php";

    $allPageNumber = (new Product())->getNumberPage(
        $_GET['category_id'] ?? [],
        $_GET['limit'] ?? Product::NUMBER_PRODUCT_PER_PAGE);
    $currentPage = intval($_GET['page'] ?? 1);
    $arNumbersPages = [];
    $firstNumberPage = 1;

    if ($currentPage >= 2) {
        if ($currentPage > $allPageNumber - 2) {
            $arNumbersPages[] = $currentPage - 4;
        }
        if ($currentPage > $allPageNumber - 1) {
            $arNumbersPages[] = $currentPage - 3;
        }
        if ($currentPage >= 3) {
            $arNumbersPages[] = $currentPage - 2;
        }
        $arNumbersPages[] = $currentPage - 1;
    }
    $arNumbersPages[] = $currentPage;

    for ($next = 1; sizeof($arNumbersPages) < 5; $next++) {
        $arNumbersPages[] = $currentPage + $next;
    }
    ?>
    <div class="body">

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



                <?php print '<div class="link-to-begin"><a href="?model=product&action=all' . (isset($_GET['category_id']) ? '&category_id=' . $_GET['category_id'] : '') . '&page=1"><<</a></div>' ?>
                <?php print '<div class="link-to-left"><a href="?model=product&action=all' . (isset($_GET['category_id']) ? '&category_id=' . $_GET['category_id'] : '') . '&page=' . ($currentPage - 1) . '"><</a></div>' ?>

                <?php
                    foreach ($arNumbersPages as $numbersPage) {
                        print '
                    <div class="link-pager   ' . (intval($_GET['page'] ?? 0) === $numbersPage ? ' active' : '') . ' ">
                        <a href="?model=product&action=all' . (isset($_GET['category_id']) ? '&category_id=' . $_GET['category_id']   : '') . '&page=' . $numbersPage . '">' . $numbersPage . '</a>
                    </div>';
                    }
                ?>

                <?php print '<div class="link-to-right"><a href="?model=product&action=all' . (isset($_GET['category_id']) ? '&category_id=' . $_GET['category_id']  : '') . '&page=' . ($currentPage + 1) . '">></a></div>' ?>
                <?php print '<div class="link-to-end"><a href="?model=product&action=all' . (isset($_GET['category_id']) ? '&category_id=' . $_GET['category_id']   : '') . '&page=' . $allPageNumber . '">>></a></div>' ?>
            </div>
        </div>

    </div>
</div>
<?php include_once __DIR__ . "/../footer.php" ?>
