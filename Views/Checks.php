<?php
    require_once '..' . DIRECTORY_SEPARATOR . 'config.php';
    $query ="select id,name from users";
    $result = mysqli_query($db,$query);
?>

<?php
    if(isset($_GET)){
      $query2="select users.id as id,name,SUM(amount) as amount from users left join orders on users.id=orders.user_id GROUP BY name";
      $result2=mysqli_query($db,$query2);
    }
    if(isset($_POST['filter'])){
           if($_POST['users']=="All" and !empty($_POST['start_date']) and !empty($_POST['end_date'])){
          $start_date=date("Y-m-d H:i:s",strtotime(str_replace('/','-',$_POST['start_date'])));
          $end_date=date("Y-m-d H:i:s",strtotime(str_replace('/','-',$_POST['end_date'])));
          $query2="select users.id as id,name,SUM(amount) as amount from users left join orders on users.id=orders.user_id where order_date between {$start_date} and {$end_date} GROUP BY name";
          $result2=mysqli_query($db,$query2);
      }
      elseif($_POST['users']=="All" and !empty($_POST['start_date'])){
        $start_date=date("Y-m-d H:i:s",strtotime(str_replace('/','-',$_POST['start_date'])));
        $query2="select users.id as id,name,SUM(amount) as amount from users left join orders on users.id=orders.user_id where order_date between {$start_date} and curdate() GROUP BY name";
        $result2=mysqli_query($db,$query2);
      }
      elseif($_POST['users']=="All"){
        $query2="select users.id as id,name,SUM(amount) as amount from users left join orders on users.id=orders.user_id";
          $result2=mysqli_query($db,$query2);
      }
      elseif($_POST['users']!="All" and !empty($_POST['start_date']) and !empty($_POST['end_date'])){
          $start_date=date("Y-m-d H:i:s",strtotime(str_replace('/','-',$_POST['start_date'])));
          $end_date=date("Y-m-d H:i:s",strtotime(str_replace('/','-',$_POST['end_date'])));
          $query2="select users.id as id,name,SUM(amount) as amount from users left join orders on users.id=orders.user_id  where users.id={$_POST['users']} and order_date between {$start_date} and {$end_date}";
          $result2=mysqli_query($db,$query2);
      }
      elseif($_POST['users']!="All" and !empty($_POST['start_date'])){
        $start_date=date("Y-m-d H:i:s",strtotime(str_replace('/','-',$_POST['start_date'])));
        $query2="select users.id as id,name,SUM(amount) as amount from users left join orders on users.id=orders.user_id  where users.id={$_POST['users']} and order_date between {$start_date} and curdate()";
        $result2=mysqli_query($db,$query2);
      }
      elseif($_POST['users']!="All"){
        $query2="select users.id as id,name,SUM(amount) as amount from users left join orders on users.id=orders.user_id  where users.id={$_POST['users']}";
        $result2=mysqli_query($db,$query2);
      }

    }  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .collapseButton {
  vertical-align: text-top;
}

th, td {
  padding: 1em;
}

#hidden {
  display: none;
}

.Table {
  margin-left: 12em;
  margin-top: 1em;
  margin-right: 1em;
}

table {
  border-collapse: collapse;
  text-align:center;
}

table tr:nth-child(even) {
  background-color: #5873C1;
  color: white;
}

table tr:nth-child(odd) {
  background-color: #3756B1;
  color: white;
}

table th {
  background-color: #092168;
}

table th, td {
  padding: 1em;
  text-align: center;
}

#collapseButton:hover {
  background-color: #092168;
}
    </style>
    <script>
        
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" media="screen" href="../assets/css/styles.css" />
    <title>Checks</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-danger bg-light">
            <div class="container">
                <h2 class="text-info">Cafeteria |</h2>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Manual Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Checks</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <div class="my-2 my-sm-0">
                            <img src="../assets/img/userAvatar.png" width="50" height="50" alt="userAvatar" />
                            <span class="h4">  Admin</span>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main class="checks">
        <section class="main-padding">
            <div class="container">
                <h1><u>Checks</u></h1>
                <form action="http://localhost/Cafeteria-Project/Views/Checks.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="start">Start date:</label>
                                <input type="date" id="date" class="form-control start" name="start_date" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="end">End Date:</label>
                                <input type="date" id="date" class="form-control end" name="end_date" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="select-user from-group">
                                <select name="users" class="form-control">
                                <?php
                                    while($result_array=mysqli_fetch_array($result)){
                                    echo "<option value={$result_array['id']}>{$result_array['name']}</option>";}
                                ?>
                                    <option selected value="All">All Users</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" name="filter" class="btn btn-success">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <table class="table">
  <tr>
    <th></th>
    <th>Name</th>
    <th>Amount Of Money</th>
  </tr>
  <?php
  
  while($result_array2=mysqli_fetch_array($result2)){
    echo"
  <tr>
    <td id='collapseButton' onclick='collapseUser({$result_array2['id']},this)'>+</td>
    <td>{$result_array2['name']}</td>
    <td>{$result_array2['amount']}</td>
  </tr>
  <tr id='hidden'>
    <td></td>
    <td colspan=3>
        <table id='orders'>
          <tr>
            <th></th>
            <th>Order Date</th>
            <th>Amount Of Money</th>
          </tr>";
          // while($result_array3=mysqli_fetch_array($result3)){
          //   echo"
          // <tr>
          //   <td id='collapseButton' onclick='collapseOrder({$result_array3['id']},this)'>+</td>
          //   <td>{$result_array3['order_date']}</td>
          //   <td>{$result_array3['amount']}</td>
          // </tr>";}
          echo "
          <tr>
            <td></td>
            <td colspan=2>
              <table id='products'>
                <tr>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                </tr>";
                // while($result_array4=mysqli_fetch_array($result4)){
                //     echo"
                // <tr>
                //   <td>{$result_array4['name']}</td>
                //   <td>{$result_array4['price']}</td>
                //   <td>{$result_array4['quantity']}</td>
                // </tr>";}
                echo"
              </table>
            </td>
          </tr>
        </table>
    </td>
  </tr>";}
  ?>
</table>
    </main>
    <script src="../assets/js/jquery-3.3.1.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../public/js/showProducts.js"></script>
</body>

</html>