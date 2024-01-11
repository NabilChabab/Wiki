<?php

namespace App\controllers;
use App\models\UserModel;
use App\models\CategoryModel;
use App\models\TagModel;
use App\models\WikiModel;

require_once '../../vendor/autoload.php';


class AdminController
{
    
    public function tags()
    {
        include '../../views/admin/home.php';
        exit();
    }
    
    public function allusers(){
        $users = UserModel::getAllUsers();
        include '../../views/admin/home.php';
        exit();
    }

    public function allCategories(){
        $category = CategoryModel::getAllCategories();
        $tags = TagModel::getAllTags();
        include '../../views/admin/category.php';
        exit();
      
    }
    public function allwikis(){
        
        $wikis = WikiModel::getAllWikis();
        include '../../views/admin/wikis.php';
        exit();
    }

    public function getWikisById(){
        if (isset($_GET['id'])) {
            $id = base64_decode($_GET['id']);
            $wiki = WikiModel::getWikiById($id); 
            include '../../views/admin/editwiki.php';
            exit();
        } else {
            echo "Error: 'id' parameter is missing.";
        }
    }
    public function updateStatus(){
        if (isset($_POST["update"])) {
            if (isset($_GET['id'])) {
                $wikiId = base64_decode($_GET['id']);
                $status = $_POST['status'];
                var_dump($wikiId, $status);
                WikiModel::updateWiki($wikiId, $status);
                header('Location:wikis');
            } else {
                echo "Error: 'id' parameter is missing.";
            }
        }
    }

    public function updateCat(){
        $id = base64_decode($_GET["id"]);
        $newcat = CategoryModel::getCategoryById($id);
        include '../../views/admin/editCat.php';
        exit();
    }
    
}
