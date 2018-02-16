<?php

namespace MedzlisPrijepolje\Controllers;

use MedzlisPrijepolje\Services\MainService;

class MainController 
{
    /** @var  MainService $mainService*/
	private $mainService;
	public function __construct($mainService){
		$this->mainService = $mainService;
	}

	public function index(){
        $names = $this->mainService->getNames();
        $htmlString = "<ul>";
        foreach($names as $name){
            $htmlString = $htmlString. ("<li>".$name."</li>");
        }
        $htmlString = $htmlString."</ul>";
        return "<h1>This is index page</h1>".$htmlString;
    }

	public function dashboard(){
		return "<h1>This is dashboard page</h1>"; 
	}
}

/*
    1. All pages can be navigated and have separet method in main controller
    2. Create DashBoardController for admin
        a) create Categories Entity with migration and seeder.
            -id,category_name
        b) create News Entity with migration and seeder.
            -id,title,content,(in next version add image or video content),
    3. Create CRUD operation for News and Categories.
*/