<?php
require_once '..' . DIRECTORY_SEPARATOR . 'config.php';
class Category
{
    private $id;
    private $name;

    public function setCategoryId($_id)
    {
        $this->id = Validation::validateNumber($_id);
    }
    public function getCategoryId(){
        return $this->id;
    }
    public function setCategoryName($_name)
    {
        $this->name = Validation::validateText($_name);
    }
    public function getCategoryName(){
        return $this->name;
    }
    public function insertCategory(){
        global $db;
        $result =mysqli_query($db,"insert into categories set
                name='$this->name'
                "); 
    }
}