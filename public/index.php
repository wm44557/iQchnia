<?php

session_start();

require_once realpath("../vendor/autoload.php");
require_once("../config/config.php");
require_once("../utility/debug.php");



use app\utility\Router;
use app\controllers\loginController;
use app\controllers\adminController;
use app\controllers\userController;


$router = new Router();

$router->get('/', [loginController::class, 'login']);
$router->post('/', [loginController::class, 'login']);
$router->get('/user', [loginController::class, 'user']);
$router->post('/logout', [loginController::class, 'logout']);

$router->get('/register', [loginController::class, 'register']);
$router->post('/register', [loginController::class, 'register']);

$router->get('/user/przepisy', [userController::class, 'przepisy']);
$router->post('/user/przepisy', [userController::class, 'przepisy']);

$router->resolve();
