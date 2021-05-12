<?php

namespace app\models;

use app\utility\Database;

class Recipe
{

    public function getAllIngredients()
    {
        $this->conn = new Database();
        $this->conn->query('SELECT * FROM ingredients');
        $result = $this->conn->resultSet();
        return $result;
    }
    public function getAllCategories()
    {
        $this->conn = new Database();
        $this->conn->query('SELECT * FROM categories');
        $result = $this->conn->resultSet();
        return $result;
    }
    public function getAllRecipes()
    {
        $this->conn = new Database();
        $this->conn->query('SELECT * FROM recipes');
        $result = $this->conn->resultSet();
        return $result;
    }
    public function getAllDifficulties()
    {
        $this->conn = new Database();
        $this->conn->query('SELECT * FROM difficulties');
        $result = $this->conn->resultSet();
        return $result;
    }
    public function getAllUnits()
    {
        $this->conn = new Database();
        $this->conn->query('SELECT * FROM units');
        $result = $this->conn->resultSet();
        return $result;
    }

    public function getAllDiets()
    {
        $this->conn = new Database();
        $this->conn->query('SELECT * FROM diets');
        $result = $this->conn->resultSet();
        return $result;
    }
    public function createRecipe($dataRegister, $dir)
    {
        $this->conn = new Database();
        $this->conn->query("INSERT INTO `recipes`(`title`, `description`, `creator`,`difficulty`, `calories`, `diet`, `category`,`photo`) VALUES (:title,:description,:creator,:difficulty,:calories,:diet,:category,:photo)");
        $this->conn->bindValue("title", $dataRegister['title']);
        $this->conn->bindValue("description", $dataRegister['description']);
        $this->conn->bindValue("creator", $dataRegister['creator']);
        $this->conn->bindValue("difficulty", $dataRegister['difficulty']);
        $this->conn->bindValue("calories", $dataRegister['calories']);
        $this->conn->bindValue("diet", $dataRegister['diet']);
        $this->conn->bindValue("category", $dataRegister['category']);
        $this->conn->bindValue("photo", $dir);
        $this->conn->execute();
    }

