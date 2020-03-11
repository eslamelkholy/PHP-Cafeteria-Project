

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
                <?php 
    require_once '..' . DIRECTORY_SEPARATOR . 'config.php';
    $user = new User();
    $userList = $user->listUsers();
    while($row = mysqli_fetch_assoc($userList)){
        echo "
                    <tr>
                        <th>{$row['name']}</th>
                        <td>{$row['room_no']}</td>
                        <td><img src='../public/Images/{$row['profile_picture']}' width='50px' height='50px' alt='Admin Picture'>
                        </td>
                        <td>{$row['ext']}</td>
                        <td><a href='editUser.php?editId={$row['id']}' class='btn btn-success btn-sm'>Edit</a></td>
                        <td><a href='../controller/userController.php?DeleteId={$row['id']}' class='btn btn-danger btn-sm'>Delete</a></td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
            <a href="addUser.php " class="btn btn-success btn-lg offset-5 col-2">Add User</a>
        </div>

    </div>


</body>

</html>