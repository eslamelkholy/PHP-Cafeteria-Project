<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
  <link type="text/css" rel="stylesheet" media="screen" href="../public/css/styles.css" />
  <title>Home</title>
</head>

<body class="">
  <?php include './adminNavbar.php' ?>
  <main class="add-user">
    <section class="main-padding" style="text-align: right;">
      <div class="search-container" style="margin-right:20px">
        <form action="#">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </section>
    <div class="row">
      
      <section  class="col-4">
        <div class="container"
          style=" text-align: left; border: 1px black solid; width: 500px; margin-left:10px">
          <h1 style="text-align:center;">Order</h1>
          <form action="#" method="POST" class="form-horizontal text-info">
            <div class="form-group row">
              <label for="" class="offset-sm-1 col-sm-2 control-label">Tea</label>
              <div class="col-sm-6">
                <input class="form-control" type="number" placeholder="0" value="2" min="0" max="10"
                  style="width: 100px;" />
                <div style="text-align: right;">
                  <span id="total"class="col-2" >EGP 45</span>
                  <span id="cancel">X</span>
                </div>

              </div>
            </div>
            <div class="form-group row">
              <label for="" class="offset-sm-1 col-sm-2 control-label">Cafee</label>
              <div class="col-sm-6">
                <input class="form-control" type="number" placeholder="0" value="" min="0" max="10"
                  style="width: 100px;" />
                <div style="text-align: right;">
                  <span id="total" class="col-2">EGP 0 </span>
                  <span id="cancel">X</span>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="offset-sm-1 col-sm-2 control-label">Notes</label>
              <div class="col-sm-6">
                <input class="form-control" type="text" placeholder="Enter your notes about the order"
                  style="width: 300px; height: 100px;" />
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="offset-sm-1 col-sm-2 control-label">Room</label>
              <div class="col-sm-6">
                <select>
                  <option value="2006">2006</option>
                  <option value="2005">2005</option>
                </select>
              </div>
            </div>

            <hr class="divider" >

            <div style="text-align:right;">
              <h3>EGP 45 </h3>
            </div>
            <br />
            <div class="form-group text-center">
              <button class="btn btn-success" type="submit">Confirm</button>
            </div>
          </form>
        </div>
      </section>

      <section  class="offset-1 col-6" style="text-align: center; border: 1px black solid;">
        <h3>Add to user</h3>
        <select>
          <option value="1">Ahemd</option>
          <option value="2">Mohamed</option>
        </select>
        
        <hr class="divider">
        <div style="display: inline-block; margin: 10px;">
          <div style="display: inline-block; margin: 10px;">
            <img src="../public/Images/tea.png" width="100px" height="100px"  />
            <figcaption>Tea</figcaption>
          </div>
          <div style="display: inline-block; margin: 10px;">
            <img src="../public/Images/coffee.jpg" width="100px" height="100px" />
            <figcaption>caffee</figcaption>
          </div>
          <div style="display: inline-block; margin: 10px;">
            <img src="../public/Images/nescafe.jpg" width="100px" height="100px"  />
            <figcaption>nescafe</figcaption>
          </div>
          <div style="display: inline-block; margin: 10px;">
            <img src="../public/Images/tea.png" width="100px" height="100px"  />
            <figcaption>Tea</figcaption>
          </div>
          <div style="display: inline-block; margin: 10px;">
            <img src="../public/Images/nescafe.jpg" width="100px" height="100px"  />
            <figcaption>nescafe</figcaption>
          </div>
          <div style="display: inline-block; margin: 10px;">
            <img src="../public/Images/nescafe.jpg" width="100px" height="100px"  />
            <span class="badge badge-pill badge-primary">15 EGP</span>
            <figcaption>nescafe</figcaption>
          </div>
          <div style="display: inline-block; margin: 10px;">
            <img src="../public/Images/coffee.jpg" width="100px" height="100px" />
            <span class="badge badge-pill badge-primary">10 EGP</span>
            <figcaption>caffee</figcaption>
          </div>
          <div style="display: inline-block; margin: 10px;">
            <img src="../public/Images/tea.png" width="100px" height="100px"  />
            <span class="badge badge-pill badge-primary">5 EGP</span>
            <figcaption>Tea</figcaption>
          </div>
          <div style="display: inline-block; margin: 10px;">
            <img src="../public/Images/icecream.jpg" width="100px" height="100px"  />
            <span class="badge badge-pill badge-primary">20 EGP</span>
            <figcaption>IceCream</figcaption>
          </div>
         
        </div>

      </section>
    </div>
  </main>
  <script src="../public/js/jquery-3.3.1.js"></script>
  <script src="../public/js/bootstrap.bundle.min.js"></script>
  <script src="../public/js/popper.min.js"></script>
</body>

</html>