<?php
include_once __DIR__ . "/../header.php";
?>

<div class="content-wrapper">

    <section class="content">


        <form class="form-horizontal" action="?model=payment&action=save"
              method="post">

            <div class="card-body">
                <h1>Create Payment</h1>
                <input type="hidden" name="id" value="<?= $result['id'] ?? '' ?>">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="<?= $result['title'] ?? '' ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-10">
                        <input type="text" name="code" value="<?= $result['code'] ?? '' ?>"
                               class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Priority</label>
                    <div class="col-sm-10">
                        <input type="text" name="priority" value="<?= $result['priority'] ?? '' ?>"
                               class="form-control">
                    </div>
                </div>

                <div class="form-group  col-sm-6">
                    <input type="submit" value="Отправить" style="float: right" class="btn-lg btn-success">
                </div>
            </div>
        </form>

    </section>
</div>
<?php
include_once __DIR__ . "/../footer.php";
?>
