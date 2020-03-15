<?php require_once '..' . DIRECTORY_SEPARATOR . 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
  <link type="text/css" rel="stylesheet" media="screen" href="../public/css/styles.css" />
  <title>Home</title>
  <style>
    .btn-info{
      text-align: center;
      font-weight: bold;
      font-size: 18px;
      
    }
    .quantity{
      font-weight: bold;
      color: #17a2b8;
      font-size: 24px;
    }
  </style>
</head>

<body>
  <?php include './userNavbar.php' ?>
  <main class="add-user">
    <section class="main-padding" style="text-align: right;">
      <div class="search-container" style="margin-right:20px">
        <form action="#">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </section>
    <div class="row" style="width: 100%;">
      
      <section  class=" col-4" style="margin-left: 20px">
        <div style=" border: 1px black solid;" >
          <h1 style="text-align:center;">Order</h1>
          <form action="../Controller/orderController.php" method="POST" class="form-horizontal text-info">
            <!-- Clicked Orders Section -->
            <div id="SelectedOrdersContainers">
              <div class="form-group row" >
                <label for="" class="offset-sm-1 col-sm-2 control-label" >Cafee</label>
                <div class="col-sm-6">
                  <input class="form-control onRuntime" name="Cafee" type="number" placeholder="0" value="0" min="0" max="10"style="width: 100px;" />
                  <div style="text-align: right;margin-top:-35px">
                    EGP  <span id="total" class="col-2 quantityTotalPrice"> 0 </span>
                    (<span id="cancel">10</span>)
                  </div>
                </div>
              </div>
            </div>
            <!-- Notes Section -->
            <div class="form-group row">
              <label for="" class="offset-sm-1 col-sm-2 control-label">Notes</label>
              <div class="col-sm-6">
                <input class="form-control" name="Notes" type="text" placeholder="Enter your notes about the order"
                  style="width: 300px; height: 100px;" />
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="offset-sm-1 col-sm-2 control-label">Room</label>
              <div class="col-sm-6">
                <select name="room_no">
                  <option value="200">200</option>
                  <option value="201">201</option>
                  <option value="202">202</option>
                  <option value="203">203</option>
                  <option value="204">204</option>
                </select>
              </div>
            </div>
            <hr class="divider" >
            <div style="text-align:right;margin-right:20px">
            <!-- Total Price -->
              <h3>EGP  <input class="col-2 btn btn-info" type="text" value="0" name="totalPrice" readonly /> </h3>
            </div>
            <br />
            <div class="form-group text-center">
              <input class="btn btn-success" type="submit" name="addOrder" value="Order Now !!">
            </div>
          </form>
        </div>
      </section>

      <section  class="offset-1 col-6" style="text-align: center; border: 1px black solid;">
        <h1>Last Order</h1>
        <!-- Last Orders !!! -->
        <?php $result = Order::getLastOrderData();
            while ($row = mysqli_fetch_assoc($result)) { ?>
            <div style="display: inline-block; margin: 10px;">
              <img src="../public/Images/<?php echo $row['product_picture']; ?>" width="100px" height="100px" />
              <figcaption><?php echo $row['name']; ?></figcaption>
              <figcaption class="quantity"><?php echo $row['quantity'] ?></figcaption>
            </div>
        <?php }?>
        <hr class="divider">
        <div style="display: inline-block; margin: 10px;">
        <?php 
          //List All Products
          $product = new Products();
          $result = $product->listAllProducts();
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <div style="display: inline-block; margin: 10px;">
              <img class="orders" src="../public/Images/<?php echo $row['product_picture']; ?>" width="100px" height="100px"  />
              <span class="badge badge-pill badge-primary"><?php echo $row['price']; ?> EGP</span>
              <figcaption><?php echo $row['name'] ?></figcaption>
            </div>
        <?php }?>
        </div>
      </section>
    </div>
  </main>
  <script src="../public/js/jquery-3.3.1.js"></script>
  <script src="../public/js/bootstrap.bundle.min.js"></script>
  <script src="../public/js/popper.min.js"></script>
  <script src="../public/js/moveOrders.js"></script>
</body>

</html>