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

    public static function getCategoryById($id){
        $categories = CategoryDAO::getCategoryId($id);
        return $categories;
    }

    public static function updateCategory($id,$category){
        CategoryDAO::updateCategory($id,$category);
    }
}