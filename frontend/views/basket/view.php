<?php include_once __DIR__ . "/../header.php" ?>

<div class="width1024">
    <div id="basket-container" class="body">
        <table class="table">
            <thead>
            <tr>
                <th class="id">#</th>
                <th class="picture">Picture</th>
                <th class="title">Title</th>
                <th class="qty">Quantity</th>
                <th class="price">Price</th>
                <th class="sum">Sum</th>
                <th class="actions">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $key => $item) : ?>
                <tr>
                    <td><?= $item['product']['id'] ?></td>
                    <td>
                        <img src="http://phpalif.test/shop/uploads/products/<?= $item['product']['picture'] ?>"
                             alt=""
                             width="252px"
                             height="393"></td>
                    <td>
                        <a href="/shop/frontend/index.php?model=product&action=view&id=<?= $item['product']['id'] ?>">
                            <?= $item['product']['title'] ?>
                        </a>
                    </td>
                    <td>
                        <form action="/shop/frontend/index.php?model=basket&action=change" method="post">
                            <input type="hidden" name="product_id" value="<?= $item['product']['id'] ?>">
                            <input type="number" name="qty" value="<?= $item['quantity'] ?>">
                            <input type="submit" value="change">
                        </form>
                    </td>
                    <td><?= $item['product']['price'] ?></td>
                    <td><?= $item['product']['sum'] ?></td>
                    <td>
                        <form action="/shop/frontend/index.php?model=basket&action=delete" method="post">
                            <input type="hidden" name="product_id" value="<?= $item['product']['id'] ?>">
                            <button>delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr class="total">
                <td colspan="6">
                    Total:
                </td>
                <td>
                    <?= $total ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include_once __DIR__ . "/../footer.php" ?>
