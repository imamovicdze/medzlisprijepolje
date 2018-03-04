<?php
/**
 * Created by PhpStorm.
 * User: imamo
 * Date: 2/16/2018
 * Time: 12:18 AM
 */

namespace MedzlisPrijepolje\Services;

use MedzlisPrijepolje\Models\Category;
use MedzlisPrijepolje\Models\News;
use MedzlisPrijepolje\EntityModels\CategoryEntityModel;
use MedzlisPrijepolje\EntityModels\NewsEntityModel;
use Symfony\Component\Config\Definition\Exception\Exception;

class DashboardService {

    public function __construct()
    {
    }

    //crud category
    public function createCategory(CategoryEntityModel $entityModel){
        try{
            $category = Category::create([
                "category_name" => $entityModel->category_name
            ]);
            return $category->to_array();
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
            return $category;
        } catch(Exception $e){
            return false;
        }
    }


    //crud news
    public function createNews(NewsEntityModel $entityModel){
        try{
            $news = News::create([
                "title" => $entityModel->title,
                "content" => $entityModel->content
            ]);
            return $news->to_array();
        } catch (Exception $e){
            return false;
        }
    }

    public function readNews(){
        try{
            $news = News::find('all');
            $newsInArray = $this->toNewsArray($news);
            return $newsInArray;
        } catch (Exception $e){
            return false;
        }
    }

    public function updateNews(NewsEntityModel $entityModel, $id){
        try{
            $news = News::find($id);
            $news->update_attributes([
                "title" => $entityModel->title,
                "content" => $entityModel->content
            ]);
            return true;
        } catch(Exception $e){
            return false;
        }
    }

    public function deleteNews($id){
        try{
            $news = News::find($id);
            $news->delete();
            return $news;
        } catch (Exception $e){
            return false;
        }
    }

    // protected functions

    protected function toCategoryArray($categories){
        $array = array();
        foreach ($categories as $category){
            $array[] = $category->to_array();
        }
        return $array;
    }

    protected function toNewsArray($news){
        $array = array();
        foreach($news as $new){
            $array[] = $new->to_array();
        }
        return $array;
    }
}