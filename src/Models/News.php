<?php

namespace MedzlisPrijepolje\Models;

use ActiveRecord\Model;

class News extends Model
{
    static $table_name = 'news';

    public function serialize(){
        return $this->to_array([
            'include' =>
                [ 'news']
        ]);
    }
}