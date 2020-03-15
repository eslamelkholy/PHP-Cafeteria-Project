<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" media="screen" href="../public/css/styles.css"/>
    <title>Edit User</title>
</head>
<body >
<?php include './adminNavbar.php' ?>

<?php require_once '..' . DIRECTORY_SEPARATOR . 'config.php';
     $user = new User();
     $result = $user->selectUser($_GET['editId']);
     if($result){
        $userData = mysqli_fetch_assoc($result);
     }
     
     ?>


    <main class="add-user">
        <section class="main-padding">
          <div class="container">
            <h1 class="alert bg-light text-center text-primary">Edit User</h1>
            <form action="../Controller/userController.php" method="POST" class="form-horizontal text-info" enctype="multipart/form-data" >
            <div class="form-group row">
                <label for="" class="offset-sm-1 col-sm-2 control-label">ID</label>
                <div class="col-sm-6">
                  <input class="form-control" type="text" name="id" value = "<?php echo $userData['id'];?>" readonly/>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="offset-sm-1 col-sm-2 control-label">Name</label>
                <div class="col-sm-6">
                  <input class="form-control" type="text" name="name" placeholder="enter your name" value = "<?php echo $userData['name']; ?>"/>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="offset-sm-1 col-sm-2 control-label">Email</label>
                <div class="col-sm-6">
                  <input class="form-control" type="email" name="email" placeholder="enter your Email" value = "<?php echo $userData['email']; ?>"/>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="offset-sm-1 col-sm-2 control-label">Password</label>
                <div class="col-sm-6">
                  <input class="form-control" type="text" name="password" placeholder="enter your password" value = "<?php echo $userData['password']; ?>"/>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="offset-sm-1 col-sm-2 control-label">Room No.</label>
                <div class="col-sm-6">
                  <input class="form-control" type="text" name="room" placeholder="enter your Room No." value = "<?php echo $userData['room_no']; ?>"/>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="offset-sm-1 col-sm-2 control-label">Ext.</label>
                <div class="col-sm-6">
                  <input class="form-control" type="text" name="ext" placeholder="enter your Ext." value = "<?php echo $userData['ext'] ?>"/>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="offset-sm-1 col-sm-2 control-label">Profile Picture</label>
                <div class="col-sm-6">
                  <input class="form-control-file" type="file" name="profileImg"  placeholder="enter your Room No."/>
                </div>
              </div>
              <div class="form-group text-center">
                <button class="btn btn-success" type="submit" name="update">Update</button>
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