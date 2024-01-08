<?php

namespace App\controllers;
use App\models\TagModel;

require_once '../../vendor/autoload.php';


class TagController
{

    public static function addTag(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addtag'])) {
            $tag = $_POST['tag'];

            TagModel::addTag($tag);
            header("Location: category");
            exit();
        }
    }
    

   
}
