<?php
include_once __DIR__ . "/../header.php";
?>

<div class="content-wrapper">

    <section class="content">


        <form class="form-horizontal" action="?model=permission&action=save"
              method="post" >

            <div class="card-body">
                <h1>Create permission</h1>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">PERMISSION</label>
                    <div class="col-sm-10">
                        <input type="text" name="permission" value="<?= $one['permission'] ?? '' ?>"
                               class="form-control">
                    </div>
                </div>
                <div style="display: flex">
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
