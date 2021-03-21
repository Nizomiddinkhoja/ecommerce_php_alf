<?php
include_once __DIR__ . "/../header.php";
?>
<div class="content-wrapper">
    <section class="content">
        <?php
        $errorMessage = MessageService::displayError();
        if (!empty($errorMessage)):?>
            <div class="error"><?= $errorMessage ?></div>
        <?php endif; ?>
        <form class="form-horizontal" action="http://phpalif.test/shop/backend/index.php?model=product&action=save"
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
                        <input type="checkbox" name="status" class="form-control"
                               <?= (isset($oneProduct['status']) && ($oneProduct['status'] == 1)) ? 'checked' : '' ?>>
                    </div>
                </div>

                <div style="display: flex">
                    <div class="form-group  col-sm-6">
                        <a class="btn-lg btn-warning"
                           href="http://phpalif.test/shop/backend/index.php?model=product&action=read">Назад</a>
                    </div>
                    <div class="form-group  col-sm-6">
                        <input type="submit" value="Отправить" style="float: right" class="btn-lg btn-success">
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
<?php
include_once __DIR__ . "/../footer.php";
?>
