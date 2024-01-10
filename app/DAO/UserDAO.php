<?php

namespace App\DAO;

require '../../vendor/autoload.php';

use App\database\Database;

class UserDAO
{
    public static function registerUser($fullname, $address, $profil, $email, $password , $roleId)
    {
        try {
            $conn = Database::getInstance()->getConnection();

            $sql = "INSERT INTO `user` (`fullname`, `address`, `profil`, `email`, `password`, `role_id`) VALUES(?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(1, $fullname);
            $stmt->bindParam(2, $address);
            $stmt->bindParam(3, $profil);
            $stmt->bindParam(4, $email);
            $stmt->bindParam(5, $password);
            $stmt->bindParam(6, $roleId);

            $stmt->execute();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function getUserByEmail($email)
    {
        try {
            $conn = Database::getInstance()->getConnection();

            $sql = "SELECT * FROM `user` WHERE `email` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $email);
            $stmt->execute();

            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $user;
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null; 
        }
    }

    public static function getAllUsers(){
        try {

            $conn = Database::getInstance()->getConnection();
            $sql = "SELECT * FROM `user`WHERE role_id = 2 ORDER BY fullname DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $users;
        }catch (\PDOException $e) {
            echo "Error". $e->getMessage();
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

}
