<?php
/**
 * Created by PhpStorm.
 * User: imamo
 * Date: 2/16/2018
 * Time: 12:15 AM
 */

namespace MedzlisPrijepolje\Controllers;

use MedzlisPrijepolje\Services\DashboardService;

class DashboardController
{
    /** @var  DashboardService $dashboardService*/
    private $dashboardService;
    public function __construct($dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }
}