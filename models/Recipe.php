<?php

namespace app\models;

use app\utility\Database;

class Recipe
{

    public function getAllIngredients()
    {
        $this->conn = new Database();
        $this->conn->query('SELECT * FROM ingredients');
        $result = $this->conn->resultAll();
        return $result;
    }
    public function getAllCategories()
    {
        $this->conn = new Database();
        $this->conn->query('SELECT * FROM categories');
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
    public function getAllDiets()
    {
        $this->conn = new Database();
        $this->conn->query('SELECT * FROM diets');
        $result = $this->conn->resultSet();
        return $result;
    }
    public function createRecipe($dataRegister)
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
        $this->conn->bindValue("photo", $dataRegister['photo']);

        $this->conn->execute();
    }
}
