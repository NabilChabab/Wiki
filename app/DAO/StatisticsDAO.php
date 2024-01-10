<?php

namespace App\DAO;

require '../../vendor/autoload.php';

use App\database\Database;

class StatisticsDAO
{


    public static function CategoriesStatistic(){
        try{
            $conn = Database::getInstance()->getConnection();
            $sql = "SELECT COUNT(*) AS categories_count FROM category";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }
        catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function UserStatistic(){
        try{
            $conn = Database::getInstance()->getConnection();
            $sql = "SELECT COUNT(*) AS users_count FROM user";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }
        catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function TagsStatistic(){
        try{
            $conn = Database::getInstance()->getConnection();
            $sql = "SELECT COUNT(*) AS tags_count FROM tag";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }
        catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function WikisStatistic(){
        try{
            $conn = Database::getInstance()->getConnection();
            $sql = "SELECT COUNT(*) AS accepted_wikis_count FROM wiki WHERE status = 'Accepted'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }
        catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
}
