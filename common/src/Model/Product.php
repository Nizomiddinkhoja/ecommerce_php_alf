<?php
include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class Product extends AbstractModel
{
    const NUMBER_PRODUCT_PER_PAGE = 20;

    public $id;

    /**
     * @var string
     * @valid {"maxlength": 64}
     */
    public $title;


    /**
     * @var string
     * @valid {"type": "string", "regx": "((.jpg)|(.png))"}
     */
    public $picture;

    /**
     * @var null
     * @valid {"type": "string", "maxlength": 255}
     */
    public $preview;
    public $content;

    /**
     * @var null
     * @valid {"type": "int", "max": 300000, "min": 1}
     */
    public $price;

    public $status;
    public $created;
    public $updated;


    public function __construct(
        $id = null,
        $title = null,
        $picture = null,
        $preview = null,
        $content = null,
        $price = null,
        $status = null,
        $created = null,
        $updated = null
    )
    {
        parent::__construct();


        $this->id = $id;
        $this->title = $title;
        $this->picture = $picture;
        $this->preview = $preview;
        $this->content = $content;
        $this->price = $price;
        $this->status = $status;
        $this->created = $created;
        $this->updated = $updated;

    }

    public function save()
    {
        if ($this->id > 0) {
            $query = "UPDATE `products` SET 
                            `title`='" . $this->title . "',
                            `preview`='$this->preview'," .
                ((!empty($this->picture)) ? "`picture` = '$this->picture'," : "")
                . " `content`='$this->content',
                            `price`='$this->price',
                            `updated`='$this->updated',
                            `status`='$this->status' 
                            WHERE id = $this->id";

        } else {
            $query = "INSERT INTO `products` VALUES (null,  '$this->title', '$this->picture', '$this->preview', '$this->content', '$this->price', '$this->status', '$this->created', '$this->updated')";
        }

        $result = mysqli_query($this->conn, $query);
    }

    public function all($categoriesIds = [], $limit = self::NUMBER_PRODUCT_PER_PAGE, $offset = 0)
    {
        $where = (!empty($categoriesIds) && is_array($categoriesIds))
            ? ' WHERE  cp.category_id IN (' . implode(',', $categoriesIds) . ')' : '';

        $query = "
                SELECT 
                products.* 
                FROM products 
                left join category_product cp on products.id = cp.id
                $where
                order by id desc limit $offset, $limit";

        $resultProducts = mysqli_query($this->conn, $query);
        return mysqli_fetch_all($resultProducts, MYSQLI_ASSOC);
    }

    public function getNumberPage($categoriesIds = [], $limit = self::NUMBER_PRODUCT_PER_PAGE)
    {
        $where = (!empty($categoriesIds) && is_array($categoriesIds))
            ? ' WHERE  cp.category_id IN (' . implode(',', $categoriesIds) . ')' : '';

        $query = "SELECT COUNT(*) FROM products $where ";

        $result = mysqli_query($this->conn, $query);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $number = reset($result);
        $number = reset($number);
        return floor($number / Product::NUMBER_PRODUCT_PER_PAGE);
    }

    public function getById($id)
    {
        $oneProductResult = mysqli_query($this->conn, "select * from products where id = $id limit 1");
        $oneProduct = mysqli_fetch_all($oneProductResult, MYSQLI_ASSOC);
        return reset($oneProduct);
    }

    public function delete($id)
    {
        mysqli_query($this->conn, "DELETE FROM products WHERE id=$id limit 1");
    }
}
