<html>
<head>
    <title>My Orders</title>
    <?php require_once '../config.php'; ?>
    <link href="../public/css/bootstrap.css" rel="stylesheet" />
    <link href="../public/css/font-awesome.css" rel="stylesheet" />
    <style>
        #listOrder{
            margin-left: 20px;
            margin-top: -10px
        }
        .showOrder{
            height: 30px;
            font-weight: bold;
            float: right;
            margin-left: -20px;
            padding-top: -20px;   
        }
        img{
            width: 100px;
            height: 100px;
        }
        .row{
            text-align: center;
        }
        .orderImages{
            text-align: center;
            border: 2px solid black;
            width: 100%;
            margin-top: 50px;
            
        }
        .images{
            margin-left: 40px;
            display: inline-block;
        }
        figcaption{
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!------------- Navbar ------------->
    <?php include './userNavbar.php' ?>
    <!----------- Title -------------->
    <div>
        <h1 class="alert bg-light text-center text-primary">My Orders</h1>
    </div>
    <!----------- Content ------------->
    <div class="container">
        <div class="h5 mt-4">
            <form action="" method="POST">
                <label for="date">Date From</label>
                <input type="date" />
                <label for="date">Date To</label>
                <input type="date" />
                <input id="listOrder" type="submit" class="btn btn-success" value="showOrders" name="showOrders" />
            </form>
        </div>
        <!--------------Orders Table --------------->
        <div>
            <table class="table rounded table-hover  mt-3">
                <thead class="bg-info">
                    <tr>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $userOrder = new Order();
                $userOrder->setUserId(1);
                if(isset($_GET))
                {
                    $result = $userOrder->listOrders();
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <th><?php echo $row['order_date']; ?>
                                <a class="btn btn-primary showOrder" onclick="showOrder(<?php echo $row['id']; ?>,this)"> + </a>
                            </th>
                            <td>
                                <?php 
                                    echo ($row['status'] == "1" ) ? "Processing " : (($row['status'] == "2") ? "Out Of Deliver" : "Done"); 
                                ?>
                            </td>
                            <td><?php echo $row['amount']; ?></td>
                            <td>
                                <?php 
                                    if(($row['status'] == "1" )){ ?>
                                        <a href="#" class="btn btn-success btn-sm">Cancel Order</a>
                                <?php }?>
                            </td>
                        </tr>
                <?php } ?>
                
                <?php }
                    //List Order within Days
                    else if(isset($_POST["showOrders"])){
                        echo "POST REQUEST";
                        
                ?>
                <?php }  ?>

                </tbody>
            </table>
        </div>
        <div class="row text-center">
            <div class="orderImages">
                
            </div>

        </div>

    </div>
    <script src="../public/js/JQuery-3.3.1.min.js"></script>
    <script src="../public/js/popper.js"></script>
    <script src="../public/js/bootstrap.js"></script>
    <script src="../public/js/moveOrders.js"></script>
</body>

</html>