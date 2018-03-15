<?php

namespace MedzlisPrijepolje\Services;

use MedzlisPrijepolje\Models\Category;
use MedzlisPrijepolje\EntityModels\CategoryEntityModel;
use Symfony\Component\Config\Definition\Exception\Exception;

class CategoryService
{

    public function __construct()
    {
    }

    public function createCategory(CategoryEntityModel $entityModel){
        try{
            $category = Category::create([
                "category_name" => $entityModel->category_name
            ]);
            return (int)$category->id;
        } catch (Exception $e){
            return false;
        }
    }

    public function readCategory(){
        try{
            $categories = Category::find('all');
            $categoriesinArray = $this->toCategoryArray($categories);
            return $categoriesinArray;
        } catch (Exception $e){
            return false;
        }
    }

    public function updateCategory(CategoryEntityModel $entityModel,$id){
        try{
            $category = Category::find($id);
            $category->update_attributes([
                "category_name" => $entityModel->category_name
            ]);
            return true;
        } catch(Exception $e){
            return false;
        }
    }

    public function deleteCategory($id){
        try{
            $category = Category::find($id);
            $category->delete();
            return true;
        } catch(Exception $e){
            return false;
        }
    }

    public function getCategoryById($id){
        try{
            $category = Category::find($id);
            return $category->serialize();
        } catch (Exception $e){
            return $e;
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