<?php
include_once __DIR__ . "/../header.php";
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>News</h1>
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
                    <th width="5%">ID</th>
                    <th width="15%">PICTURE</th>
                    <th width="10%">TITLE</th>
                    <th width="50%">PREVIEW</th>
                    <th width="20%">ACTIONS</th>
                    </thead>
                    <tbody>
                    <?php foreach ($all_result as $item) : ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><img src="/shop/uploads/news/<?= $item['picture'] ?>" width="200px" alt=""></td>
                            <td><?= $item['title'] ?></td>
                            <td><?= $item['preview'] ?></td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm"
                                   href="http://phpalif.test/shop/backend/index.php?model=news&action=update&id=<?= $item['id'] ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm"
                                   href="http://phpalif.test/shop/backend/index.php?model=news&action=delete&id=<?= $item['id'] ?>">
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
