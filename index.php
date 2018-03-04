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
$dashboardController = new DashboardController($app['dashboardService'],$app['twig']);

$app->get('/', [$mainController, "index"]);
$app->get('/index', [$mainController, "index"]);
$app->get('/medzlis', [$mainController, "medzlis"]);
$app->get('/nasidzemati', [$mainController, "nasidzemati"]);
$app->get('/mekteb', [$mainController, "mekteb"]);
$app->get('/projekti', [$mainController, "projekti"]);
$app->get('/contact', [$mainController, "contact"]);
$app->get('/dashboard', [$mainController, "dashboard"]);


// category CRUD
$app->post('/category/create',[$dashboardController, "createCat"]);
$app->get('/categories',[$dashboardController, "readCat"]);
$app->post('/category/update/{id}',[$dashboardController, "updateCat"]);
$app->post('/category/delete/{id}', [$dashboardController, "deleteCat"]);


//News CRUD
$app->post('/news/create', [$dashboardController, "createN"]);
$app->get('/news',[$dashboardController, "readN"]);
$app->post('/news/update/{id}',[$dashboardController, "updateN"]);
$app->post('/news/delete/{id}', [$dashboardController, "deleteN"]);




$app->run();