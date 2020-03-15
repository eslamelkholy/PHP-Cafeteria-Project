<?php 
class Products
{
    private $id;
    private $name;
    private $price;
    private $product_picture;
    private $category_id;
    
    public function setProductId($_id)
    {
        $this->id = $_id;
    }
    public function setProductName($_name)
    {
        $this->name = $_name;
    }
    public function getProductName(){return $this->name;}
    
    public function setProductPrice($_price)
    {
        $this->price = $_price;
    }
    public function getProductPrice(){return $this->price;}

    public function setProductImg($_img)
    {
        $this->product_picture = $_img;
    }
    public function getProductImg(){return $this->product_picture;}
    public function setCategoryId($_catId)
    {
        $this->category_id = $_catId;
    }
    //List All Product
    public function listAllProducts()
    {
        global $db;
        $result = mysqli_query($db,"SELECT * FROM products");
        return $result;
    }
    
    //Return Product Id
    public static function GetProductIdByName($productName)
    {
        global $db;
        $result = mysqli_query($db,"SELECT id FROM products WHERE `name` = '$productName'");
        $ProdId = mysqli_fetch_assoc($result)['id'];
        return $ProdId;
    }
    #<===========================================================================>    
    
function deleteProduct()
{
        global $db;
        if (isset($_GET['delete'])) {
                $id = $_GET['delete'];
                $query = "DELETE FROM products WHERE id=?";
                $stmt = $db->prepare($query);
                $stmt->bind_param("i", $id); // i for integer
                $stmt->execute();
                header('location:allproducts.php');
        }
}
}

?>
