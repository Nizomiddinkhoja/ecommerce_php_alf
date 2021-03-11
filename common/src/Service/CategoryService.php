<?php

include_once __DIR__ . "/../Model/Category.php";

class CategoryService
{
    const GENRE_GROUP_ID = 1;

    public static function getGenres()
    {
        return (new Category())->getByGroupIds([self::GENRE_GROUP_ID]);
    }

    public static function getCategoriesForSideBar()
    {
        return (new Category())->getGroupWithCategories([self::GENRE_GROUP_ID]);
    }
}
