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

$router->get('/user/przepis', [userController::class, 'przepis']);
$router->post('/user/przepis', [userController::class, 'przepis']);


$router->get('/user/mojeprzepisy', [userController::class, 'mojeprzepisy']);
$router->post('/user/mojeprzepisy', [userController::class, 'mojeprzepisy']);

$router->get('/user/ulubione', [userController::class, 'ulubione']);
$router->post('/user/ulubione', [userController::class, 'ulubione']);

$router->get('/user/dodajprzepis', [userController::class, 'dodajprzepis']);
$router->post('/user/dodajprzepis', [userController::class, 'dodajprzepis']);


$router->get('/user/dodajskladniki', [userController::class, 'dodajskladniki']);
$router->post('/user/dodajskladniki', [userController::class, 'dodajskladniki']);





$router->get('/user/edytujtresc', [userController::class, 'edytujtresc']);
$router->post('/user/edytujtresc', [userController::class, 'edytujtresc']);


$router->get('/user/edytujskladniki', [userController::class, 'edytujskladniki']);
$router->post('/user/edytujskladniki', [userController::class, 'edytujskladniki']);


$router->get('/user/edytujdane', [userController::class, 'edytujdane']);
$router->post('/user/edytujdane', [userController::class, 'edytujdane']);

$router->resolve();
