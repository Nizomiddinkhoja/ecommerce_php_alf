<?php
include_once __DIR__ . "/../header.php";
?>
<div class="content-wrapper">
    <section class="content">

        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>CODE</th>
                    <th>PRIORITY</th>
                    <th width="18%">ACTION</th>
                    </thead>
                    <tbody>
                    <?php foreach ($result as $item) : ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['title'] ?></td>
                        <td><?= $item['code'] ?></td>
                        <td><?= $item['priority'] ?></td>
                        <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm"
                                   href="?model=delivery&action=update&id=<?= $item['id'] ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm"
                                   href="?model=delivery&action=delete&id=<?= $item['id'] ?>">
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
