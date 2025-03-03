<?php
include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class Category extends AbstractModel
{
    public $id;
    public $title;
    public $groupId;
    public $parentId;
    public $prior;

    public function __construct(
        $id = null,
        $title = null,
        $groupId = null,
        $parentId = null,
        $prior = null
    )
    {
        parent::__construct();

        $this->id = $id;
        $this->title = $title;
        $this->groupId = $groupId;
        $this->parentId = $parentId;
        $this->prior = $prior;
    }

    public function save()
    {
        if ($this->id > 0) {
            $query = "UPDATE `categories` SET 
                            `title`='" . $this->title . "',
                            `group_id`='$this->groupId',
                            `parent_id`='$this->parentId',
                            `prior`='$this->prior'
                            WHERE id = $this->id";

        } else {
            $query = "INSERT INTO `categories` VALUES (null,  '$this->title', '$this->groupId', '$this->parentId', '$this->prior')";
        }

        $result = mysqli_query($this->conn, $query);
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM categories ORDER BY id DESC ");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getByGroupIds($groups = [])
    {

        $where = '';

        if (!empty($groups)) {
            $where = ' WHERE group_id IN (' . implode(',', $groups) . ')';
        }

        $result = mysqli_query($this->conn, "SELECT * FROM categories $where ORDER BY id DESC ");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getGroupWithCategories($groups = [])
    {
        if (!empty($groups)) {
            $where = ' WHERE group_id NOT IN (' . implode(',', $groups) . ')';
        }

        $result = mysqli_query($this->conn, "
                SELECT 
                categories.*,
                cg.id as group_id,
                cg.title as group_title
                FROM 
                categories 
                LEFT JOIN category_group cg on group_id = cg.id
                $where ORDER BY `prior` DESC ");

        $groups = [];

        $categories = $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if (!is_array($categories) && !empty($categories)) {
            return [];
        }

        foreach ($categories as $item) {
            $groups[$item['group_title']][] = $item;
        }
        return $groups;
    }

    public function getById($id)
    {
        $oneResult = mysqli_query($this->conn, "SELECT * FROM categories WHERE id = $id limit 1");
        $result = mysqli_fetch_all($oneResult, MYSQLI_ASSOC);
        return reset($result);
    }

    public function delete($id)
    {
        mysqli_query($this->conn, "DELETE FROM categories WHERE id=$id limit 1");
    }
}
