<?php

include_once __DIR__ . "/Interface/ControllerInterface.php";
include_once __DIR__ . "/../../../common/src/Model/News.php";
include_once __DIR__ . "/../../../common/src/Service/FileUploader.php";
include_once __DIR__ . "/AbstractController.php";

class NewsController  extends AbstractController
{

    public function create()
    {
        $oneNews = [];

        include_once __DIR__ . "/../../views/news/form.php";
    }

    public function read()
    {
        $all_result = (new News())->all();
        include_once __DIR__ . "/../../views/news/list.php";
    }

    public function update()
    {
        $id = (int)$_GET['id'];

        if (empty($id)) die('Undefined ID');

        $oneNews = (new News())->getById($id);

        if (empty($oneNews)) die('Product not found');

        include_once __DIR__ . "/../../views/news/form.php";

    }

    public function delete()
    {
        $id = (int)$_GET['id'];

        (new News())->delete($id);

        return $this->read();
    }

    public function save()
    {
        if (!empty($_POST)) {

            $filename = FileUploader::upload('news');

            $now = date('Y-m-d H:i:s', time());


            $product = new News(
                intval($_POST['id']),
                htmlspecialchars($_POST['title']),
                htmlspecialchars($_POST['content']),
                $now,
                $now,
                htmlspecialchars($filename ?? ''),
                htmlspecialchars($_POST['preview'])
            );

            $product->save();
        }
        return $this->read();
    }
}
