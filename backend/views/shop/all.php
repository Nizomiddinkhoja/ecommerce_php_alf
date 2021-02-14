<?php

include_once __DIR__ . "/../header.php";

?>

<h1>List Shops</h1>

<div>
    <a class="btn btn-warning" href="http://phpalif.test/shop/backend/index.php?model=shop&action=create">Добавить
        товар</a>
</div>

<table class="table">
    <thead>
    <th>ID</th>
    <th>TITLE</th>
    <th>ADDRESS</th>
    <th>CITY</th>
    </thead>
    <tbody>
    <?php foreach ($all_result as $item) : ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= $item['title'] ?></td>
            <td><?= $item['address'] ?></td>
            <td><?= $item['city'] ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<?php
include_once __DIR__ . "/../footer.php";
?>
