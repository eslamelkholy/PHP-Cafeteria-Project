<?php
require_once '..' . DIRECTORY_SEPARATOR . 'config.php';

?>
<!--------------------------------------------------------------------------------->
<?php
$id = $_GET['id'];
$result = mysqli_query($db, "SELECT * FROM products WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
    $name = $res['product_name'];
    $price = $res['product_price'];
    $picture = $res['product_image'];
    $category = $res['category'];
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $category = $_POST['category'];
    $picture = $_POST['product_image'];

    $sql = "UPDATE products set product_name='" . $_POST["product_name"] . "',
             product_price='" . $_POST["product_price"] . "', category='" . $_POST["category"] . "',
             product_image='" . $_POST["product_image"] . "' WHERE id=$id";
    mysqli_query($db, $sql);
    $select_query = "SELECT * FROM products WHERE id='" . $id . "'";
    $result = mysqli_query($db, $select_query);
    $row = mysqli_fetch_array($result);

    header("Location:allproducts.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" media="screen" href="../public/css/styles.css" />
    <title>Edit Product</title>
</head>

<body>
    <div class="wrapper">
        <?php include './adminNavbar.php' ?>
        <div class="container offset-3" style="margin-top: 150px;">
            <div class="ml-md-5 col-md-8">
                <div class="card card-info mt-5">
                    <div class="card-header">
                        <h3 class="card-title text-center"><u>Edit product</u></h3>
                    </div>
                    <div>
                        <form role="form" method="get" action="allproducts.php" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputName">Product</label>
                                    <input type="text" name="product_name" value="<?php echo $name; ?>" class="form-control" id="" placeholder="Enter Product Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPrice">Price</label>
                                    <input type="number" class="form-control" value="<?php echo $price ?>" id="" name="product_price" placeholder="Enter New Price">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category" value="<?php echo $category; ?>">
                                        <?php
                                        $query = "SELECT * from categories";
                                        $result = mysqli_query($db, $query);

                                        ?>
                                        <?php while ($row1 = mysqli_fetch_array($result)) :; ?>

                                            <option value="<?php echo $row1[1]; ?>"><?php echo $row1[1]; ?></option>

                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Product picture</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="product_image" value="<?php echo $picture; ?>" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <input type="submit" name="update" value="Update" class="btn btn-success btn-block">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <script src="../public/js/jquery-3.3.1.js"></script>
            <script src="../public/js/bootstrap.bundle.min.js"></script>
            <script src="../public/js/popper.min.js"></script>
</body>

</html>