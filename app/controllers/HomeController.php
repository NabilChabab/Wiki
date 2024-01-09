<?php

namespace App\controllers;

require_once '../../vendor/autoload.php';
use App\models\CategoryModel;
use App\models\TagModel;
use App\models\WikiModel;

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

    public function getWikisById(){
        if (isset($_GET['id'])) {
            $id = base64_decode($_GET['id']);
            $wiki = WikiModel::getWikiById($id); 
            include '../../views/user/details.php';
            exit();
        } else {
            echo "Error: 'id' parameter is missing.";
        }
    }
    

   
}
