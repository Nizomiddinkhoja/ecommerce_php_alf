<?php
include_once __DIR__ . "/../header.php";
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Order</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">


        <form class="form-horizontal" action="/shop/backend/index.php?model=order&action=update"
              method="post"
              enctype="multipart/form-data">

            <div class="card-body">
                <h1>Create news</h1>
                <input type="hidden" name="id" value="<?= $one['id'] ?? '' ?>">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="user_id" value="<?= $one['user_id'] ?? '' ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Total</label>
                    <div class="col-sm-10">
                        <input type="text" name="total" value="<?= $one['total'] ?? '' ?>"
                               class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Delivery</label>
                    <div class="col-sm-10">
                        <select name="delivery">
                            <option disabled selected></option>
                            <option value="1" <?= ($one['delivery_id'] ?? null == '1') ? 'selected' : '' ?>>Delivery 1</option>
                            <option value="2" <?= ($one['delivery_id'] ?? null == '2') ? 'selected' : '' ?>>Delivery 2</option>
                            <option value="3" <?= ($one['delivery_id'] ?? null == '3') ? 'selected' : '' ?>>Delivery 3</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Payment</label>
                    <div class="col-sm-10">
                        <select name="payment">
                            <option disabled selected></option>
                            <option value="1" <?= ($one['payment_id'] ?? null == '1') ? 'selected' : '' ?>>Payment 1</option>
                            <option value="2" <?= ($one['payment_id'] ?? null == '2') ? 'selected' : '' ?>>Payment 2</option>
                            <option value="3" <?= ($one['payment_id'] ?? null == '3') ? 'selected' : '' ?>>Payment 3</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Comment</label>
                    <div class="col-sm-10">
                        <input type="text" name="comment" readonly value="<?= $one['comment'] ?? '' ?>"
                               class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="<?= $one['name'] ?? '' ?>"
                               class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" value="<?= $one['phone'] ?? '' ?>"
                               class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Comment</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="<?= $one['email'] ?? '' ?>"
                               class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="status">
                            <option disabled selected></option>
                            <?php foreach (OrderService::getStatus() as $key => $label): ?>
                                <option value="<?= $key ?>"  <?= ($one['status'] ?? null == $key) ? 'selected' : '' ?>><?= $label ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Created</label>
                    <div class="col-sm-10">
                        <input type="text" name="created" readonly value="<?= $one['created'] ?? '' ?>"
                               class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Updated</label>
                    <div class="col-sm-10">
                        <input type="text" name="updated" readonly value="<?= $one['updated'] ?? '' ?>"
                               class="form-control">
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
