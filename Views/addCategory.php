<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" media="screen" href="../public/css/styles.css"/>
    <title>Add Category</title>
</head>
<body>
    <?php include './adminNavbar.php' ?>
    <main class="add-category">
        <section class="main-padding">
          <div class="container">
            <h1><u>Add Category</u></h1>
            <form action="../Controller/addCategory.php" method="POST">
              <div class="form-group row">
                <label for="" class="offset-sm-1 col-sm-2 control-label">Category</label>
                <div class="col-sm-6">
                  <input class="form-control" type="text" name="name" placeholder="Enter Category Name"/>
                </div>
              </div>
              <div class="form-group text-center">
                <button class="btn btn-success" name="AddCategory" type="submit">Save</button>
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