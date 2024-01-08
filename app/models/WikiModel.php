<?php

namespace App\models;

use App\DAO\WikiDAO;

require '../../vendor/autoload.php';

class WikiModel
{
    public static function addWikiWithTags($title, $category, $tags, $image, $description , $user_id)
    {
        $wikiId = WikiDAO::addWiki($title, $category, $image, $description , $user_id , $tags);

        if ($wikiId) {
            WikiDAO::addTagsForWiki($wikiId, $tags);
        }

        return $wikiId;
    }
    public static function getAllWikis(){
        $wiki = WikiDAO::getAllWikis();
        return $wiki;
    }

    public static function getWikisByuserId($userId){
        $wiki = WikiDAO::getWikisByuserId($userId);
        return $wiki;
    }

}
