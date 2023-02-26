<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\controllers\SiteController;
use app\core\Router;

$router = new Router();

$router->get('/', [SiteController::class, 'index']);
$router->get("/posts", [SiteController::class, 'checkPost']);
$router->get("/addnews", [SiteController::class, 'addNews']);
$router->post("/addnews", [SiteController::class, 'addNews']);
$router->get("/authors", [SiteController::class, 'checkAuthor']);
$router->get("/topauthors", [SiteController::class, 'getTopAuthors']);
$router->get("/edit", [SiteController::class, 'editNews']);
$router->post("/edit", [SiteController::class, 'editNews']);

$router->resolve();