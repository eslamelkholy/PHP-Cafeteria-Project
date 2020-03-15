<?php
    require_once '..' . DIRECTORY_SEPARATOR . 'config.php';
    $category = new Category();
    if(isset($_POST['AddCategory']))
    {    
        $category->setCategoryName($_POST['name']);
        $category->insertCategory();
        header('Location:http://localhost/Cafeteria-Project/Views/allproducts.php');
    } 
?>