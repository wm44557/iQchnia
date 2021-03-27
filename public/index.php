<?php

session_start();

require_once realpath("../vendor/autoload.php");
require_once("../config/config.php");
require_once("../utility/debug.php");



use app\utility\Router;
use app\controllers\loginController;
use app\controllers\adminController;
use app\controllers\userController;
use app\controllers\auditorController;
use app\controllers\invoices\deviceController;
use app\controllers\invoices\invoiceController;
use app\controllers\invoices\licenceController;
use app\controllers\invoices\statisticsController;

$router = new Router();

$router->get('/', [loginController::class, 'login']);
$router->post('/', [loginController::class, 'login']);
$router->get('/user', [loginController::class, 'user']);
$router->post('/logout', [loginController::class, 'logout']);

$router->resolve();
