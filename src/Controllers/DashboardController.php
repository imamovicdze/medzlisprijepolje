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

    public function createN(Request $request){
        $news = $this->extractNews($request);
        $successfull = $this->dashboardService->createNews($news);
        if($successfull == false)  {
            return new JsonResponse('',500);
        };
        return new JsonResponse($successfull, 201);
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

    // private functions

    private function extractCategory(Request $request){
        $category_name = $request->get("category_name");
        // TODO: Implement validation for Category
        $category = new CategoryEntityModel($category_name);
        return $category;
    }

    private function extractNews(Request $request){
        $title = $request->get("title");
        $content = $request->get("content");
        // TODO: Implement validation for New
        $news = new NewsEntityModel($title, $content);
        return $news;
    }
}