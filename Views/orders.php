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
                <tr>
                    <th>2020/2/5 10:30 AM</th>
                    <td>Ahmed</td>
                    <td>2006</td>
                    <td>6506</td>
                    <td>deliver</td>
                </tr> 
            </tbody>
        </table>
        <!-- ------------- div Order -------------  -->
        <div style="text-align: center;">
            <div style="display: inline-block; padding: 50px;">
                <img src="../public/Images/coffee.jpg" width="50px" height="50px" />
                <span class="badge badge-pill badge-primary">10 EGP</span>
                <figcaption>coffee</figcaption>
                <figcaption>2</figcaption>

            </div>
            <div style="display: inline-block; padding: 50px;">
                <img src="../public/Images/nescafe.jpg" width="50px" height="50px" />
                <span class="badge badge-pill badge-primary">15 EGP</span>
                <figcaption>nescafe</figcaption>
                <figcaption>1</figcaption>

            </div>
            <div style="display: inline-block; padding: 50px;">
                <img src="../public/Images/tea.png" width="50px" height="50px" />
                <span class="badge badge-pill badge-primary">5 EGP</span>
                <figcaption>tea</figcaption>
                <figcaption>1</figcaption>
            </div>
            <div style="text-align:right; padding-right: 40px;">
                <h3>total: EGP 45</h3>
            </div>
        </div>

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
                <tr>
                    <th>2020/2/5 10:30 AM</th>
                    <td>Ahmed</td>
                    <td>2006</td>
                    <td>6506</td>
                    <td>deliver</td>
                </tr> 
            </tbody>
        </table>
        <!-- ------------- div Order -------------  -->
        <div style="text-align: center;">
            <div style="display: inline-block; padding: 50px;">
                <img src="../public/Images/coffee.jpg" width="50px" height="50px" />
                <span class="badge badge-pill badge-primary">10 EGP</span>
                <figcaption>coffee</figcaption>
                <figcaption>2</figcaption>

            </div>
            <div style="display: inline-block; padding: 50px;">
                <img src="../public/Images/nescafe.jpg" width="50px" height="50px" />
                <span class="badge badge-pill badge-primary">15 EGP</span>
                <figcaption>nescafe</figcaption>
                <figcaption>1</figcaption>

            </div>
            <div style="display: inline-block; padding: 50px;">
                <img src="../public/Images/tea.png" width="50px" height="50px" />
                <span class="badge badge-pill badge-primary">5 EGP</span>
                <figcaption>tea</figcaption>
                <figcaption>1</figcaption>
            </div>
            <div style="text-align:right; padding-right: 40px;">
                <h3>total: EGP 45</h3>
            </div>
        </div>
    </div>

</body>

</html>