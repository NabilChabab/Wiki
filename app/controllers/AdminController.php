<?php

namespace App\controllers;
use App\models\UserModel;
use App\models\CategoryModel;
use App\models\TagModel;
use App\models\WikiModel;

require_once '../../vendor/autoload.php';


class AdminController
{

    public function admin($users)
    {
        include '../../views/admin/home.php';
        exit();
    }
    public function category($category , $tags)
    {
        include '../../views/admin/category.php';
        exit();
    }
    public function tags()
    {
        include '../../views/admin/home.php';
        exit();
    }
    public function wikis()
    {
        include '../../views/admin/home.php';
        exit();
    }

    public function allusers(){
        $users = UserModel::getAllUsers();
        $this->admin($users);
    }

    public function allCategories(){
        $category = CategoryModel::getAllCategories();
        $tags = TagModel::getAllTags();
        $this->category($category , $tags);
    }
    

   
}
