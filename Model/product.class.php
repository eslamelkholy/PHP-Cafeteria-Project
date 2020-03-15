<?php
require_once '..' . DIRECTORY_SEPARATOR . 'config.php';
class Product
{
    private $id;
    private $name;
    private $price;
    private $product_picture;
    private $category_id;
    
    public function setProductId($_id)
    {
        $this->id = Validation::validateNumber($_id);
    }
    public function getProductId(){
        return $this->id;
    }
    public function setProductName($_name)
    {
        $this->name = Validation::validateText($_name);
    }
    public function getProductName(){
        return $this->name;
    }
    public function setProductPrice($_price)
    {
        $this->price = Validation::validateNumber($_price);
    }
    public function getProductPrice(){
        return $this->price;
    }
    public function setProductPic($_product_picture)
    {
        $this->product_picture = Validation::validateText($_product_picture);
    }
    public function getUserPic(){
        return $this->product_picture;
    }
    public function setCategoryId($_cat_id)
    {
        $this->category_id = Validation::validateNumber($_cat_id);
    }
    public function getCategoryId(){
        return $this->category_id;
    }
    public function insertProduct(){
        global $db;
        $result =mysqli_query($db,"insert into products set
                name='$this->name',
                price='$this->price',
                product_picture='$this->product_picture',
                category_id='$this->category_id'
                "); 
    }


}
?>
