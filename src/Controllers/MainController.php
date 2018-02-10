<?php

namespace MedzlisPrijepolje\Controllers;

use MedzlisPrijepolje\Services\MainService;

class MainController 
{
	private $mainService;
	public function __construct($mainService){
		$this->mainService = $mainService;
	}

	public function index(){
        $names = $this->MainService->getNames();
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