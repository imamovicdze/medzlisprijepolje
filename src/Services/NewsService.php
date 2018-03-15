<?php

namespace MedzlisPrijepolje\Services;

use MedzlisPrijepolje\Models\News;
use MedzlisPrijepolje\EntityModels\NewsEntityModel;
use Symfony\Component\Config\Definition\Exception\Exception;

class NewsService
{

    public function __construct()
    {
    }

    public function createNews(NewsEntityModel $entityModel){
        try{
            $news = News::create([
                "title" => $entityModel->title,
                "content" => $entityModel->content,
                "category_id" => $entityModel->category_id
            ]);
            return (int)$news->id;
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
                "content" => $entityModel->content,
                "category_id" => $entityModel->category_id
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
            return true;
        } catch (Exception $e){
            return false;
        }
    }

    public function getNewsById($id){
        try{
            $news = News::find($id);
            return $news->serialize();
        } catch (Exception $e){
            return $e;
        }
    }

    public function getNewsLastFive(){
        try{
            $news = News::find('all',array('limit' => 5,'order' => 'id desc'));
            $newsInArray = $this->toNewsArray($news);
            return $newsInArray;
        } catch (Exception $e){
            return $e;
        }
    }

    public function getNewsLastThree(){
        try{
            $news = News::find('all',array('limit' => 3,'order' => 'id desc'));
            $newsInArray = $this->toNewsArray($news);
            return $newsInArray;
        } catch (Exception $e){
            return $e;
        }
    }

    //protected functions

    protected function toNewsArray($news){
        $array = array();
        foreach($news as $new){
            $array[] = $new->to_array();
        }
        return $array;
    }
}