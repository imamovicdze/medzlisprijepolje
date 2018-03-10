<?php

namespace Medzlisprijepolje\Models;

use ActiveRecord\Model;

class Category extends Model
{
    static $table_name = 'categories';

    public function serialize(){
        return $this->to_array([
            'include' =>
                [ 'categories']
        ]);
    }
}