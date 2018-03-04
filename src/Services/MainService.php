<?php
/**
 * Created by PhpStorm.
 * User: imamo
 * Date: 2/10/2018
 * Time: 5:37 PM
 */

use Symfony\Component\Config\Definition\Exception\Exception;
namespace MedzlisPrijepolje\Services;
use MedzlisPrijepolje\Models\Category;

class MainService
{
    public function __construct(){

    }

    public function getCategory(){
        try{
            $categories = Category::find('all');
            $categoriesinArray = $this->toCategoryArray($categories);
            return $categoriesinArray;
        } catch (Exception $e){
            return false;
        }
    }

    //protected functions

    protected function toCategoryArray($categories){
        $array = array();
        foreach ($categories as $category){
            $array[] = $category->to_array();
        }
        return $array;
    }
}