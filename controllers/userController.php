<?php

declare(strict_types=1);

namespace app\controllers;

use app\Router;
use app\models\User;
use app\models\Recipe;

use app\utility\Redirect;
use app\utility\Permissions;

class userController
{

    public function przepisy($router)
    {
        Permissions::check("user");
        $user = new User();
        $recipe = new Recipe();
        $data = $recipe->getRecipes();
        foreach ($data as $item) {
            $item->ingredients = $recipe->getRecipeIngredients($item->id);
        };


        foreach ($data as $item) {
            foreach ($item->ingredients as $itemIngredients) {
                $item->tag .= $itemIngredients->name;
            }
        }








        $router->render("pages/user/przepisy", [
            'recipes' => $data,
        ]);
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
        $recipe = new Recipe();

        if (isset($_POST['zapisz_dane'])) {
            if (
                empty($_POST['description'])
                && empty($_POST['title'])
                && empty($_POST['difficulty'])
                && empty($_POST['calories'])
                && empty($_POST['diets'])
                && empty($_POST['creator'])
            ) {
            }
            $stripped = str_replace(' ', '', $_POST['title']);
            $newData = $_POST;
            if ($_FILES['file']['name']) {
                $dir = "media/" . $stripped . $_FILES['file']['name'];
            } else {
                $dir = "media/default.jpg";
            }
            move_uploaded_file($_FILES['file']['tmp_name'], $dir);

            $recipe->createRecipe($newData, $dir);
            $fromTitle = $recipe->getRecipeFromTitle($_SESSION['user_id'], $_POST['title']);
            $router->render('pages/user/dodajskladniki', [
                'title' => $_POST['title'],
                'recipeData' => $fromTitle,
                'units' => $recipe->getAllUnits(),
                'ingredients' => $recipe->getAllIngredients(),
                're_in_data' => $recipe->getRecipeIngredients($fromTitle->id)
            ]);
        }

        $router->render("pages/user/dodajprzepis", [
            'dane' => $recipe->getAllIngredients(),
            'category' => $recipe->getAllCategories(),
            'difficulties' => $recipe->getAllDifficulties(),
            'diets' => $recipe->getAllDiets(),

        ]);
    }

    public function dodajskladniki($router)
    {
        Permissions::check("user");
        $user = new User();
        $recipe = new Recipe();
        if (isset($_POST['dodajKolejny'])) {
            $recipe->createRecipeIngredients($_POST);
            $router->render("pages/user/dodajskladniki", [
                'recipeData' => $recipe->getRecipeFromId($_SESSION['user_id'], $_POST['recipe_id']),
                'units' => $recipe->getAllUnits(),
                'ingredients' => $recipe->getAllIngredients(),
                're_in_data' => $recipe->getRecipeIngredients($_POST['recipe_id'])
            ]);
        } else {
            Redirect::to("/" . $_SESSION['user_role'] . "/dodajprzepis");
        }
    }
    public function edytujdane($router)
    {
        Permissions::check("user");
        $user = new User();

        $errors = [];

        $newData = $_POST;
        $result = $user->getUserLogin($_SESSION['user_login']);


        if (isset($_POST['zapisz_dane'])) {
            if (!empty($_POST['new_login']) && !empty($_POST['new_email'])) {

                if (empty($_POST['old_password']) && empty($_POST['new_password']) && empty($_POST['new_password2'])) {
                    $newData['new_password'] = $result->password;
                    $user->editUserData($newData);
                    $_SESSION['user_login'] = $newData['new_login'];
                    $_SESSION['user_email'] = $newData['new_email'];
                } else if (!empty($_POST['old_password']) && $_POST['old_password'] == $result->password) {
                    if ($_POST['new_password'] == $_POST['new_password2']) {
                        $user->editUserData($newData);
                        $_SESSION['user_login'] = $newData['new_login'];
                        $_SESSION['user_email'] = $newData['new_email'];
                    } else {
                        $errors['edited'] = "Nowo ustawione hasła muszą się pokrywać";
                    }
                } else {
                    $errors['edited'] = "Wpisane przez Ciebie hasło jest niepoprawne";
                }
            } else {
                $errors['edited'] = "Pola login i email nie mogą pozostać puste";
            }
            if (!isset($errors['edited']))
                Redirect::to("/");
        }

        $router->render("pages/user/edytujdane", [
            'dane' => $result,
            'errors' => $errors,
        ]);
    }
}
