<?php

declare(strict_types=1);

namespace app\controllers;

use app\Router;
use app\models\User;
use app\utility\Redirect;
use app\utility\Permissions;

class loginController
{
    public function login($router)
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $user = new User();
            $result = $user->authenticate($login, $password);

            if ($result) {
                $_SESSION['user_id'] = $result->id;
                $_SESSION['user_login'] = $result->login;
                $_SESSION['user_role'] = $result->role;
            } else {
                $errors['auth'] = "Niepoprawny login lub hasło.";
            }
        }

        if (isset($_SESSION['user_role'])) {
            Redirect::to("/" . $_SESSION['user_role']);
        }

        $router->render('pages/login', [
            'errors' => $errors,
        ]);
    }

    public function logout($router)
    {
        session_destroy();
        Redirect::to("/");
    }


    public function user($router)
    {
        Permissions::check("user");
        $router->render('pages/user/panel', []);
    }

    public function register($router)
    {
        $user = new User();
        if (isset($_POST['login'])) {
            if (!$user->getUserLogin($_POST['login'])) {
                if ($_POST) {
                    if (!empty($_POST['login']) && !empty($_POST['password'] && !empty($_POST['email']))) {

                        $dataRegister = $_POST;
                        $user = new User();
                        $user->registerUser($dataRegister);
                        Redirect::to("/");
                    } else {
                        dump($_POST);
                        $registerInfo = "Wypełnij odpowiednio pola";
                    }
                }
            } else {
                $registerInfo = "Użytkownik o takim loginie już istnieje!";
            }
        }


        $router->render('pages/register',  [
            'registerInfo' => $registerInfo ?? null
        ]);
    }
}
