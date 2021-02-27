<?php

include_once __DIR__ . "/../header.php";

?>

<h1>List News</h1>

<div>
    <a class="btn btn-warning" href="http://phpalif.test/shop/backend/index.php?model=news&action=create">Добавить
        товар</a>
</div>

<table class="table">
    <thead>
    <th>ID</th>
    <th>TITLE</th>
    <th>BODY</th>
    <th>PICTURE</th>
    <th>PREVIEW</th>
    <th>ACTIONS</th>
    </thead>
    <tbody>
    <?php foreach ($all_result as $item) : ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= $item['title'] ?></td>
            <td><?= $item['content'] ?></td>
            <td><img src="/shop/uploads/news/<?= $item['picture'] ?>" alt=""></td>
            <td><?= $item['preview'] ?></td>
            <td width="200px">
                <a class="btn btn-danger"
                   href="http://phpalif.test/shop/backend/index.php?model=news&action=delete&id=<?= $item['id'] ?>">Delete</a>
                <a class="btn btn-warning"
                   href="http://phpalif.test/shop/backend/index.php?model=news&action=update&id=<?= $item['id'] ?>">Update</a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<?php
include_once __DIR__ . "/../footer.php";
?>
