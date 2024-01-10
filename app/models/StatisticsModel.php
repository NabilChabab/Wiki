<?php

namespace App\models;

require '../../vendor/autoload.php';
use App\DAO\StatisticsDAO;


class StatisticsModel
{
    public static function CountTags(){
        $count_tags = StatisticsDAO::TagsStatistic();
        return $count_tags;
    }

    public static function CountCategories(){
        $count_cats = StatisticsDAO::CategoriesStatistic();
        return $count_cats;
    }

    public static function CountUsers(){
        $count_users = StatisticsDAO::UserStatistic();
        return $count_users;
    }

    public static function CountWikis(){
        $count_wikis = StatisticsDAO::WikisStatistic();
        return $count_wikis;
    }
}