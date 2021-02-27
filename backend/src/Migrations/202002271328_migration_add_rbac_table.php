<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";
include_once __DIR__ . "/../../../common/src/Model/User.php";

class MigrationAddRbacTable
{
    private $conn;

    public function __construct(DBConnector $connector)
    {
        $this->conn = $connector->connect();
    }

    public function commit()
    {
        $result = mysqli_query($this->conn, "
            CREATE TABLE `rbac_role` (
                 `id` int(11) NOT NULL AUTO_INCREMENT,
                 `role` varchar(256) NOT NULL,
                 PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }

        $result = mysqli_query($this->conn, "
            CREATE TABLE `rbac_permission` (
                 `id` int(11) NOT NULL AUTO_INCREMENT,
                 `permission` varchar(256) NOT NULL UNIQUE,
                 PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }


        $result = mysqli_query($this->conn, "
            CREATE TABLE `rbac_access` (
                 `id` int(11) NOT NULL AUTO_INCREMENT,
                 `role` varchar(256) NOT NULL,
                 `permission` varchar(256) NOT NULL,
                 PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }


        $result = mysqli_query($this->conn, "INSERT INTO `rbac_role` (`id`, `role`)
            VALUES (NULL, 'ROLE_ADMIN'), 
                    (NULL, 'ROLE_MANAGER'), 
                    (NULL, 'ROLE_SHOP_MANAGER'),
                    (NULL, 'ROLE_SHOP_ADMIN'),
                    (NULL, 'ROLE_PRODUCT_ADMIN')");

        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }


        $result = mysqli_query($this->conn, "INSERT INTO `rbac_permission` (`id`, `permission`) VALUES 
                    (NULL, 'SHOP_READ'), 
                    (NULL, 'SHOP_CREATE'), 
                    (NULL, 'SHOP_UPDATE'), 
                    (NULL, 'SHOP_DELETE'), 
                    (NULL, 'PRODUCT_READ'), 
                    (NULL, 'PRODUCT_CREATE'), 
                    (NULL, 'PRODUCT_UPDATE'), 
                    (NULL, 'PRODUCT_DELETE'),
                    (NULL, 'DELIVERY_READ'), 
                    (NULL, 'DELIVERY_CREATE'), 
                    (NULL, 'DELIVERY_UPDATE'), 
                    (NULL, 'DELIVERY_DELETE'), 
                    (NULL, 'PAYMENT_READ'), 
                    (NULL, 'PAYMENT_CREATE'), 
                    (NULL, 'PAYMENT_UPDATE'), 
                    (NULL, 'PAYMENT_DELETE')");

        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }


        $result = mysqli_query($this->conn, "INSERT INTO `rbac_access` (`id`, `role`, `permission`) VALUES 
                    (NULL, 'ROLE_ADMIN', 'SHOP_READ'), 
                    (NULL, 'ROLE_ADMIN', 'SHOP_CREATE'), 
                    (NULL, 'ROLE_ADMIN', 'SHOP_UPDATE'), 
                    (NULL, 'ROLE_ADMIN', 'SHOP_DELETE'), 
                    (NULL, 'ROLE_ADMIN', 'PRODUCT_READ'), 
                    (NULL, 'ROLE_ADMIN', 'PRODUCT_CREATE'), 
                    (NULL, 'ROLE_ADMIN', 'PRODUCT_UPDATE'), 
                    (NULL, 'ROLE_ADMIN', 'PRODUCT_DELETE'),
                    (NULL, 'ROLE_ADMIN', 'DELIVERY_READ'), 
                    (NULL, 'ROLE_ADMIN', 'DELIVERY_CREATE'), 
                    (NULL, 'ROLE_ADMIN', 'DELIVERY_UPDATE'), 
                    (NULL, 'ROLE_ADMIN', 'DELIVERY_DELETE'), 
                    (NULL, 'ROLE_ADMIN', 'PAYMENT_READ'), 
                    (NULL, 'ROLE_ADMIN', 'PAYMENT_CREATE'), 
                    (NULL, 'ROLE_ADMIN', 'PAYMENT_UPDATE'), 
                    (NULL, 'ROLE_ADMIN', 'PAYMENT_DELETE'),
                    (NULL, 'ROLE_MANAGER', 'SHOP_READ'),  
                    (NULL, 'ROLE_MANAGER', 'PRODUCT_READ'),  
                    (NULL, 'ROLE_MANAGER', 'DELIVERY_READ'),  
                    (NULL, 'ROLE_MANAGER', 'PAYMENT_READ')");

        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }

    public function rollback()
    {
        $result = mysqli_query($this->conn, "DROP TABLE `rbac_role`");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
        $result = mysqli_query($this->conn, "DROP TABLE `rbac_permission`");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
        $result = mysqli_query($this->conn, "DROP TABLE `rbac_access`");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }
}
