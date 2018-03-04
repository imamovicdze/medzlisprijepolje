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
        $category = $this->mainService->getCategory();
        //return new JsonResponse($category,201);
        return $this->twig->render("index.twig", ['categories' => $category]);
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

/*
    1. All pages can be navigated and have separet method in main controller
    2. Create DashBoardController for admin
        a) create Category Entity with migration and seeder.
            -id,category_name
        b) create News Entity with migration and seeder.
            -id,title,content,(in next version add image or video content),
    3. Create CRUD operation for News and Category.
*/