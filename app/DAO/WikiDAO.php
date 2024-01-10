<?php

namespace App\DAO;

use App\database\Database;
use App\DAO\TagDAO;

require '../../vendor/autoload.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
use PHPMailer;

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
            $stmt->bindParam(1, $title);
            $stmt->bindParam(2, $description);
            $stmt->bindParam(3, $image);
            $stmt->bindParam(4, $user_id);
            $stmt->bindParam(5, $categoryId);
            $stmt->execute();
            $lastid = $conn->lastInsertId();
            self::addTagsForWiki($lastid, $tags);
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
                $stmt->bindParam(1, $wikiId);
                $stmt->bindParam(2, $tagId);
                $stmt->execute();
            } else {
                echo "Error: Tag not found - $tag";
            }
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

    public static function updateWiki($wikiId, $status)
    {
        try {
            $conn = Database::getInstance()->getConnection();
            $sql = "UPDATE `wiki` SET `status` = ? WHERE `id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $status);
            $stmt->bindParam(2, $wikiId);
            $stmt->execute();
    
            // Fetch user email
            $userEmail = self::getUserEmailByWikiId($wikiId);
    
            if ($userEmail) {
                // Send email notification
                $subject = 'Wiki Status Update';
                $message = "Your wiki status has been updated to $status.";
    
                self::sendEmail($userEmail, $subject, $message);
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getWikisById($wikiId){
        try {
            $conn = Database::getInstance()->getConnection();
            $sql = "SELECT w.*, u.fullname AS user_name, u.email AS user_email, u.profil AS user_profil, t.name AS tag_name
            FROM Wiki w
            JOIN User u ON w.user_id = u.id
            LEFT JOIN Wiki_Tag wt ON w.id = wt.wiki_id
            LEFT JOIN Tag t ON wt.tag_id = t.id
            WHERE w.id = ?;
            ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $wikiId);
            $stmt->execute();
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
        $stmt->bindParam(1, $wikiId);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $result['email'] ?? null;
    } catch (\PDOException $e) {
        echo $e->getMessage();
        return null;
    }
}

public static function sendEmail($to, $subject, $message)
{
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your_username';
    $mail->Password = 'your_password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('nabil.chababnabil@gmail.com', 'Your Name');
    $mail->addAddress($to);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if ($mail->send()) {
        echo 'Email sent successfully';
    } else {
        echo 'Error: ' . $mail->ErrorInfo;
    }
}



}