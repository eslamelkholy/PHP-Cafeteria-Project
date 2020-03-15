<?php
require_once '..' . DIRECTORY_SEPARATOR . 'config.php';
include '../Controller/orderController.php' ?>

<html>

<head>
    <title>Orders</title>
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
                <!-- ------------list orders------------ -->

                <?php require_once '..' . DIRECTORY_SEPARATOR . 'config.php';
                $order = new Order();
                $listOrder = $order->listOrderOfUser();
                if ($listOrder) {
                    while ($row = mysqli_fetch_assoc($listOrder)) {
                ?>
                        <tr class="bg-dark text-light">
                            <th><?php echo $row['order_date'] ?></th>
                            <th><?php echo $row['name'] ?></th>
                            <th><?php echo $row['room_no'] ?></th>
                            <th><?php echo $row['ext'] ?></th>
                            <th><?php echo $row['status'] ?></th>
                        </tr>
                        <!---------------- div Order ----------------->
                        <tr>
                            <td colspan=5 style="text-align: center;">
                                <div style="display: inline-block; padding: 10px;">
                                    <?php
                                    $orderId = $order->setOrderId($row['order_id']);
                                    $orderDetailes = $order->listAllOrder_Related_Info($orderId);
                                    if ($orderDetailes) {
                                        while ($detailes = mysqli_fetch_assoc($orderDetailes)) {
                                    ?>
                                            <div style="display: inline-block; margin: 10px;">
                                                <img src="../public/Images/<?php echo $detailes['product_picture'] ?>" width="80px" height="80px" />
                                                <span class="badge badge-pill badge-primary"><?php echo $detailes['price'] ?> EGP</span>
                                                <figcaption><?php echo $detailes['name'] ?></figcaption>
                                                <figcaption><?php echo $detailes['quantity'] ?></figcaption>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                </div>
                                <div style="text-align:right; padding-right: 40px;">
                                    <?php echo "
                        <h3>total: EGP {$row['amount']}</h3>";
                                    ?>
                                </div>
                            </td>
                        </tr>

            <?php

                                    }
                                }
                            }
            ?>
            </tbody>
        </table>
    </div>

    </div>

</body>

</html>