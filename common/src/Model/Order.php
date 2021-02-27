<?php
include_once __DIR__ . "/../Service/DBConnector.php";

class Order
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $userId;
    /**
     * @var int
     */
    private $deliveryId;
    /**
     * @var int
     */
    private $paymentId;
    /**
     * @var int
     */
    private $total;
    /**
     * @var string
     */
    private $comment;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $phone;
    /**
     * @var string
     */
    private $email;
    /**
     * @var int
     */
    private $status;
    /**
     * @var dateTime
     */
    private $created;
    /**
     * @var dateTime
     */
    private $updated;

    private $conn;

    /**
     * Order constructor.
     * @param null $id
     * @param null $userId
     * @param null $paymentId
     * @param null $deliveryId
     * @param null $total
     * @param null $comment
     * @param null $name
     * @param null $phone
     * @param null $email
     * @param null $status
     * @param null $updated
     */
    public function __construct(
        $id = null,
        $userId = null,
        $paymentId = null,
        $deliveryId = null,
        $total = null,
        $comment = null,
        $name = null,
        $phone = null,
        $email = null,
        $status = null,
        $updated = null)
    {

        $this->conn = DBConnector::getInstance()->connect();

        $this->id = $id;
        $this->userId = $userId;
        $this->paymentId = $paymentId;
        $this->deliveryId = $deliveryId;
        $this->total = $total;
        $this->comment = $comment;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->status = $status;
        if ($this->id == null) {
            $this->created = date('Y-m-d H:i:s', time());
        }
        $this->updated = $updated ?? date('Y-m-d H:i:s', time());
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param null $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getDeliveryId()
    {
        return $this->deliveryId;
    }

    /**
     * @param int $deliveryId
     */
    public function setDeliveryId($deliveryId)
    {
        $this->deliveryId = $deliveryId;
    }

    /**
     * @return int
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * @param int $paymentId
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }


    /**
     * @return false|string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param false|string $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return false|string|null
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param false|string|null $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }


    public function save()
    {
        $query = "INSERT INTO `orders` (
            `id`, 
            `user_id`, 
            `total`, 
            `payment_id`, 
            `delivery_id`, 
            `comment`, 
            `name`, 
            `phone`, 
            `email`, 
            `status`, 
            `created`, 
            `updated`)
             VALUES (null, 
             '$this->userId',
             '$this->total', 
             '$this->paymentId',
             '$this->deliveryId',
             '$this->comment',
             '$this->name',
             '$this->phone',
             '$this->email',
             '$this->status', 
             '$this->created', 
             '$this->updated')";

        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            throw new Exception(mysqli_error($this->conn));
        }

        $result = mysqli_query($this->conn, "SELECT LAST_INSERT_ID() as last_id");

        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return reset($result)['last_id'] ?? null;
    }

    public function update()
    {
        $query = "UPDATE `orders` SET 
             total = '$this->total', 
             payment_id = '$this->paymentId',
             delivery_id = '$this->deliveryId', 
             name ='$this->name',
             phone = '$this->phone',
             email= '$this->email',
             status = '$this->status',  
             updated = '$this->updated' WHERE id = '$this->id' limit 1";

        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            throw new Exception(mysqli_error($this->conn));
        }

        return true;
    }

    public function getFromDB()
    {
        $oneProductResult = mysqli_query($this->conn, "select * from orders where user_id = " . $this->userId . " limit 1");
        $one = mysqli_fetch_all($oneProductResult, MYSQLI_ASSOC);
        return reset($one);
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "select * from orders");

        return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }

    public function getById($id)
    {
        $result = mysqli_query($this->conn, "select * from orders where id = " . $id . " limit 1");
        $one = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($one);
    }

//    public function deleteUserById($userId)
//    {
//        mysqli_query($this->conn, "DELETE FROM orders WHERE user_id = $userId limit 1");
//    }
}
