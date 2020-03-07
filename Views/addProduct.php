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
            <form action="">
              <div class="form-group row">
                <label for="" class="offset-sm-1 col-sm-2 control-label">Product</label>
                <div class="col-sm-6">
                  <input class="form-control" type="text" placeholder="enter product name"/>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="offset-sm-1 col-sm-2 control-label">Price</label>
                <div class="col-sm-2">
                  <input class="form-control" type="number" min="0.00" max="10000.00" placeholder="0.0"/>
                </div>
                <div class="col-sm-1">
                  <span>EGP</span>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="offset-sm-1 col-sm-2 control-label">Category</label>
                <div class="col-sm-4">
                  <select name="categories" class="form-control">
                    <optgroup label="Hot Drinks">
                      <option value="tea">tea</option>
                      <option value="nescafe">nescafe</option>
                      <option value="hot chocolate">hot chocolate</option>
                    </optgroup>
                    <optgroup label="Cold Drinks">
                      <option value="pepsi">pepsi</option>
                      <option value="water">water</option>
                      <option value="limon">limon</option>
                    </optgroup>
                  </select>
                </div>
                <div class="col-sm-2">
                  <a href="#" class="btn btn-info w-100" data-toggle="modal" data-target="#exampleModalCenter">Add Category</a>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="offset-sm-1 col-sm-2 control-label">Product Picture</label>
                <div class="col-sm-6">
                  <input class="form-control-file" type="file" />
                </div>
              </div>
              <div class="form-group text-center">
                <button class="btn btn-success" type="submit">Save</button>
                <button class="btn btn-info" type="reset">Reset</button>
              </div>
            </form>
          </div>
        </section>
      </main>
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Add New Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="">
              <div class="modal-body">
                <div class="form-group row">
                  <label for="" class="col-sm-4 control-label">Category name</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" placeholder="Enter the Category name"/>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Category</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <script src="../public/js/jquery-3.3.1.js"></script>
      <script src="../public/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="../public/js/popper.min.js"></script>
</body>
</html>