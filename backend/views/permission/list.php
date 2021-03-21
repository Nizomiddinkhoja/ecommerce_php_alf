<?php
include_once __DIR__ . "/../header.php";
?>
<div class="content-wrapper">
    <section class="content">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <th width="15%">PERMISSION</th>
                    <th width="20%">ACTIONS</th>
                    </thead>
                    <tbody>
                    <?php foreach ($all as $item) : ?>
                        <tr>
                            <td><?= $item ?></td>
                            <td class="project-actions text-right">
                                <a class="btn btn-danger btn-sm"
                                   href="?model=permission&action=delete&name=<?= $item ?>">
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
