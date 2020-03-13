<html>

<head>
    <title>My Orders</title>
    <link href="../public/css/bootstrap.css" rel="stylesheet" />
    <link href="../public/css/font-awesome.css" rel="stylesheet" />
</head>

<body>
    <!------------- Navbar ------------->
    <?php include './adminNavbar.php' ?>
    <!----------- Title -------------->
    <div>
        <h1 class="alert bg-light text-center text-primary">Orders</h1>
    </div>
    <!-------------- Table --------------->
    <div style="padding:30px">
        <table class="table rounded table-hover  mt-3">
            <thead class="bg-info">
                <tr>
                    <th>Order Date</th>
                    <th>Name</th>
                    <th>Room</th>
                    <th>Ext.</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
            
            <?php  require_once '..' . DIRECTORY_SEPARATOR . 'config.php';
                $order = new Order();
                $listOrder = $order->listOrderOfUser();
                if($listOrder){
                    while($row = mysqli_fetch_assoc($listOrder)){
                        ?>
                        
                        <tr>
                        <th><?php echo $row['order_date']?></th>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['room_no']?></td>
                        <td><?php echo $row['ext']?></td>
                        <td><?php echo $row['status']?></td>
                    </tr>
                    
                    <?php
                    
                        $orderId = $order->setOrderId($row['id']);
                        $orderDetailes = $order->listAllOrder_Related_Info($orderId);
                        if($orderDetailes){
                            echo "ok";
                            $detailes = mysqli_fetch_assoc($orderDetailes);
                                ?>
                                <div style="text-align: center;">
                            <div style="display: inline-block; padding: 50px;">
                            <img src="../public/Images/<?php echo $detailes['product_picture'] ?>" width="50px" height="50px" />
                            <span class="badge badge-pill badge-primary"><?php echo $detailes['price'] ?> EGP</span>
                            <figcaption><?php echo $detailes['name'] ?></figcaption>
                            <figcaption><?php echo $detailes['quantity'] ?></figcaption>
                        </div>
                        <div style="text-align:right; padding-right: 40px;">
                    <?php echo"
                        <h3>total: EGP {$row['amount']}</h3>";
                    ?>
                    </div>
                    </div>
                    <?php
                            
                        }
                    }
                 }
            ?>
               
               
        <!-- ------------- div Order -------------  -->
        
    </div>

</body>

</html>