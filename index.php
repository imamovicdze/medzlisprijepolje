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

$app = new Application();

$mainController = new MainController($app['mainService']);
$app->get('/', [$mainController, "index"]); 
$app->get('/dashboard', [$mainController, "dashboard"]);
$app->get('/hello/{name}', function (Application $app, Request $request, $name) {
    return new Response("Hello $name");
});


$app->run();