<?php

namespace MedzlisPrijepolje\EntityModels;


class NewsEntityModel
{
    public $title;
    public $content;
    public $category_id;

    public function __construct($title, $content,$category_id)
    {
        $this->title = $title;
        $this->content = $content;
        $this->category_id = $category_id;
    }
}