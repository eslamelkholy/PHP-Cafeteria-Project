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
        <h1 class="alert bg-light text-center text-primary">All Users</h1>
    </div>
    <!----------- Content ------------->
    <div class="container">
        <!-------------- Table --------------->
        <div>
            <table class="table table-bordered mt-3">
                <thead class="bg-info text-center">
                    <tr>
                        <th>Name</th>
                        <th>Room</th>
                        <th>Image</th>
                        <th>Ext.</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <th>Nasr</th>
                        <td>2005</td>
                        <td><img src="../public/Images/login5.jpg" width="50px" height="50px" alt="Admin Picture">
                        </td>
                        <td>5605</td>
                        <td><a href="#" class="btn btn-success btn-sm">Edit</a></td>
                        <td><a href="#" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                    <tr>
                        <th>Ayman</th>
                        <td>2005</td>
                        <td><img src="../public/Images/login5.jpg" width="50px" height="50px" alt="Admin Picture">
                        </td>
                        <td>5605</td>
                        <td><a href="#" class="btn btn-success btn-sm">Edit</a></td>
                        <td><a href="#" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                    <tr>
                        <th>Hend</th>
                        <td>2010</td>
                        <td><img src="../public/Images/login5.jpg" width="50px" height="50px" alt="Admin Picture">
                        </td>
                        <td>5605</td>
                        <td><a href="#" class="btn btn-success btn-sm">Edit</a></td>
                        <td><a href="#" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                    <tr>
                        <th>Noha</th>
                        <td>2010</td>
                        <td><img src="../public/Images/login5.jpg" width="50px" height="50px" alt="Admin Picture">
                        </td>
                        <td>5605</td>
                        <td><a href="#" class="btn btn-success btn-sm">Edit</a></td>
                        <td><a href="#" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                </tbody>
            </table>
            <a href="#" class="btn btn-success btn-lg col-12">Add User</a>
        </div>

    </div>


</body>

</html>