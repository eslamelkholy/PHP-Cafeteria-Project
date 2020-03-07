<html>

<head>
    <title>My Orders</title>
    <link href="../public/css/bootstrap.css" rel="stylesheet" />
    <link href="../public/css/font-awesome.css" rel="stylesheet" />
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
        <div class="text-center h4 mt-4">
            <label for="date">Date From</label>
            <input type="date" />
            <label for="date">Date To</label>
            <input type="date" />
        </div>
        <!-------------- Table --------------->
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
                    <tr>
                        <th>2020/2/5 10:30 AM</th>
                        <td>Processing</td>
                        <td>30 EGP</td>
                        <td><a href="#" class="btn btn-success btn-sm">Cancel</a></td>
                        </td>
                    </tr>
                    <tr>
                        <th>2020/2/7 11:30 AM</th>
                        <td>Out Of Delivery</td>
                        <td>25 EGP</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>2020/2/6 12:30 AM</th>
                        <td>Done</td>
                        <td>20 EGP</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>


</body>

</html>