<?php


class User
{

    const ROLE_USER_VALUE = 'ROLE_USER';
    const ROLE_SUPER_ADMIN_VALUE = 'ROLE_SUPER_ADMIN';
    /**
     * @var integer
     */
    private $id;

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
     * @var string
     */
    private $password;

    /**
     * @var array
     */
    private $roles;


    private $conn;

    public function __construct(
        $id = null,
        $name = null,
        $phone = null,
        $email = null,
        $password = null,
        $roles = null
    )
    {
        $this->conn = DBConnector::getInstance()->connect();

        $this->setId($id);
        $this->setName($name);
        $this->setPhone($phone);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setRoles($roles);
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
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = md5($password);
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }


    public function save()
    {
        if ($this->id > 0) {
            $query = "UPDATE `user` SET 
                            `name`='" . $this->getName() . "',
                            `phone`='" . $this->getPhone() . "',
                            `email`='" . $this->getEmail() . "',
                            `password`='" . $this->getPassword() . "',
                            `roles`='" . json_encode($this->getRoles()) . "',
                            WHERE id = $this->id";

        } else {
            $query = "INSERT INTO `user`(`id`, `name`, `phone`, `email`, `password`, `roles`) VALUES (
                null,  
                '" . $this->getName() . "', 
                '" . $this->getPhone() . "', 
                '" . $this->getEmail() . "', 
                '" . $this->getPassword() . "', 
                '" . json_encode($this->getRoles()) . "')";
        }

        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            throw new Exception(mysqli_error($this->conn), 400);
        }
    }


}
