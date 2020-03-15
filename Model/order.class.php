<?php

class Order
{
    private $id;
    private $notes;
    private $order_date;
    private $status;
    private $totalPrice;
    private $room_no;
    private $userId;
    public function setOrderId($_id)
    {
        $this->id = Validation::validateNumber($_id);
    }
    public function setOrderNotes($_notes)
    {
        $this->notes = Validation::validateText($_notes);
    }
    public function setOrderDate($_date)
    {
        $this->order_date = Validation::validateText($_date);
    }
    public function setTotalPrice($_totalPrice)
    {
        $this->totalPrice = Validation::validateNumber($_totalPrice);
    }
    public function setRoomNumber($_room_no)
    {
        $this->room_no = $_room_no;
    }
    public function setUserId($_userid)
    {
        $this->userId = $_userid;
    }
    //Add Order
    public function addOrder()
    {
        global $db;
        $notes = mysqli_escape_string($db, $this->notes);
        $totalPrice = mysqli_escape_string($db, $this->totalPrice);
        $room_no = mysqli_escape_string($db, $this->room_no);
        $userId = mysqli_escape_string($db, $this->userId);
        $result = mysqli_query($db, "INSERT INTO orders SET `notes` = '$notes' ,
            order_date = now(),
            `status` = 1 ,
            `amount` = '$totalPrice',
            `room` = '$room_no',
            `user_id` = '$userId'
        ");
        return mysqli_insert_id($db);
    }
    //List User Orders
    public function listOrders()
    {
        global $db;
        $userId = mysqli_escape_string($db, $this->userId);
        $result = mysqli_query($db, "SELECT * FROM orders WHERE `user_id` = '$userId'");
        return ($result) ? $result : false;
    }
    //List User Orders ON Specified Data
    public function listDatedOrders($from, $to)
    {
<<<<<<< HEAD
=======
        global $db;
        $userId = mysqli_escape_string($db,$this->userId);
        $result = mysqli_query($db,"SELECT * FROM orders WHERE `user_id` = '$userId' and order_date BETWEEN '$from' AND '$to'");
        return ($result)? $result : false;
    }
    //List All Order Info And It's Related 
    public function listAllOrder_Related_Info()
    {
        global $db;
        $orderId = $this->id;
        $result = mysqli_query($db,"SELECT * FROM order_products INNER JOIN products ON product_id = id HAVING order_id = '$orderId'");
        return ($result) ? $result : false;
>>>>>>> ac387299dea30548979718ccc6a0d52f82283c53
    }
    //Add Order To it's Related Product Table
    public static function addRelated_Order_Product($orderId, $productId, $quantity)
    {
        global $db;
        $result = mysqli_query($db, "INSERT INTO order_products SET order_id = '$orderId' ,
            product_id = '$productId',
            quantity = '$quantity'
        ");
        return ($result) ? true : false;
    }
    //Get Last Order
    public static function getLastOrderData()
    {
        global $db;
<<<<<<< HEAD
        $result = mysqli_query($db, "select name FROM orders INNER JOIN users ON orders.user_id = users.id LIMIT 5");
        return $result;
=======
        $myOrder = mysqli_query($db,"SELECT * FROM orders WHERE `user_id` = 1 ORDER BY id DESC LIMIT 1");
        $myOrderData = mysqli_fetch_assoc($myOrder);
        $orderId = $myOrderData['id'];
        $result = mysqli_query($db,"SELECT * FROM order_products INNER JOIN products ON product_id = id HAVING order_id = '$orderId'");
        return ($result) ? $result : false;
>>>>>>> ac387299dea30548979718ccc6a0d52f82283c53
    }
}
