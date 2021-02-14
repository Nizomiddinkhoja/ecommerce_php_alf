<?php

$conn = mysqli_connect('localhost', 'shop_user', 'shop_password', 'db_shop');
mysqli_query($conn, "SET NAMES 'utf8'");

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];

    mysqli_query($conn, "DELETE FROM categories WHERE id=$id limit 1");
}

if (isset($_GET['update'])) {
    $id = (int)$_GET['update'];

    $oneCategoryResult = mysqli_query($conn, "select * from categories where id = $id limit 1");
    $oneCategory = mysqli_fetch_all($oneCategoryResult, MYSQLI_ASSOC);
    $oneCategory = reset($oneCategory);

}

if (!empty($_POST)) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $group_id = $_POST['group_id'];
    $parent_id = $_POST['parent_id'];

    mysqli_set_charset($conn, "utf8");


    if ($id > 0) {

        $query = "UPDATE `categories` SET `title`='$title',`group_id`='$group_id',`parent_id`='$parent_id' WHERE id = $id";

    } else {
        $query = "INSERT INTO `categories` VALUES (null,  '$title', '$group_id', '$parent_id')";
    }
    $result = mysqli_query($conn, $query);


}

$resultCategory = mysqli_query($conn, "SELECT * FROM categories order by id desc ");

$all_result = mysqli_fetch_all($resultCategory, MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Categories</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
            crossorigin="anonymous"></script>
    <style>
        form {
            width: 500px;
            margin: 20px auto;
        }

        h1 {
            text-align: center;
        }

        img {
            width: 100px;
            height: auto;
        }

    </style>
</head>
<body>
<h1>List Categories</h1>
<div id="news">
    <table class="table">
        <thead>
        <th>ID</th>
        <th>TITLE</th>
        <th>GROUP_ID</th>
        <th>PARENT_ID</th>
        </thead>
        <tbody>
        <?php foreach ($all_result as $category) : ?>
            <tr>
                <td><?= $category['id'] ?></td>
                <td><?= $category['title'] ?></td>
                <td><?= $category['group_id'] ?></td>
                <td><?= $category['parent_id'] ?></td>
                <td width="200px">
                    <a class="btn btn-danger" href="?delete=<?= $category['id'] ?>">Delete</a>
                    <a class="btn btn-warning" href="?update=<?= $category['id'] ?>">Update</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
<div>
    <h1>Create Categories</h1>
    <form action="categories.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $oneCategory['id'] ?? '' ?>">
        <div class="form-group">
            <label>Title</label>
            <input type="text" value="<?= $oneCategory['title'] ?? '' ?>" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Group id</label>
            <input type="text" name="group_id" value="<?= $oneCategory['group_id'] ?? '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Parent_id</label>
            <input type="text" name="parent_id" value="<?= $oneCategory['parent_id'] ?? '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Отправить" class="btn btn-success">
        </div>
    </form>
</div>
</body>
</html>
