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
    //List Latest Five Orders
    public static function getLatestOrders()
    {
        global $db;
        $result = mysqli_query($db, "select name FROM orders INNER JOIN users ON orders.user_id = users.id LIMIT 5");
        return $result;
    }
}
