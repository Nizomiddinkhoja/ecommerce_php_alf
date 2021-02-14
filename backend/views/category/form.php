<?php
include_once __DIR__ . "/../header.php";
?>

<div class="content-wrapper">

    <section class="content">


        <form class="form-horizontal" action="http://phpalif.test/shop/backend/index.php?model=category&action=save"
              method="post"
              enctype="multipart/form-data">

            <div class="card-body">
                <h1>Create Products</h1>
                <input type="hidden" name="id" value="<?= $oneCategory['id'] ?? '' ?>">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="<?= $oneCategory['title'] ?? '' ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">group_id</label>
                    <div class="col-sm-10">
                        <input type="number" name="group_id" value="<?= $oneCategory['group_id'] ?? '' ?>"
                               class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">parent_id</label>
                    <div class="col-sm-10">
                        <input type="number" name="parent_id" value="<?= $oneCategory['parent_id'] ?? '' ?>"
                               class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">prior</label>
                    <div class="col-sm-10">
                        <input type="number" name="prior" value="<?= $oneCategory['prior'] ?? '' ?>"
                               class="form-control">
                    </div>
                </div>

                <div style="display: flex">
                    <div class="form-group  col-sm-6">
                        <a class="btn-lg btn-warning"
                           href="http://phpalif.test/shop/backend/index.php?model=category&action=read">Назад</a>
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
