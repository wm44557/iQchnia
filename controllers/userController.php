<?php

declare(strict_types=1);

namespace app\controllers;

use app\Router;
use app\models\User;
use app\utility\Redirect;
use app\utility\Permissions;

class userController
{

    public function przepisy($router)
    {
        Permissions::check("user");
        $user = new User();
        $router->render("pages/user/przepisy", []);
    }
    public function mojeprzepisy($router)
    {
        Permissions::check("user");
        $user = new User();
        $router->render("pages/user/mojeprzepisy", []);
    }
    public function ulubione($router)
    {
        Permissions::check("user");
        $user = new User();
        $router->render("pages/user/ulubione", []);
    }
    public function dodajprzepis($router)
    {
        Permissions::check("user");
        $user = new User();
        $router->render("pages/user/dodajprzepis", []);
    }
}
