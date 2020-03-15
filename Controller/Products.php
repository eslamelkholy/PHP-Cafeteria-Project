<?php
    require_once '..' . DIRECTORY_SEPARATOR . 'config.php';
    
    if(isset($_POST['AddProduct']))
    {   $product = new Product();
        $product->setProductName($_POST['name']);
        $product->setProductPrice($_POST['price']);
        $product->setCategoryId($_POST['category_id']);
        $upfile='../uploads/'.$_FILES['userfile']['name'];
        echo $upfile;
        if(is_uploaded_file($_FILES['userfile']['tmp_name'])){
            if (!move_uploaded_file($_FILES['userfile']['tmp_name'],$upfile)){
                echo 'could not move file';
                exit;}
        }else{
            echo 'Uploaded';
        }
        $product->setProductPic($upfile);
        $product->insertProduct();
        header('Location:http://localhost/Cafeteria-Project/Views/allproducts.php');
    }
    
?>