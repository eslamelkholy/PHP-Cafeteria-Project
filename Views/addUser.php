<?php
require_once '..' . DIRECTORY_SEPARATOR . 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
  <link type="text/css" rel="stylesheet" media="screen" href="../public/css/styles.css" />
  <title>Add User</title>
</head>

<body class="">
  <?php include './adminNavbar.php' ?>
  <main class="add-user">
    <section class="main-padding">
      <div class="container">
        <h1><u>Add User</u></h1>
        <!------------ Add user Form ------------->
        <form action="../Controller/authentication.php" method="POST" enctype="multipart/form-data" class="form-horizontal text-info">
          <div class="form-group row">
            <label for="" class="offset-sm-1 col-sm-2 control-label">Name</label>
            <div class="col-sm-6">
              <input class="form-control" type="text" name="username" placeholder="Enter your name" />
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="offset-sm-1 col-sm-2 control-label">Email</label>
            <div class="col-sm-6">
              <input class="form-control" type="email" name="email" placeholder="Enter your Email" />
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="offset-sm-1 col-sm-2 control-label">Password</label>
            <div class="col-sm-6">
              <input class="form-control" type="password" name="password" placeholder="Enter your password" />
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="offset-sm-1 col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-6">
              <input class="form-control" type="password" name="cfrmPassword" placeholder="Confirm your password" />
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="offset-sm-1 col-sm-2 control-label">Room No.</label>
            <div class="col-sm-6">
              <input class="form-control" type="text" name="roomNum" placeholder="Enter your Room No." />
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="offset-sm-1 col-sm-2 control-label">Ext.</label>
            <div class="col-sm-6">
              <input class="form-control" type="text" name="ext" placeholder="Enter your Ext." />
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="offset-sm-1 col-sm-2 control-label">Profile Picture</label>
            <div class="col-sm-6">
              <input class="form-control-file" name="pic" type="file" />
            </div>
          </div>
          <div class="form-group text-center">
            <button class="btn btn-success btn-lg col-1" type="submit" name="adduser">Add</button>
            <button class="btn btn-info btn-lg col-1" type="reset">reset</button>
          </div>
        </form>
      </div>
    </section>
  </main>
  <script src="../public/js/jquery-3.3.1.js"></script>
  <script src="../public/js/bootstrap.bundle.min.js"></script>
  <script src="../public/js/popper.min.js"></script>
</body>

</html>