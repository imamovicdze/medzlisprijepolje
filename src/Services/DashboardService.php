<?php
/**
 * Created by PhpStorm.
 * User: imamo
 * Date: 2/16/2018
 * Time: 12:18 AM
 */

namespace MedzlisPrijepolje\Services;

use MedzlisPrijepolje\Models\Category;
use Symfony\Component\Config\Definition\Exception\Exception;

class DashboardService {

    public function __construct()
    {
    }

    public function createCategory($category){
        try{
            $category = Category::create([
                "category_name" => $category
            ]);
            return $category->to_array();
        } catch (Exception $e){
            return false;
        }
    }

    public function getCategory(){
        try{
            $category = Category::all();
            return $category;
        } catch (Exception $e){
            return false;
        }
    }

    public function updateCategory($categoryId,$category){
        try{
            $category = Category::find($categoryId);
            $category->update_attributes([
                "category_name" => $category
            ]);
            return true;
        } catch(Exception $e){
            return false;
        }
    }

    public function deleteCategory(){
        try{

        } catch(Exception $e){
            return false;
        }
    }
}