<?php

namespace MedzlisPrijepolje\EntityModels;


class NewsEntityModel
{
    public $title;
    public $content;

    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }
}