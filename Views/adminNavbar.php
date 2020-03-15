<header>
    <nav class="navbar navbar-expand-lg navbar-danger bg-light">
        <div class="container">
            <h2 class="text-info">Cafeteria |</h2>
            <!-- <a class="navbar-brand" href="#">Cafeteria |</a> -->
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="adminhome.php">Home<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allproducts.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allusers.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="orders.php">Manual Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Checks.php">Checks</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class="my-2 my-sm-0">
                        <img src="../public/Images/userAvatar.png" width="50" height="50" alt="userAvatar" />
                        <span class="h4">
                            <?php
                            if ($_SESSION['isLogged']) {
                                echo $_SESSION['username'];
                            } else {
                                header("Location:login.php");
                            }
                            ?>
                        </span>
                    </div>
                </form>
                <a href="../Controller/authentication.php" class="btn btn-warning;float:right">Logout</a>
            </div>
        </div>
    </nav>
</header>