<?php
    require_once '..' . DIRECTORY_SEPARATOR . 'config.php';
    $query ="select * from categories";
    $result = mysqli_query($db,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" media="screen" href="../public/css/styles.css"/>
    <title>Add Product</title>
</head>
<body>
    <?php include './adminNavbar.php' ?>
    <main class="add-product">
        <section class="main-padding">
          <div class="container">
            <h1><u>Add Product</u></h1>

            <form action="../Controller/Products.php" method="POST" enctype="multipart/form-data">
              <div class="form-group row">
                <label for="" class="offset-sm-1 col-sm-2 control-label">Product</label>
                <div class="col-sm-6">
                  <input class="form-control" type="text" name ="name" placeholder="Enter Product Name"/>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="offset-sm-1 col-sm-2 control-label">Price</label>
                <div class="col-sm-2">
                  <input class="form-control" type="number" name="price" min="0.00" max="10000.00" placeholder="0.0"/>
                </div>
                <div class="col-sm-1">
                  <span>EGP</span>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="offset-sm-1 col-sm-2 control-label">Category</label>
                <div class="col-sm-4">
                  <select name="category_id" class="form-control">
                  <?php
                    while($result_array=mysqli_fetch_array($result)){
                    echo "<option value={$result_array['id']}>{$result_array['name']}</option>";}
                  ?>
                  </select>
                </div>
                <div class="col-sm-2">
                  <a href="/Cafeteria-Project/Views/addCategory.php" class="btn btn-info w-100" >Add Category</a>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="offset-sm-1 col-sm-2 control-label">Product Picture</label>
                <div class="col-sm-6">
                  <input class="form-control-file" name="userfile" type="file" />
                </div>
              </div>
              <div class="form-group text-center">
                <button class="btn btn-success" name="AddProduct" type="submit">Save</button>
                <button class="btn btn-info" type="reset">Reset</button>
              </div>
            </form>
          </div>
        </section>
      </main>
      <script src="../public/js/jquery-3.3.1.js"></script>
      <script src="../public/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="../public/js/popper.min.js"></script>
</body>
</html>