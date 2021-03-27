<?php

session_start();
require_once realpath("../vendor/autoload.php");
require_once("../config/config.php");
require_once("../utility/debugFunction.php");

use app\utility\Router;

$router = new Router();

$router->get('/', [loginController::class, 'login']);
$router->post('/', [loginController::class, 'login']);