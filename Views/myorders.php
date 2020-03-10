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
                            <th><?php echo $row['order_date']; ?></th>
                            <td>
                                <?php 
                                    echo ($row['status'] == "1" ) ? "Processing " : (($row['status'] == "2") ? "Out Of Deliver" : "Done"); 
                                ?>
                            </td>
                            <td><?php echo $row['amount']; ?></td>
                            <td><a href="#" class="btn btn-success btn-sm">Cancel</a></td>
                            
                        </tr>
                <?php } ?>
                
                <?php }else if(isset($_POST["showOrders"])){
                        echo "POST REQUEST";
                        
                ?>
                <?php }  ?>

                </tbody>
            </table>
        </div>

    </div>


</body>

</html>