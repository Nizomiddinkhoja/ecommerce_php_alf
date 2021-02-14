<?php
include_once __DIR__ . "/../header.php";
?>

<div class="content-wrapper">

    <section class="content">


        <form class="form-horizontal" action="http://phpalif.test/shop/backend/index.php?model=news&action=save"
              method="post"
              enctype="multipart/form-data">

            <div class="card-body">
                <h1>Create news</h1>
                <input type="hidden" name="id" value="<?= $oneNews['id'] ?? '' ?>">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="<?= $oneNews['title'] ?? '' ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Picture</label>
                    <div class="col-sm-10">
                        <input type="file" name="picture" class="form-control">
                        <?php
                        if (!empty($oneNews['picture'])) {
                            ?>
                            <img class="mt-3" src="http://phpalif.test/shop/uploads/news/<?= $oneNews['picture'] ?>" width="200px" alt="">
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Preview</label>
                    <div class="col-sm-10">
                        <input type="text" name="preview" value="<?= $oneNews['preview'] ?? '' ?>"
                               class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Content</label>
                    <div class="col-sm-10">
                    <textarea name="content" rows="7"
                              class="form-control"><?= $oneNews['content'] ?? '' ?></textarea>
                    </div>
                </div>
                <div style="display: flex">
                    <div class="form-group  col-sm-6">
                        <a class="btn-lg btn-warning"
                           href="http://phpalif.test/shop/backend/index.php?model=news&action=read">Назад</a>
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
