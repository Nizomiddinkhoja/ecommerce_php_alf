<?php

$conn = mysqli_connect('localhost', 'shop_user', 'shop_password', 'db_shop');
mysqli_query($conn, "SET NAMES 'utf8'");

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];

    mysqli_query($conn, "DELETE FROM shops WHERE id=$id limit 1");
}

if (isset($_GET['update'])) {
    $id = (int)$_GET['update'];

    $oneShopsResult = mysqli_query($conn, "select * from shops where id = $id limit 1");
    $oneShops = mysqli_fetch_all($oneShopsResult, MYSQLI_ASSOC);
    $oneShops = reset($oneShops);

}

if (!empty($_POST)) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $address = $_POST['address'];

    mysqli_set_charset($conn, "utf8");


    if ($id > 0) {
        $query = "UPDATE `shops` SET `title`='$title',`address`='$address'  WHERE id = $id";
    } else {
        $query = "INSERT INTO `shops` VALUES (null,  '$title', '$address')";
    }
    $result = mysqli_query($conn, $query);


}

$resultCategory = mysqli_query($conn, "SELECT * FROM shops order by id desc ");

$all_result = mysqli_fetch_all($resultCategory, MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Shops</title>
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
<h1>List Shops</h1>
<div id="news">
    <table class="table">
        <thead>
        <th>ID</th>
        <th>TITLE</th>
        <th>ADDRESS</th>
        </thead>
        <tbody>
        <?php foreach ($all_result as $category) : ?>
            <tr>
                <td><?= $category['id'] ?></td>
                <td><?= $category['title'] ?></td>
                <td><?= $category['address'] ?></td>
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
    <h1>Create Shops</h1>
    <form action="shops.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $oneShops['id'] ?? '' ?>">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="<?= $oneShops['title'] ?? '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" value="<?= $oneShops['address'] ?? '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Отправить" class="btn btn-success">
        </div>
    </form>
</div>
</body>
</html>
