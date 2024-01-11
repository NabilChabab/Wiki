<?php

namespace App\controllers;

require_once '../../vendor/autoload.php';
use App\models\CategoryModel;
use App\models\TagModel;
use App\models\WikiModel;
use App\database\Database;

session_start();
class HomeController
{

    public function addwk()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addwiki'])) {
           
            $title = $_POST['title'];
            $category = $_POST['category'];
            $tags = $_POST['tags']; 
            $file_name = $_FILES['image']['name'];
            $file_temp = $_FILES['image']['tmp_name'];
            $upload_image = "" . $file_name;
            $description = $_POST['description'];
            $user_id = $_SESSION['user_id'];
            $resulr = move_uploaded_file($file_temp, $upload_image);
            if ($resulr) {
                WikiModel::addWikiWithTags($title, $category, $tags, $upload_image, $description ,$user_id);
                header("Location: home"); 
                exit();
            } else {
            }
        }
    }

 
    public function allCategories(){
        $category = CategoryModel::getAllCategories();
        $tags = TagModel::getAllTags();
        include "../../views/user/addwiki.php";
        exit();
    }

    public function addwiki(){
            $wikis = WikiModel::getAllWikis();
            $category = CategoryModel::getAllCategories();
            $tags = TagModel::getAllTags();
            include "../../views/user/addwiki.php";
            exit();
        
    }

    public function getWikisById(){
        if (isset($_GET['id'])) {
            $id = base64_decode($_GET['id']);
            $wiki = WikiModel::getWikiById($id); 
            $wikis = WikiModel::getAllWikis();
            include '../../views/user/details.php';
            exit();
        } else {
            echo "Error: 'id' parameter is missing.";
        }
    }

    public function update(){
        if (isset($_POST["update"])) {
            if (isset($_GET['id'])) {
                $wikiId = base64_decode($_GET['id']);
                $status = $_POST['status'];
                var_dump($wikiId, $status);
                WikiModel::updateWiki($wikiId, $status);
                header('Location:profil');
            } else {
                echo "Error: 'id' parameter is missing.";
            }
        }
    }

    public function updatewiki(){
        if (isset($_GET['id'])) {
            $id = base64_decode($_GET['id']);
            $wiki = WikiModel::getWikiById($id); 
            $wikis = WikiModel::getAllWikis();
            $category = CategoryModel::getAllCategories();
            $tags = TagModel::getAllTags();
            include '../../views/user/updatewiki.php';
            exit();
        } else {
            echo "Error: 'id' parameter is missing.";
        }
    }

    public function updatewk()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatewiki'])) {
            $wikiId = base64_decode($_GET['id']);
            $title = $_POST['title'];
            $category = $_POST['category'];
            $tags = $_POST['tags'];
            $tags = isset($_POST['tags']) ? $_POST['tags'] : array(); 
            $file_name = $_FILES['image']['name'];
            $file_temp = $_FILES['image']['tmp_name'];
            $upload_image = "" . $file_name;
            $description = $_POST['description'];
            $user_id = $_SESSION['user_id'];
            $resulr = move_uploaded_file($file_temp, $upload_image);
            if ($resulr) {
                WikiModel::updateWikisForAuthor($wikiId,$title, $category, $tags, $upload_image, $description ,$user_id);
                header("Location: home"); 
                exit();
            } else {
            }
        }
    }

    public function deletewiki(){
        if (isset($_GET['id'])) {
            $id = base64_decode($_GET['id']);
            WikiModel::deleteWiki($id);
            header("Location: profil"); 
        }
    }

    public static function fetchWikis()
    {

        if (isset($_GET["q"])) {
            $query = $_GET['q'];
            $conn = Database::getInstance()->getConnection();
            $sql = "SELECT w.*, c.name as category_name
            FROM `wiki` w 
            JOIN `category` c ON w.category_id = c.id WHERE w.title LIKE :query";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['query' => '%' . $query . '%']);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            echo json_encode($result);
        }

       
    }
   
}
