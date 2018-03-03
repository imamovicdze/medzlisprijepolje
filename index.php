<?php
// enable Error printing
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php';

use MedzlisPrijepolje\Application; 
use Symfony\Component\HttpFoundation\Request;  
use Symfony\Component\HttpFoundation\Response; 
use MedzlisPrijepolje\Controllers\MainController;
use MedzlisPrijepolje\Controllers\DashboardController;

$app = new Application($_SERVER['HOME']);

$mainController = new MainController($app['mainService'],$app['twig']);
$dashboardController = new DashboardController($app['dashboardService']);
$app->get('/', [$mainController, "index"]);
$app->get('/index', [$mainController, "index"]);
$app->get('/medzlis', [$mainController, "medzlis"]);
$app->get('/nasidzemati', [$mainController, "nasidzemati"]);
$app->get('/mekteb', [$mainController, "mekteb"]);
$app->get('/projekti', [$mainController, "projekti"]);
$app->get('/contact', [$mainController, "contact"]);
$app->get('/dashboard', [$mainController, "dashboard"]);



$app->post('/category/create',[$dashboardController, "create"]);
$app->get('/categories',[$dashboardController, "get"]);
$app->post('/category/update/{id}',[$dashboardController, "update"]);


$app->run();