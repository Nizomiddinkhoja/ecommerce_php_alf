<?php
include_once __DIR__ . "/../header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Projects</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Projects</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <th width="5%">ID</th>
                    <th width="10%">PICTURE</th>
                    <th width="5%">TITLE</th>
                    <th width="50%">PREVIEW</th>
                    <th width="5%">PRICE</th>
                    <th width="5%">STATUS</th>
                    <th width="20%">ACTIONS</th>
                    </thead>
                    <tbody>
                    <?php foreach ($all_result as $product) : ?>
                        <tr>
                            <td><?= $product['id'] ?></td>
                            <td><img src="/shop/uploads/products/<?= $product['picture'] ?>" width="200px" alt=""></td>
                            <td><?= $product['title'] ?></td>
                            <td><?= $product['preview'] ?></td>
                            <td><?= $product['price'] ?></td>
                            <td><?= $product['status'] ?></td>

                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm"
                                   href="http://phpalif.test/shop/backend/index.php?model=product&action=update&id=<?= $product['id'] ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm"
                                   href="http://phpalif.test/shop/backend/index.php?model=product&action=delete&id=<?= $product['id'] ?>">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>


            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once __DIR__ . "/../footer.php";
?>
