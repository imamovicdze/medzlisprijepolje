<?php
/**
 * Created by PhpStorm.
 * User: imamo
 * Date: 2/16/2018
 * Time: 12:15 AM
 */

namespace MedzlisPrijepolje\Controllers;

use MedzlisPrijepolje\Services\NewsService;
use MedzlisPrijepolje\Services\CategoryService;
use MedzlisPrijepolje\EntityModels\CategoryEntityModel;
use MedzlisPrijepolje\EntityModels\NewsEntityModel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController
{
    /** @var  NewsService $newsService */
    public $newsService;
    /** @var  CategoryService $categoryService */
    public $categoryService;
    /** @var  \Twig_Environment $twig */
    public $twig;

    public function __construct($newsService,$categoryService,$twig){
        $this->newsService = $newsService;
        $this->categoryService = $categoryService;
        $this->twig = $twig;
    }

    public function createCat(Request $request){
        $category = $this->extractCategory($request);
        $successfull = $this->categoryService->createCategory($category);
        return $this->twig->render("admin/admin.category.twig",['message'=> $successfull]);
    }

    public function readCat(Request $request){
        $successfull = $this->categoryService->readCategory();
        if($successfull == false)  {
            return new JsonResponse('',500);
        };
        return new JsonResponse($successfull, 201);

    }

    public function updateCat(Request $request, $id){
        $category = $this->extractCategory($request);
        $successfull = $this->categoryService->updateCategory($category,$id);
        $category = $this->categoryService->readCategory();
        $news = $this->newsService->readNews();
        return $this->twig->render("admin/dashboard.twig", ['news' => $news,'categories' =>$category,'messageUpdateC' => $successfull]);
    }

    public function deleteCat(Request $request, $id){
        $successfull = $this->categoryService->deleteCategory($id);
        $category = $this->categoryService->readCategory();
        $news = $this->newsService->readNews();
        return $this->twig->render("admin/dashboard.twig",['categories' => $category,'news' => $news,'messageCategory' => $successfull]);
    }

    public function getOneCat(Request $request, $id){
        $successfull = $this->categoryService->getCategoryById($id);
        if($successfull == false)  {
            return new JsonResponse('',500);
        };
        return new JsonResponse($successfull, 200);
    }

    public function createN(Request $request){
        $news = $this->extractNews($request);
        $successfull = $this->newsService->createNews($news);
        $category = $this->categoryService->readCategory();
       // $message = $successfull ? 'Your News has been sucessfully created' : 'Sorry, There is error, try again!';
        return $this->twig->render("admin/admin.news.twig",['categories' => $category,'message'=> $successfull]);
    }

    public function readN(Request $request){
        $successfull = $this->newsService->readNews();
        if($successfull == false)  {
            return new JsonResponse('',500);
        };
        return new JsonResponse($successfull, 201);

    }

    public function updateN(Request $request, $id){
        $news = $this->extractNews($request);
        $successfull = $this->newsService->updateNews($news,$id);
        $category = $this->categoryService->readCategory();
        $news = $this->newsService->readNews();
        return $this->twig->render("admin/dashboard.twig", ['news' => $news,'categories' =>$category,'messageUpdate' => $successfull]);
    }

    public function deleteN(Request $request, $id){
        $successfull = $this->newsService->deleteNews($id);
        $category = $this->categoryService->readCategory();
        $news = $this->newsService->readNews();
        return $this->twig->render("admin/dashboard.twig",['news' => $news,'categories' => $category,'messageNews' => $successfull]);
    }

    public function getOneN(Request $request, $id){
        $successfull = $this->newsService->getNewsById($id);
        if($successfull == false)  {
            return new JsonResponse('',500);
        };
        return new JsonResponse($successfull, 201);
    }

    public function adminCreateNews(Request $request){
        $category = $this->categoryService->readCategory();
        return $this->twig->render("admin/admin.news.twig",['categories' => $category]);
    }

    public function adminUpdateNews(Request $request, $id){
        $news = $this->newsService->getNewsById($id);
       // $news = $this->newsService->readNews();
        $category = $this->categoryService->readCategory();
        return $this->twig->render("admin/admin.news.update.twig", ['news' => $news,'categories' =>$category]);
    }

    public function adminInfoNews($id){
        $news = $this->newsService->getNewsById($id);
        return $this->twig->render("admin/admin.news.info.twig", ['news'=> $news]);
    }

    public function adminCreateCategory(Request $request){
        return $this->twig->render("admin/admin.category.twig");
    }

    public function adminUpdateCategory($id){
        $category = $this->categoryService->getCategoryById($id);
        return $this->twig->render("admin/admin.category.update.twig", ['category' => $category]);
    }

    public function dashboard(Request $request){
        $category = $this->categoryService->readCategory();
        $news = $this->newsService->readNews();
        return $this->twig->render("admin/dashboard.twig",['categories' => $category,'news' => $news]);
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