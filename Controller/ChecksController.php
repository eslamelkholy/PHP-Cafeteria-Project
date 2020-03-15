<?php
    require_once '..' . DIRECTORY_SEPARATOR . 'config.php';
    if(isset($_POST['orderId'])){
        header("http://localhost/Cafeteria-Project/Views/addProduct.php");
        $query4="select products.name as name,products.price as price,order_products.quantity as quantity from products inner join order_products on products.id=order_products.product_id where order_id={$_POST['orderId']}";
        $result4=mysqli_query($db,$query4);
        $allProducts=array();
        while($result_array4=mysqli_fetch_assoc($result4)){
            $product=array(
                "name"=>$result_array4["name"],
                "price"=>$result_array4["price"],
                "quantity"=>$result_array4["quantity"],
            );
            $allProducts[]=$product;

        }
        echo json_encode($allProducts);
    }
    elseif(isset($_POST['userId'])){
        header("http://localhost/Cafeteria-Project/Views/addProduct.php");
        $query3="select * from orders where user_id={$_POST['userId']}";
        $result3=mysqli_query($db,$query3);
        $allOrders=array();
        while($result_array3=mysqli_fetch_assoc($result3)){
            $order=array(
                "id"=>$result_array3["id"],
                "order_date"=>$result_array3["order_date"],
                "amount"=>$result_array3["amount"]

            );
            $allOrders[]=$order;
        }

        echo json_encode($allOrders);
    }

?>