<?php

namespace App\models;

require '../../vendor/autoload.php';
use App\DAO\TagDAO;


class TagModel
{
    public static function addTag($tag){
        TagDAO::addTag($tag);
    }
    public static function getAllTags(){
        $tags = TagDAO::getAllTags();
        return $tags;
    }
}