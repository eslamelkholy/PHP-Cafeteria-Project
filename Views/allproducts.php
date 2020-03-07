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

        <h1 class="alert bg-light text-center text-primary">
            <img src="../public/Images/icons8-tea-cup-100.png" width="70" class="mr-2" alt="logo">
            All Products
            <img src="../public/Images/icons8-tea-cup-100.png" width="70" class="mr-2" alt="logo">
        </h1>
    </div>
    <!----------- Content ------------->
    <div class="container">
        <!-------------- Table --------------->
        <div>
            <table class="table table-bordered mt-3">
                <thead class="bg-info text-center">
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <th>Tea</th>
                        <td>5 EGP</td>
                        <td><img src="../public/Images/tea.png" width="50px" height="50px" alt="Admin Picture">
                        </td>
                        <td><a href="#" class="btn btn-success btn-sm">Edit</a></td>
                        <td><a href="#" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                    <tr>
                        <th>Nescafe</th>
                        <td>15 EGP</td>
                        <td><img src="../public/Images/nescafe.jpg" width="50px" height="50px" alt="Admin Picture">
                        </td>
                        <td><a href="#" class="btn btn-success btn-sm">Edit</a></td>
                        <td><a href="#" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                    <tr>
                        <th>Coffee</th>
                        <td>10 EGP</td>
                        <td><img src="../public/Images/coffee.jpg" width="50px" height="50px" alt="Admin Picture">
                        </td>
                        <td><a href="#" class="btn btn-success btn-sm">Edit</a></td>
                        <td><a href="#" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                    <tr>
                        <th>Ice Cream</th>
                        <td>20 EGP</td>
                        <td><img src="../public/Images/icecream.jpg" width="50px" height="50px" alt="Admin Picture">
                        </td>
                        <td><a href="#" class="btn btn-success btn-sm">Edit</a></td>
                        <td><a href="#" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                </tbody>
            </table>
            <a href="#" class="btn btn-success btn-lg col-12">Add Product</a>
        </div>

    </div>


</body>

</html>