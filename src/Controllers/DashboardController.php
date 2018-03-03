<?php
/**
 * Created by PhpStorm.
 * User: imamo
 * Date: 2/16/2018
 * Time: 12:15 AM
 */

namespace MedzlisPrijepolje\Controllers;

use MedzlisPrijepolje\Services\DashboardService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardController
{
    /** @var  DashboardService $dashboardService */
    public $dashboardService;

    public function __construct($dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function create(Request $request){
        $category = $request->request->get('category_name');
        $successfull = $this->dashboardService->createCategory($category);
        if($successfull == false)  {
            return new JsonResponse('',500);
            };
        return new JsonResponse($successfull, 201);
    }

    public function get(Request $request,Response $response){
        $category = $this->dashboardService->getCategory();

    }


    public function update(Request $request, $categoryId){
        $category = $request->request->get('category_name');
        $successfull = $this->dashboardService->updateCategory($categoryId,$category);
        return new JsonResponse($successfull);
    }
}