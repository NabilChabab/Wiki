<?php

namespace App\DAO;

use App\database\Database;
use App\DAO\TagDAO;

require '../../vendor/autoload.php';


class WikiDAO
{
    public static function addWiki($title, $category, $image, $description, $user_id, $tags)
    {
        try {
            $conn = Database::getInstance()->getConnection();

            $categoryInfo = CategoryDAO::getCategoryId($category);

            if (!$categoryInfo || !isset($categoryInfo['id'])) {
                echo "Error: Category not found.";
                return false;
            }

            $categoryId = $categoryInfo['id'];

            $sql = "INSERT INTO `wiki` (`title`, `description`, `image`, `user_id`, `category_id`) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $result =  $stmt->execute([$title , $description , $image , $user_id , $categoryId]);
            $lastid = $conn->lastInsertId();
            if($result){
                self::addTagsForWiki($lastid, $tags);
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }



    public static function addTagsForWiki($wikiId, $tags)
    {
        try {
            $conn = Database::getInstance()->getConnection();

            foreach ($tags as $tag) {
                $tagId = TagDAO::getTagId($tag);

                if ($tagId !== null) {
                    $sql = "INSERT INTO `wiki_tag` (`wiki_id`, `tag_id`) VALUES (?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$wikiId , $tagId]);
                } else {
                    echo "Error: Tag not found - $tag";
                }
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }




    public static function getAllWikis()
    {
        try {
            $conn = Database::getInstance()->getConnection();
            $sql = "SELECT w.*, c.name as category_name
            FROM `wiki` w
            JOIN `category` c ON w.category_id = c.id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function getWikisByuserId($userId)
    {
        try {
            $conn = Database::getInstance()->getConnection();
            $sql = "SELECT * FROM `wiki` WHERE user_id = ? AND status = 'Accepted'";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$userId]);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function updateWiki($wikiId, $status)
    {
        
        try {
            $conn = Database::getInstance()->getConnection();
            $sql = "UPDATE `wiki` SET `status` = ? WHERE `id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$status , $wikiId]);
        
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function updateWikisForAuthor($wikiId, $title, $category, $image, $description, $user_id, $tags)
    {
        try {
            $conn = Database::getInstance()->getConnection();
            $conn->beginTransaction();
    
            $categoryInfo = CategoryDAO::getCategoryId($category);
    
            if (!$categoryInfo || !isset($categoryInfo['id'])) {
                echo "Error: Category not found.";
                return false;
            }
    
            $categoryId = $categoryInfo['id'];
    
            $sql = "UPDATE `wiki` SET `title` = ?, `description` = ?, `image` = ?, `user_id` = ?, `category_id` = ? WHERE `id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$title , $description , $image , $user_id , $categoryId , $wikiId]);
    
            $deleteSql = "DELETE FROM `wiki_tag` WHERE `wiki_id` = ?";
            $deleteStmt = $conn->prepare($deleteSql);
            $deleteStmt->bindParam(1, $wikiId);
            $deleteStmt->execute();
    
            self::addTagsForWiki($wikiId, $tags);
            $conn->commit();
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public static function getWikisById($wikiId)
    {
        try {
            $conn = Database::getInstance()->getConnection();
            $sql = "SELECT 
            w.*,
            u.fullname AS user_name,
            u.email AS user_email,
            u.profil AS user_profil,
            c.name AS category_name,
            GROUP_CONCAT(t.name SEPARATOR '#') AS tag_names
        FROM Wiki w
        JOIN User u ON w.user_id = u.id
        JOIN category c ON w.category_id = c.id
        JOIN Wiki_Tag wt ON w.id = wt.wiki_id
        JOIN Tag t ON wt.tag_id = t.id 
        WHERE w.id = ?
        GROUP BY w.id;
        
            ";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$wikiId]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $result;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getUserEmailByWikiId($wikiId)
    {
        try {
            $conn = Database::getInstance()->getConnection();
            $sql = "SELECT u.email FROM `wiki` w JOIN `user` u ON w.user_id = u.id WHERE w.id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$wikiId]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $result['email'] ?? null;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public static function deleteWiki($wikiId){
        try {
            $conn = Database::getInstance()->getConnection();
            $sql = 'DELETE FROM `wiki` WHERE id = ?';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$wikiId]);
        }
        catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    



}