<?php

namespace App\models;

require '../../vendor/autoload.php';
use App\DAO\CategoryDAO;


class CategoryModel
{
    public static function addCategory($category){
        CategoryDAO::addCategory($category);
    }
    public static function getAllCategories(){
        $categories = CategoryDAO::getAllCategories();
        return $categories;
    }
}