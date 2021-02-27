<?php
include_once __DIR__ . "/../header.php";
?>

<div class="content-wrapper">

    <section class="content">


        <form class="form-horizontal" action="?model=access&action=save"
              method="post"
              enctype="multipart/form-data">

            <h1>Edit Permissions</h1>
            <div class="card-body">

                <table>
                    <thead>
                    <tr>
                        <td>Roles</td>
                        <?php foreach ($roles as $role) : ?>
                            <td><?= $role ?></td>
                        <?php endforeach; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($permissions as $permission) : ?>
                        <tr>
                            <td><?= $permission ?></td>
                            <?php foreach ($roles as $role) : ?>
                                <td><input type="checkbox" name="access[<?= $role ?>][<?= $permission ?>]"></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="form-group  col-sm-6">
                    <input type="submit" value="Отправить" class="btn-lg btn-success">
                </div>
            </div>
        </form>

    </section>
</div>
<?php
include_once __DIR__ . "/../footer.php";
?>