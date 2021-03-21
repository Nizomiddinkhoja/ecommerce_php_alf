<?php

$conn = mysqli_connect('localhost', 'shop_user', 'shop_password', 'db_shop');
mysqli_query($conn, "SET NAMES 'utf8'");

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];

    mysqli_query($conn, "DELETE FROM products WHERE id=$id LIMIT 1");
}

if (isset($_GET['update'])) {
    $id = (int)$_GET['update'];

    $oneProductResult = mysqli_query($conn, "SELECT * FROM products WHERE id = $id LIMIT 1");
    $oneProduct = mysqli_fetch_all($oneProductResult, MYSQLI_ASSOC);
    $oneProduct = reset($oneProduct);

}

if (!empty($_POST)) {


    if (!empty($_FILES['picture']['tmp_name'])) {
        $filename = md5(rand(1000, 99999) . microtime()) . $_FILES['picture']['name'];
        copy($_FILES['picture']['tmp_name'], __DIR__ . '/../uploads/' . $filename);
    }


    $id = $_POST['id'];
    $title = $_POST['title'];
    $picture = htmlspecialchars($filename ?? '');
    $preview = $_POST['preview'];
    $content = $_POST['content'];
    $price = $_POST['price'];

    if (isset($_POST['status'])) {
        $status = 1;
    } else {
        $status = 0;
    }

    $created = date('Y-m-d H:i:s', time());
    $updated = date('Y-m-d H:i:s', time());

    mysqli_set_charset($conn, "utf8");


    if ($id > 0) {

        $query = "UPDATE `products` SET `title`='$title',`preview`='$preview',`content`='$content',`price`='$price',`updated`='$updated',`status`='$status' WHERE id = $id";


    } else {
        $query = "INSERT INTO `products` VALUES (null,  '$title', '$picture', '$preview', '$content', '$price', '$status', '$created', '$updated')";
    }

    $result = mysqli_query($conn, $query);

}

$resultProducts = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC ");

$all_result = mysqli_fetch_all($resultProducts, MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Products</title>
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

        .status {
            display: flex;
        }

        .status input {
            height: 20px;
            float: right;
        }
    </style>
</head>
<body>
<h1>List Products</h1>
<div id="news">
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
                <td><img src="/shop/uploads/<?= $product['picture'] ?>" alt=""></td>
                <td><?= $product['content'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['status'] ?></td>
                <td width="200px">
                    <a class="btn btn-danger" href="?delete=<?= $product['id'] ?>">Delete</a>
                    <a class="btn btn-warning" href="?update=<?= $product['id'] ?>">Update</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
<div>
    <h1>Create Products</h1>
    <form action="products.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $oneProduct['id'] ?? '' ?>">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="<?= $oneProduct['title'] ?? '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Picture</label>
            <input type="file" name="picture" class="form-control">
        </div>
        <div class="form-group">
            <label>Preview</label>
            <input type="text" name="preview" value="<?= $oneProduct['preview'] ?? '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" rows="7" class="form-control"><?= $oneProduct['content'] ?? '' ?></textarea>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" value="<?= $oneProduct['price'] ?? '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <label class="status">Status
                <input type="checkbox" name="status" class="form-control"
                       <?= (isset($oneProduct['status']) && ($oneProduct['status'] == 1)) ? 'checked' : '' ?>>
            </label>
        </div>
        <div class="form-group">
            <input type="submit" value="Отправить" class="btn btn-success">
        </div>
    </form>
</div>
</body>
</html>
