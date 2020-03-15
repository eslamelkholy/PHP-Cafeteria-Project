<header>
    <nav class="navbar navbar-expand-lg navbar-danger bg-light">
        <div class="container">
            <h2 class="text-info">Cafeteria |</h2>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="userhome.php">Home<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="myorders.php">My Orders</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class="my-2 my-sm-0">
                        <img src="../public/Images/userAvatar.png" width="50" height="50" alt="userAvatar" />
<<<<<<< HEAD
                        <span class="h4">
                            <?php
                            if ($_SESSION['isLogged']) {
                                echo $_SESSION['username'];
                            } else {
                                header("Location:login.php");
                            }
                            ?>
                        </span>
=======
                        <span class="h4">Eslam</span>
>>>>>>> ac387299dea30548979718ccc6a0d52f82283c53
                    </div>
                </form>
                <a href="../Controller/authentication.php" class="btn btn-warning;float:right">Logout</a>
            </div>
        </div>
    </nav>
</header>