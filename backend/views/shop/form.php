<?php
include_once __DIR__ . "/../header.php";
?>
<div class="content-wrapper">
    <section class="content">
        <form class="form-horizontal" action="http://phpalif.test/shop/backend/index.php?model=shop&action=save"
              method="post"
              enctype="multipart/form-data">
            <div class="card-body">
                <h1>Create Shops</h1>
                <input type="hidden" name="id" value="<?= $oneShop['id'] ?? '' ?>">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="<?= $oneShop['title'] ?? '' ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">address</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" value="<?= $oneShop['address'] ?? '' ?>"
                               class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">city</label>
                    <div class="col-sm-10">
                        <input type="text" name="city" value="<?= $oneShop['city'] ?? '' ?>"
                               class="form-control">
                    </div>
                </div>
                <div style="display: flex">
                    <div class="form-group  col-sm-6">
                        <a class="btn-lg btn-warning"
                           href="http://phpalif.test/shop/backend/index.php?model=shop&action=read">Назад</a>
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
