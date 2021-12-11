<?php
if(!isset($_COOKIE['loggedinuser']))
{
  header("Location:login.php");
}
if(isset($_POST['logout']))
{
  setcookie("loggedinuser","",time()-60);
  header("Location:\Admin Updated\home.html");
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manager Home Page </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>

<body>
      <div class="jumbotron text-center" style="margin-bottom:0">
      <h1>Welcome to</h1>
      <h2>Airline Ticket Reservation System </h2>
          <ul class="nav justify-content-center">
              <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
              </button>
                  <div class="collapse navbar-collapse" id="collapsibleNavbar">
                      <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="manager_homepage.php">Home</a>
                        </li>

                          <li class="nav-item">
                              <a class="nav-link" href="add_staff.php">Add New Staff</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="list_staff.php">Staff List</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="add_operation.php">Add New Operation</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="list_operation.php">Operation List</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="add_maintenance.php">Add New Maintenance</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="list_maintenance.php">Maintenance List</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="add_expense.php">Add New Expense</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="list_expense.php">Expense List</a>
                          </li>
                          <li class="nav-item">
                            <form class="nav-link" method="post" action="">
                              <input type="submit" value="Log out" name="logout">
                           </form>
                          </li>
                      </ul>
                  </div>
              </nav>
          </ul>
      <img src="fly.jpg" alt="IMAGE" style="width:1000px;height:500px";>
      </div>
      <div class=" header ">

      </div>
</body>

</html>
