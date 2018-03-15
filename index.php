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

$mainController = new MainController($app['NewsService'],$app['CategoryService'],$app['MainService'],$app['twig']);
$adminController = new \MedzlisPrijepolje\Controllers\AdminController($app['NewsService'],$app['CategoryService'],$app['twig']);

$app->get('/', [$mainController, "index"]);
$app->get('/index', [$mainController, "index"]);
$app->post('/mail',[$mainController, "sendMail"]);
$app->get('/medzlis', [$mainController, "medzlis"]);
$app->get('/nasidzemati', [$mainController, "nasidzemati"]);
$app->get('/mekteb', [$mainController, "mekteb"]);
$app->get('/projekti', [$mainController, "projekti"]);
$app->get('/contact', [$mainController, "contact"]);
$app->get('/dashboard', [$mainController, "dashboard"]);
$app->get('/single-news/{id}',[$mainController, "single"]);




// category CRUD
$app->post('/category/create',[$adminController, "createCat"]);
$app->get('/categories',[$adminController, "readCat"]);
$app->post('/category/update/{id}',[$adminController, "updateCat"]);
$app->delete('/category/delete/{id}', [$adminController, "deleteCat"]);
$app->get('/category/{id}',[$adminController, "getOneCat"]);


//News CRUD
$app->post('/news/create', [$adminController, "createN"]);
$app->get('/news',[$adminController, "readN"]);
$app->post('/news/update/{id}',[$adminController, "updateN"]);
$app->post('/news/delete/{id}', [$adminController, "deleteN"]);
$app->get('/news/{id}',[$adminController, "getOneN"]);



//admin pages
$app->get('/admin/dashboard', [$adminController, "dashboard"]);

$app->get('/admin/news/create',[$adminController,"adminCreateNews"]);
$app->get('/admin/category/create', [$adminController, "adminCreateCategory"]);

$app->get('/admin/news/update/{id}',[$adminController, "adminUpdateNews"]);
$app->get('/admin/category/update/{id}', [$adminController, "adminUpdateCategory"]);

$app->get('/admin/news/info/{id}', [$adminController, "adminInfoNews"]);




$app->run();