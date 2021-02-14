<?php

include_once __DIR__ . "/Interface/ControllerInterface.php";
include_once __DIR__ . "/../../../common/src/Model/Category.php";

class CategoryController implements ControllerInterface
{

    public function create()
    {
        $oneCategory = [];

        include_once __DIR__ . "/../../views/category/form.php";
    }

    public function read()
    {
        $all_result = (new Category())->all();
        include_once __DIR__ . "/../../views/category/list.php";
    }

    public function update()
    {
        $id = (int)$_GET['id'];

        if (empty($id)) die('Undefined ID');

        $oneCategory = (new Category())->getById($id);

        if (empty($oneCategory)) die('Category not found');

        include_once __DIR__ . "/../../views/category/form.php";

    }

    public function delete()
    {
        $id = (int)$_GET['id'];

        (new Category())->delete($id);

        return $this->read();
    }

    public function save()
    {
        if (!empty($_POST)) {

            $Category = new Category(
                htmlspecialchars($_POST['id']),
                htmlspecialchars($_POST['title']),
                htmlspecialchars($_POST['group_id']),
                htmlspecialchars($_POST['parent_id']),
                htmlspecialchars($_POST['prior'])
            );

            $CategoryD->save();
        }
        return $this->read();
    }
}
