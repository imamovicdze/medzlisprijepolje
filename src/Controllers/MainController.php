<?php

namespace MedzlisPrijepolje\Controllers;

use MedzlisPrijepolje\Services\MainService;

class MainController 
{
    /** @var  MainService $mainService*/
    private $mainService;
    /** @var  \Twig_Environment $twig */
    public $twig;
	public function __construct($mainService,$twig){
		$this->mainService = $mainService;
		$this->twig = $twig;
	}

	public function index(){
        /*$category = $this->mainService->getCategory();
        $news = $this->mainService->getNews();
        $lastFive = $this->mainService->getNewsLastFive();
        return new JsonResponse($category,201);
        return $this->twig->render("index.twig", ['categories' => $category,'news' => $news,'lastFive' =>$lastFive]);*/
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
