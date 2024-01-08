<?php

namespace App\DAO;

require '../../vendor/autoload.php';

use App\database\Database;

class CategoryDAO
{

    public static function addCategory($category){
        try{
            $conn = Database::getInstance()->getConnection();

            $sql = "INSERT INTO `category` (`name`) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1,$category);
            $stmt->execute();
    
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function getAllCategories(){
        try{
            $conn = Database::getInstance()->getConnection();
            $sql = "SELECT * FROM `category`";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }
        catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function getCategoryIdByName($categoryName)
    {
        try {
            $conn = Database::getInstance()->getConnection();

            $sql = "SELECT `id` FROM `category` WHERE `name` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $categoryName);
            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($result) {
                return $result['id'];
            }

            return false;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function getCategoryId($categoryid)
    {
        try {
            $conn = Database::getInstance()->getConnection();

            $sql = "SELECT `id` FROM `category` WHERE `id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $categoryid);
            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($result) {
                return $result['id'];
            }

            return false;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
}
