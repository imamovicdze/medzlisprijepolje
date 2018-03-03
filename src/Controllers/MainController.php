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
        return $this->twig->render("index.html");
    }

    public function medzlis() {
        return $this->twig->render("medzlis.html");
    }

    public function nasidzemati() {
        return $this->twig->render("nasidzemati.html");
    }

    public function mekteb() {
        return $this->twig->render("mekteb.html");
    }

    public function projekti() {
        return $this->twig->render("projekti.html");
    }

	public function contact() {
	    return $this->twig->render("contact.html");
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