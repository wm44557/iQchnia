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
        if (!empty($_GET['diet']) && !empty($_GET['category']) && !empty($_GET['difficulty'])) {
            $data = $recipe->getRecipesDietCategoryDifficultySearch($_GET);
        } else if (!empty($_GET['diet']) && !empty($_GET['category'])) {
            $data = $recipe->getRecipesDietCategorySearch($_GET);
        } else if (!empty($_GET['difficulty']) && !empty($_GET['category'])) {
            $data = $recipe->getRecipesCategoryDifficultySearch($_GET);
        } else if (!empty($_GET['difficulty'])  && !empty($_GET['diet'])) {
            $data = $recipe->getRecipesDietDifficultySearch($_GET);
        } else if (!empty($_GET['diet'])) {
            $data = $recipe->getRecipesDietSearch($_GET);
        } else if (!empty($_GET['difficulty'])) {
            $data = $recipe->getRecipesDifficultySearch($_GET);
        } else if (!empty($_GET['category'])) {
            $data = $recipe->getRecipesCategorySearch($_GET);
        } else {
            $data = $recipe->getRecipes();
        }
        foreach ($data as $item) {
            $item->ingredients = $recipe->getRecipeIngredients($item->id);
            $item->tag = '';
        };

        foreach ($data as $item) {
            foreach ($item->ingredients as $itemIngredients) {
                $item->tag .= $itemIngredients->name;
                unset($item->ingredients);
            }
        }
        $router->render("pages/user/przepisy", [
            'recipes' => $data,
            'difficulty' => $recipe->getAllDifficulties(),
            'diets' => $recipe->getAllDiets(),
            'category' => $recipe->getAllCategories(),
        ]);
    }
    public function przepis($router)
    {
        Permissions::check("user");
        $user = new User();
        $recipe = new Recipe();
        $data = $recipe->getOneRecipe($_GET['id']);
        $ingredients = $recipe->getRecipeIngredients($_GET['id']);

        $router->render("pages/user/przepis", [
            'recipe' => $data,
            'ingredients' => $ingredients,
        ]);
    }
    public function mojeprzepisy($router)
    {
        Permissions::check("user");
        $user = new User();
        $recipe = new Recipe();
        if (isset($_GET['deleteID'])) {
            $recipe->deleteRecipe($_GET['deleteID'], $_SESSION['user_id']);
        };
        $data = $recipe->getRecipesFromUserId($_SESSION['user_id']);

        $router->render("pages/user/mojeprzepisy", [
            'recipes' => $data,
        ]);
    }
    public function edytujtresc($router)
    {
        Permissions::check("user");
        $user = new User();
        $recipe = new Recipe();
        $data = $recipe->getRecipeFromId($_SESSION['user_id'], $_GET['id']);
        $info = '';

        if (isset($_POST['edytuj_dane'])) {
            $recipe->updateRecipe($_POST);
            $info = "Pomyślnie edytowano treść przepisu";
            $data = $recipe->getRecipeFromId($_SESSION['user_id'], $_GET['id']);
        };

        $router->render("pages/user/edytujtresc", [
            'recipeData' => $data,
            'difficulty' => $recipe->getAllDifficulties(),
            'diets' => $recipe->getAllDiets(),
            'category' => $recipe->getAllCategories(),
            'info' => $info,
        ]);
    }
    public function edytujskladniki($router)
    {
        Permissions::check("user");
        $user = new User();
        $recipe = new Recipe();
        $data = $recipe->getRecipeIngredients($_GET['id']);
        dump($_POST);
        if (isset($_POST['deleteID'])) {
            $recipe->deleteIngredients($_GET['id'], $_POST['deleteID']);
            $data = $recipe->getRecipeIngredients($_GET['id']);
        }
        if (isset($_POST['dodajKolejny'])) {
            $recipe->createRecipeIngredients($_POST);
        }
        $data = $recipe->getRecipeIngredients($_GET['id']);

        $router->render("pages/user/edytujskladniki", [
            're_in_data' => $data,
            'units' => $recipe->getAllUnits(),
            'ingredients' => $recipe->getAllIngredients(),
        ]);
    }





    public function ulubione($router)
    {
        Permissions::check("user");
        $user = new User();
        $recipe = new Recipe();

        $info  = '';
        $favRevipesRefresh = function ($recipe) {
            $data = $recipe->getFavFromUserId($_SESSION['user_id']);

            foreach ($data as $item) {
                $item->ingredients = $recipe->getRecipeIngredients($item->id);
                $item->tag = '';
            };

            foreach ($data as $item) {
                foreach ($item->ingredients as $itemIngredients) {
                    $item->tag .= $itemIngredients->name;
                    unset($item->ingredients);
                }
            };

            return $data;
        };
        $favRevipes = $favRevipesRefresh($recipe);

        if (isset($_GET['liked'])) {
            if ($recipe->getFav($_SESSION['user_id'], $_GET['liked'])) {
                $info = "Posiadasz już w ulubionych";
            } else {
                $recipe->insertFav($_SESSION['user_id'], $_GET['liked']);
                $info = "Pomyślnie dodano ogłoszenie";

                $favRevipes = $favRevipesRefresh($recipe);
            }
        }

        if (isset($_GET['delete'])) {
            $recipe->deleteFav($_SESSION['user_id'], $_GET['delete']);
            $info = "Pomyslnie usunięto";
            $favRevipes = $recipe->getFavFromUserId($_SESSION['user_id']);
            $favRevipes = $favRevipesRefresh($recipe);
        };
        $router->render("pages/user/ulubione", [
            'info' => $info,
            'favRevipes' => $favRevipes
        ]);
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
