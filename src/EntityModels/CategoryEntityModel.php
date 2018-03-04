<?php

namespace MedzlisPrijepolje\EntityModels;


class CategoryEntityModel
{
    public $category_name;

    public function __construct($category_name)
    {
        $this->category_name = $category_name;
    }
}