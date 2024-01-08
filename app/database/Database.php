<?php

namespace App\database;

require '../../vendor/autoload.php';

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Database
{
    private static $instance;
    private $connection;

    private function __construct()
    {
        try {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
            $dotenv->load();

            $this->connection = new PDO(
                'mysql:host=' . $_ENV['DB_SERVERNAME'] . ';dbname=' . $_ENV['DB_NAME'],
                $_ENV['DB_USERNAME'],
                $_ENV['DB_PASSWORD']
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}