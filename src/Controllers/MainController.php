<?php

namespace MedzlisPrijepolje\Controllers;

use MedzlisPrijepolje\Application;
use MedzlisPrijepolje\Services\NewsService;
use MedzlisPrijepolje\Services\CategoryService;
use MedzlisPrijepolje\Services\MainService;
use MedzlisPrijepolje\EntityModels\CategoryEntityModel;
use MedzlisPrijepolje\EntityModels\NewsEntityModel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MainController 
{
    /** @var  MainService $mainService */
    public $mainService;
    /** @var  NewsService $newsService */
    public $newsService;
    /** @var  CategoryService $categoryService */
    public $categoryService;
    /** @var  \Twig_Environment $twig */
    public $twig;

	public function __construct($newsService,$categoryService,$mainService,$twig){
	    $this->newsService = $newsService;
	    $this->categoryService = $categoryService;
	    $this->mainService = $mainService;
		$this->twig = $twig;
	}

    public function index(){
        $category = $this->categoryService->readCategory();
        $news = $this->newsService->readNews();
        $lastFive = $this->newsService->getNewsLastFive();
        //return new JsonResponse($category,201);
        return $this->twig->render("index.twig", ['categories' => $category,'news' => $news,'lastFive' =>$lastFive]);
    }

    public function single(Request $request,$id){
        $news = $this->newsService->getNewsById($id);
        $lastThree = $this->newsService->getNewsLastThree();
        $lastFive = $this->newsService->getNewsLastFive();
        $category = $this->categoryService->readCategory();
        return $this->twig->render("single-new.twig",['news' => $news,'lastThree' => $lastThree,'lastFive' => $lastFive,'categories' => $category]);
        //create warinng message and redirect to main page if news doesent exist
    }

    public function sendMail(Request $request){
        $category = $this->categoryService->readCategory();
        $news = $this->newsService->readNews();
        $lastFive = $this->newsService->getNewsLastFive();

        $clientName = $request->request->get('name');
        $clientMail = $request->request->get('email');
        $title = $request->request->get('title');
        $text = $request->request->get('textArea');

        $isSent = $this->mainService->sendMail($clientMail, $clientName, $title, $text);
        //return new Response($isSent);
        return $this->twig->render("index.twig", ['categories' => $category,'news' => $news,'lastFive' =>$lastFive,'isSent'=>$isSent]);
    }

    public function medzlis() {
        return $this->twig->render("medzlis.twig");
    }

    public function nasidzemati() {
        return $this->twig->render("nasidzemati.twig");
    }

    public function mekteb() {
        return $this->twig->render("mekteb.twig");
    }

    public function projekti() {
        return $this->twig->render("projekti.twig");
    }

	public function contact() {
	    return $this->twig->render("contact.twig");
    }

}
