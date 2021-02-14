<?php

include_once __DIR__ . "/../header.php";

?>

<h1>List Products</h1>

<div>
    <a class="btn btn-warning" href="http://phpalif.test/shop/backend/index.php?model=product&action=create">Добавить
        товар</a>
</div>

<table class="table">
    <thead>
    <th>ID</th>
    <th>TITLE</th>
    <th>PICTURE</th>
    <th>CONTENT</th>
    <th>PRICE</th>
    <th>STATUS</th>
    <th>ACTIONS</th>
    </thead>
    <tbody>
    <?php foreach ($all_result as $product) : ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['title'] ?></td>
            <td><img src="/shop/uploads/products/<?= $product['picture'] ?>" alt=""></td>
            <td><?= $product['content'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['status'] ?></td>
            <td width="200px">
                <a class="btn btn-danger"
                   href="http://phpalif.test/shop/backend/index.php?model=product&action=delete&id=<?= $product['id'] ?>">Delete</a>
                <a class="btn btn-warning"
                   href="http://phpalif.test/shop/backend/index.php?model=product&action=update&id=<?= $product['id'] ?>">Update</a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<?php
include_once __DIR__ . "/../footer.php";
?>
