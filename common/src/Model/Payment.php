<?php
include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class Payment extends AbstractModel
{
    /**
     * @var integer
     */
    private $id;


    /**
     * @var string
     * @valid {"maxlength": 64}
     */
    private $title;

    /**
     * @var string
     */
    private $code;

    /**
     * @var int
     */
    private $priority;




    public function __construct(
        $id = null,
        $title = null,
        $code = null,
        $priority = null
    )
    {
        parent::__construct();

        $this->id = $id;
        $this->title = $title;
        $this->code = $code;
        $this->priority = $priority;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }


    public function save()
    {
        if ($this->id > 0) {
            $query = "UPDATE `payment` SET 
                            `title`='" . $this->title . "',
                            `code`='$this->code',
                            `priority`='$this->priority'
                            WHERE id = $this->id";
        } else {
            $query = "INSERT INTO `payment` VALUES (null,  '$this->title', '$this->code', '$this->priority')";
        }

        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            throw new Exception('Bad request', 400);
        }
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM payment ORDER BY id DESC ");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM payment WHERE id = $id");
        $one = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($one);
    }

    public function deleteById($id)
    {
        mysqli_query($this->conn, "DELETE FROM payment WHERE id=$id");
    }
}
