<?php

namespace App\DAO;

use App\database\Database;
use App\DAO\TagDAO;

require '../../vendor/autoload.php';

class WikiDAO
{
    public static function addWiki($title, $category, $image, $description , $user_id , $tags)
{
    try {
        $conn = Database::getInstance()->getConnection();

        $categoryId = CategoryDAO::getCategoryIdByName($category);

        if (!$categoryId) {
            echo "Error: Category not found.";
            return false;
        }

        $sql = "INSERT INTO `Wiki` (`title`, `description`, `image`, `user_id` , `category_id`) VALUES (?, ?, ?, ? ,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $description);
        $stmt->bindParam(3, $image);
        $stmt->bindParam(4, $user_id);
        $stmt->bindParam(5, $categoryId); 
        $stmt->execute();

        $lastid = $conn->lastInsertId();
        self::addTagsForWiki($lastid , $tags);
    } catch (\PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}


public static function addTagsForWiki($wikiId, $tags)
{
    try {
        $conn = Database::getInstance()->getConnection();

            $tagId = TagDAO::getTagIdByName($tags);

            if ($tagId) {
                $sql = "INSERT INTO `wiki_tag` (`wiki_id`, `tag_id`) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $wikiId);
                $stmt->bindParam(2, $tagId);
                $stmt->execute();
            }
        
    } catch (\PDOException $e) {
        echo $e->getMessage();
    }
}


    public static function getAllWikis(){
        try{
            $conn = Database::getInstance()->getConnection();
            $sql = "SELECT w.*, c.name as category_name
            FROM `wiki` w
            JOIN `category` c ON w.category_id = c.id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;

        }
        catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function getWikisByuserId($userId){
        try{
            $conn = Database::getInstance()->getConnection();
            $sql = "SELECT * FROM `wiki` WHERE user_id = ? AND status = 'Accepted'";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $userId);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }
        catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
