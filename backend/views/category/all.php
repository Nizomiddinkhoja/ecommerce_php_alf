<?php

include_once __DIR__ . "/../header.php";

?>

<h1>List Category</h1>

<div>
    <a class="btn btn-warning" href="http://phpalif.test/shop/backend/index.php?model=product&action=create">Добавить
        товар</a>
</div>

<table class="table">
    <thead>
    <th>ID</th>
    <th>TITLE</th>
    <th>GROUP ID</th>
    <th>PARENT ID</th>
    <th>PRIOR</th>
    </thead>
    <tbody>
    <?php foreach ($all_result as $item) : ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= $item['title'] ?></td>
            <td><?= $item['group_id'] ?></td>
            <td><?= $item['parent_id'] ?></td>
            <td><?= $item['prior'] ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<?php
include_once __DIR__ . "/../footer.php";
?>
