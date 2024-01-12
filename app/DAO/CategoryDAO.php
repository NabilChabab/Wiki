<?php

namespace App\DAO;

require '../../vendor/autoload.php';

use App\database\Database;

class CategoryDAO
{

    public static function addCategory($category)
    {
        try {
            $conn = Database::getInstance()->getConnection();

            $sql = "INSERT INTO `category` (`name`) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$category]);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function getAllCategories()
    {
        try {
            $conn = Database::getInstance()->getConnection();
            $sql = "SELECT * FROM `category`";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function getCategoryIdByName($categoryName)
    {
        try {
            $conn = Database::getInstance()->getConnection();

            $sql = "SELECT `id` FROM `category` WHERE `name` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$categoryName]);

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($result) {
                return $result['id'];
            }

            return false;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function getCategoryId($categoryid)
    {
        try {
            $conn = Database::getInstance()->getConnection();

            $sql = "SELECT * FROM `category` WHERE `id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$categoryid]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result;

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function updateCategory($categoryId, $newCategoryName)
    {
        try {
            $conn = Database::getInstance()->getConnection();

            $sql = "UPDATE `category` SET `name` = ? WHERE `id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$newCategoryName , $categoryId]);
            return true;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
