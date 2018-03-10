<?php
/**
 * Created by PhpStorm.
 * User: imamo
 * Date: 2/16/2018
 * Time: 12:15 AM
 */

namespace MedzlisPrijepolje\Controllers;

use MedzlisPrijepolje\Services\DashboardService;
use MedzlisPrijepolje\EntityModels\CategoryEntityModel;
use MedzlisPrijepolje\EntityModels\NewsEntityModel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardController
{
    /** @var  DashboardService $dashboardService */
    public $dashboardService;
    /** @var  \Twig_Environment $twig */
    public $twig;

    public function __construct($dashboardService,$twig)
    {
        $this->dashboardService = $dashboardService;
        $this->twig = $twig;
    }

    public function createCat(Request $request){
        $category = $this->extractCategory($request);
        $successfull = $this->dashboardService->createCategory($category);
        if($successfull == false)  {
            return new JsonResponse('',500);
            };
        return new JsonResponse($successfull, 201);
    }

    public function readCat(Request $request){
        $successfull = $this->dashboardService->readCategory();
        if($successfull == false)  {
            return new JsonResponse('',500);
        };
        return new JsonResponse($successfull, 201);

    }

    public function updateCat(Request $request, $id){
        $category = $this->extractCategory($request);
        $successfull = $this->dashboardService->updateCategory($category,$id);
        if($successfull == false)  {
            return new JsonResponse('',500);
        };
        return new JsonResponse($successfull, 201);
    }

    public function deleteCat(Request $request, $id){
        $successfull = $this->dashboardService->deleteCategory($id);
        if($successfull == false)  {
            return new JsonResponse('',500);
        };
        return new JsonResponse($successfull, 201);
    }

    public function getOneCat(Request $request, $id){
        $successfull = $this->dashboardService->getCategoryById($id);
        if($successfull == false)  {
            return new JsonResponse('',500);
        };
        return new JsonResponse($successfull, 200);
    }

    public function createN(Request $request){
        $news = $this->extractNews($request);
        $successfull = $this->dashboardService->createNews($news);
        $category = $this->dashboardService->readCategory();
       // $message = $successfull ? 'Your News has been sucessfully created' : 'Sorry, There is error, try again!';
        return $this->twig->render("admin/admin.news.twig",['categories' => $category,'message'=> $successfull]);
    }

    public function readN(Request $request){
        $successfull = $this->dashboardService->readNews();
        if($successfull == false)  {
            return new JsonResponse('',500);
        };
        return new JsonResponse($successfull, 201);

    }

    public function updateN(Request $request, $id){
        $news = $this->extractNews($request);
        $successfull = $this->dashboardService->updateNews($news,$id);
        if($successfull == false)  {
            return new JsonResponse('',500);
        };
        return new JsonResponse($successfull, 201);
    }

    public function deleteN(Request $request, $id){
        $successfull = $this->dashboardService->deleteNews($id);
        if($successfull == false)  {
            return new JsonResponse('',500);
        };
        return new JsonResponse($successfull, 201);
    }

    public function getOneN(Request $request,Response $response, $id){
        $successfull = $this->dashboardService->getNewsById($id);
        if($successfull == false)  {
            return new JsonResponse('',500);
        };
        return new JsonResponse($successfull, 201);
    }

    //admin page
    public function adminCreateNews(Request $request){
        $category = $this->dashboardService->readCategory();
        return $this->twig->render("admin/admin.news.twig",['categories' => $category]);
    }
    //end admin page

    public function single(Request $request,$id){
        $news = $this->dashboardService->getNewsById($id);
        $lastThree = $this->dashboardService->getNewsLastThree();
        return $this->twig->render("single-new.twig",['news' => $news,'lastThree' => $lastThree]);
        //create warinng message and redirect to main page if news doesent exist
    }

    public function index(){
        $category = $this->dashboardService->readCategory();
        $news = $this->dashboardService->readNews();
        $lastFive = $this->dashboardService->getNewsLastFive();
        //return new JsonResponse($category,201);
        return $this->twig->render("index.twig", ['categories' => $category,'news' => $news,'lastFive' =>$lastFive]);
    }


    // private functions

    private function extractCategory(Request $request){
        $category_name = $request->request->get("category_name");
        // TODO: Implement validation for Category
        $category = new CategoryEntityModel($category_name);
        return $category;
    }

    private function extractNews(Request $request){
        $title = $request->request->get("title");
        $content = $request->request->get("content");
        $category_id = $request->request->get("category_id");
        // TODO: Implement validation for News
        $news = new NewsEntityModel($title, $content,$category_id);
        return $news;
    }
}