    public function getRecipeFromTitle($creator, $title)
    {
        $this->conn = new Database();
        $this->conn->query('SELECT * FROM recipes WHERE title=:title AND creator=:creator;');
        $this->conn->bindValue("title", $title);
        $this->conn->bindValue("creator", $creator);
        $result = $this->conn->single();
        return $result;
    }
    public function getRecipeFromId($creator, $id)
    {
        $this->conn = new Database();
        $this->conn->query('SELECT * FROM recipes WHERE id=:id AND creator=:creator');
        $this->conn->bindValue("id", $id);
        $this->conn->bindValue("creator", $creator);

        $result = $this->conn->single();
        return $result;
    }
    public function getOneRecipe($id)
    {
        $this->conn = new Database();
        $this->conn->query('SELECT recipes.id,recipes.difficulty, recipes.title, recipes.description, recipes.photo, users.login,  difficulties.name AS difficulties, recipes.calories, diets.name AS diets, categories.name  as category
        FROM recipes 
        LEFT JOIN users ON recipes.creator = users.id  
        LEFT JOIN difficulties ON recipes.difficulty = difficulties.id 
        LEFT JOIN diets ON recipes.diet = diets.id 
        LEFT JOIN categories ON recipes.category = categories.id 
        
        WHERE recipes.id = :id');
        $this->conn->bindValue("id", $id);
        $result = $this->conn->single();
        return $result;
    }
    public function getRecipeIngredients($id)
    {
        $this->conn = new Database();
        $this->conn->query('SELECT recpie_ingredients.amount,ingredients.name,units.name as unitName
                            FROM recpie_ingredients 
                            LEFT JOIN ingredients ON recpie_ingredients.ingredient_id = ingredients.id
                            LEFT JOIN units ON recpie_ingredients.unit = units.id 
                            WHERE recpie_ingredients.recipe_id = :recipe_id
        ');
        $this->conn->bindValue("recipe_id", $id);

        $result = $this->conn->resultSet();
        return $result;
    }
    // SELECT recpie_ingredients.amount,ingredients.name,units.name
    // FROM recpie_ingredients 
    // LEFT JOIN ingredients ON recpie_ingredients.ingredient_id = ingredients.id 
    // LEFT JOIN units ON recpie_ingredients.unit = units.id 
    // WHERE recpie_ingredients.recipe_id = 61



    public function insertFav($usr_id, $rec_id)
    {
        $this->conn = new Database();
        $this->conn->query('INSERT INTO `user_favourites` (`user_id`, `recipe_id`) VALUES (:usr_id, :rec_id)');
        $this->conn->bindValue("usr_id", $usr_id);
        $this->conn->bindValue("rec_id", $rec_id);
        $this->conn->execute();
    }
    public function deleteFav($usr_id, $rec_id)
    {
        $this->conn = new Database();
        $this->conn->query('DELETE FROM user_favourites  WHERE user_id = :usr_id AND recipe_id = :rec_id');
        $this->conn->bindValue("usr_id", $usr_id);
        $this->conn->bindValue("rec_id", $rec_id);
        $this->conn->execute();
    }
    public function getFav($usr_id, $rec_id)
    {
        $this->conn = new Database();
        $this->conn->query('SELECT * FROM user_favourites  WHERE user_id = :usr_id AND recipe_id = :rec_id');
        $this->conn->bindValue("usr_id", $usr_id);
        $this->conn->bindValue("rec_id", $rec_id);
        $result = $this->conn->resultSet();
        return $result;
    }
    public function getFavFromUserId($usr_id)
    {
        $this->conn = new Database();
        $this->conn->query('SELECT user_favourites.user_id, recipes.id,recipes.title, recipes.description, recipes.photo, users.login, categories.name FROM user_favourites 
        LEFT JOIN recipes ON recipes.id = recipe_id
        LEFT JOIN users ON recipes.creator = users.id 
        LEFT JOIN categories ON recipes.category = categories.id
        WHERE user_favourites.user_id = :usr_id');
        $this->conn->bindValue("usr_id", $usr_id);
        $result = $this->conn->resultSet();
        return $result;
    }



    public function getRecipes()
    {
        $this->conn = new Database();
        $this->conn->query('SELECT recipes.id, recipes.title, recipes.description, recipes.photo, users.login, categories.name FROM recipes LEFT JOIN users ON recipes.creator = users.id LEFT JOIN categories ON recipes.category = categories.id');
        $result = $this->conn->resultSet();
        return $result;
    }
    public function getRecipesCategorySearch($data)
    {
        $this->conn = new Database();
        $this->conn->query('SELECT recipes.id, recipes.title, recipes.description, recipes.photo, users.login, categories.name
         FROM recipes 
         LEFT JOIN users ON recipes.creator = users.id 
         LEFT JOIN categories ON recipes.category = categories.id 
         WHERE recipes.category = :category ');
        $this->conn->bindValue("category", $data['category']);
        $result = $this->conn->resultSet();
        return $result;
    }
    public function getRecipesDietSearch($data)
    {
        $this->conn = new Database();
        $this->conn->query('SELECT recipes.id, recipes.title, recipes.description, recipes.photo, users.login, categories.name
         FROM recipes 
         LEFT JOIN users ON recipes.creator = users.id 
         LEFT JOIN categories ON recipes.category = categories.id 
         WHERE recipes.diet = :diet 
         
         ');
        $this->conn->bindValue("diet", $data['diet']);
        $result = $this->conn->resultSet();
        return $result;
    }
    public function getRecipesDifficultySearch($data)
    {
        $this->conn = new Database();
        $this->conn->query('SELECT recipes.id, recipes.title, recipes.description, recipes.photo, users.login, categories.name
         FROM recipes 
         LEFT JOIN users ON recipes.creator = users.id 
         LEFT JOIN categories ON recipes.category = categories.id 
         WHERE recipes.difficulty = :difficulty 
         
         ');
        $this->conn->bindValue("difficulty", $data['difficulty']);
        $result = $this->conn->resultSet();
        return $result;
    }
    public function getRecipesDietCategorySearch($data)
    {
        $this->conn = new Database();
        $this->conn->query('SELECT recipes.id, recipes.title, recipes.description, recipes.photo, users.login, categories.name
         FROM recipes 
         LEFT JOIN users ON recipes.creator = users.id 
         LEFT JOIN categories ON recipes.category = categories.id 
         WHERE recipes.diet = :diet 
         AND recipes.category = :category
         
         ');
        $this->conn->bindValue("diet", $data['diet']);
        $this->conn->bindValue("category", $data['category']);

        $result = $this->conn->resultSet();
        return $result;
    }
    public function getRecipesDietCategoryDifficultySearch($data)
    {
        $this->conn = new Database();
        $this->conn->query('SELECT recipes.id, recipes.title, recipes.description, recipes.photo, users.login, categories.name
         FROM recipes 
         LEFT JOIN users ON recipes.creator = users.id 
         LEFT JOIN categories ON recipes.category = categories.id 
         WHERE recipes.diet = :diet 
         AND recipes.category = :category
         AND recipes.difficulty=:difficulty
         
         ');
        $this->conn->bindValue("diet", $data['diet']);
        $this->conn->bindValue("category", $data['category']);
        $this->conn->bindValue("difficulty", $data['difficulty']);

        $result = $this->conn->resultSet();
        return $result;
    }
    public function getRecipesDietDifficultySearch($data)
    {
        $this->conn = new Database();
        $this->conn->query('SELECT recipes.id, recipes.title, recipes.description, recipes.photo, users.login, categories.name
         FROM recipes 
         LEFT JOIN users ON recipes.creator = users.id 
         LEFT JOIN categories ON recipes.category = categories.id 
         WHERE recipes.diet = :diet 
         AND recipes.difficulty=:difficulty
        
         ');
        $this->conn->bindValue("diet", $data['diet']);
        $this->conn->bindValue("difficulty", $data['difficulty']);

        $result = $this->conn->resultSet();
        return $result;
    }
    public function getRecipesCategoryDifficultySearch($data)
    {
        $this->conn = new Database();
        $this->conn->query('SELECT recipes.id, recipes.title, recipes.description, recipes.photo, users.login, categories.name
         FROM recipes 
         LEFT JOIN users ON recipes.creator = users.id 
         LEFT JOIN categories ON recipes.category = categories.id 
         WHERE recipes.category = :category
         AND recipes.difficulty=:difficulty
         
         ');
        $this->conn->bindValue("category", $data['category']);
        $this->conn->bindValue("difficulty", $data['difficulty']);

        $result = $this->conn->resultSet();
        return $result;
    }





    public function createRecipeIngredients($dataRegister)
    {
        $this->conn = new Database();
        $this->conn->query("INSERT INTO `recpie_ingredients`(`recipe_id`, `ingredient_id`, `amount`,`unit`) VALUES (:recipe_id,:ingredient_id,:amount,:unit)");
        $this->conn->bindValue("recipe_id", $dataRegister['recipe_id']);
        $this->conn->bindValue("ingredient_id", $dataRegister['ingredient_id']);
        $this->conn->bindValue("amount", $dataRegister['amount']);
        $this->conn->bindValue("unit", $dataRegister['unit']);

        $this->conn->execute();
    }
}
