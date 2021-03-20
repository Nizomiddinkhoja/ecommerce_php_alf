<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
<form class="form-horizontal"
      action="model=product&action=save"
      method="post"
      enctype="multipart/form-data">

    <div class="card-body">
        <h1>Create Products</h1>
        <input type="hidden" name="id" value="<?= $oneProduct['id'] ?? '' ?>">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" value="<?= $oneProduct['title'] ?? '' ?>" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Picture</label>
            <div class="col-sm-10">
                <input type="file" name="picture" class="form-control">
                <?php
                if (!empty($oneProduct['picture'])) {
                    ?>
                    <img class="mt-3"
                         src="http://phpalif.test/shop/uploads/products/<?= $oneProduct['picture'] ?>"
                         width="200px" alt="">
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Preview</label>
            <div class="col-sm-10">
                <input type="text" name="preview" value="<?= $oneProduct['preview'] ?? '' ?>"
                       class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                    <textarea name="content" rows="7"
                              class="form-control"><?= $oneProduct['content'] ?? '' ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="number" name="price" value="<?= $oneProduct['price'] ?? '' ?>"
                       class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="status col-sm-2 col-form-label">Status </label>
            <div class="col-sm-10">
                <input type="checkbox" name="status" class="form-control" >
            </div>
        </div>

        <div style="display: flex">
            <div class="form-group  col-sm-6">
                <input type="submit" value="Отправить" style="float: right" class="btn-lg btn-success">
            </div>
        </div>
    </div>
</form>

<script>
    $('form').submit(function () {


        console.log(status);


        let data = {
            title: $('input[name=title]').val(),
            preview: $('input[name=preview]').val(),
            content: $('textarea[name=content]').val(),
            picture: $('input[name=picture]').val(),
            price: $('input[name=price]').val(),
            status: 1
        };

        // console.log(data);

        $.ajax({
            type: "POST",
            url: '?module=api&model=product&action=create',
            data: data,
            dataType: "json",
            success: function (response) {
                    console.log(response);
            },
            error: function (text) {
                console.error(text);
            }
        });

        return false;
    });
</script>

</body>
</html>
