<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class MigrationAddCategoryGroupTable
{
    private $conn;

    public function __construct(DBConnector $connector)
    {
        $this->conn = $connector->connect();
    }

    public function commit()
    {
        $result = mysqli_query($this->conn, "CREATE TABLE `category_group`  ( 
            `id` INT NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(64) NOT NULL,
            PRIMARY KEY (`id`)) ENGINE = InnoDB;");


        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }

        $result = mysqli_query($this->conn, "INSERT INTO `category_group` (`id`, `title`) VALUES 
            (NULL, 'Жанр'), 
            (NULL, 'Топ 100'), 
            (NULL, 'Авторы'), 
            (NULL, 'Часто покупаемые'), 
            (NULL, 'Год издание');
            ");


        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }

        $result = mysqli_query($this->conn, "
            INSERT INTO `categories` (`id`, `title`, `group_id`, `parent_id`, `prior`) VALUES 
                (NULL, 'Комедии', '1', '0', '100'), 
                (NULL, 'Детективы', '1', '0', '90'), 
                (NULL, 'Фантастика', '1', '0', '80'), 
                (NULL, 'Драма', '1', '0', '70'), 
                (NULL, 'Научные', '1', '0', '60'), 
                (NULL, 'Исторические', '1', '0', '50'), 
                (NULL, 'Бизнес', '1', '0', '1000'),
                (NULL, 'За 2020 год', '2', '0', '1000'), 
                (NULL, 'За текущий год', '2', '0', '100'), 
                (NULL, 'За 20 столетие', '2', '0', '90'),
                (NULL, 'Бил Мартин', '3', '0', '1000'), 
                (NULL, 'Джеймс Хериот', '3', '0', '100'), 
                (NULL, 'Тини Ченнез', '3', '0', '90'), 
                (NULL, 'Комедии', '4', '0', '100'), 
                (NULL, 'Детское', '4', '0', '90'), 
                (NULL, 'Детективы', '4', '0', '80'), 
                (NULL, '1800-1900', '5', '0', '100'), 
                (NULL, '1900-2000', '5', '0', '90'), 
                (NULL, '21 век', '5', '0', '70'), 
                (NULL, 'Десткие', '1', '0', '50'), 
                (NULL, 'Духовные', '1', '0', '40');
            ");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }

        $result = mysqli_query($this->conn, "
            CREATE TABLE `db_shop`.`category_product` ( 
            `id` INT NOT NULL AUTO_INCREMENT ,  
            `product_id` INT NOT NULL ,  
            `category_id` INT NOT NULL ,    
            PRIMARY KEY  (`id`)) ENGINE = InnoDB;
            ");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }

    public function rollback()
    {
        $result = mysqli_query($this->conn, "DROP TABLE `category_group`");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
        $result = mysqli_query($this->conn, "TRUNCATE TABLE `categories`");
        if (!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }
}
