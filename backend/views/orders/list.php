<?php
include_once __DIR__ . "/../header.php";
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <th>ID</th>
                    <th>USER ID</th>
                    <th>TOTAL</th>
                    <th>PAYMENT</th>
                    <th>DELIVERY</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>STATUS</th>
                    <th>CREATED</th>
                    <th>UPDATED</th>
                    </thead>
                    <tbody>
                    <?php foreach ($all as $item) :  ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['user_id'] ?></td>
                            <td><?= $item['total'] ?></td>
                            <td><?= $item['payment_id'] ?></td>
                            <td><?= $item['delivery_id'] ?></td>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['email'] ?></td>
                            <td><?= $item['status'] ?></td>
                            <td><?= $item['created'] ?></td>
                            <td><?= $item['updated'] ?></td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm"
                                   href="/shop/backend/index.php?model=order&action=update&id=<?= $item['id'] ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<?php
include_once __DIR__ . "/../footer.php";
?>
