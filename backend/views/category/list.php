<?php
include_once __DIR__ . "/../header.php";
?>

<div class="content-wrapper">
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
        </div>
    </section>

    <section class="content">

        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>GROUP ID</th>
                    <th>PARENT ID</th>
                    <th>PRIOR</th>
                    <th>ACTION</th>
                    </thead>
                    <tbody>
                    <?php foreach ($all_result as $item) : ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['title'] ?></td>
                        <td><?= $item['group_id'] ?></td>
                        <td><?= $item['parent_id'] ?></td>
                        <td><?= $item['prior'] ?></td>
                        <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm"
                                   href="http://phpalif.test/shop/backend/index.php?model=category&action=update&id=<?= $item['id'] ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm"
                                   href="http://phpalif.test/shop/backend/index.php?model=category&action=delete&id=<?= $item['id'] ?>">
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
        </div>

    </section>
</div>
<?php
include_once __DIR__ . "/../footer.php";
?>
