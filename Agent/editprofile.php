<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Profile</title>
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

    <body>

        <div class="jumbotron text-center" style="margin-bottom:0">
            <h1>Welcome to</h1>
            <h2>Airline Ticket Reservation System </h2>
            <h4> Edit Profile </h4><br><br>

            <ul class="nav justify-content-center">

                <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                          <li class="nav-item">
                                  <a class="nav-link" href="agenthomepage.html">Back</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="profile.php">My Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="purchaseTicket.php">Purchase Ticket</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="customers.php">Customer List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="flights.php">Flight Information</a>
                                </li>

                              <li class="nav-item">
                                  <a class="nav-link" href="logoutAgent.php">Log Out</a>
                              </li>
                        </ul>
                    </div>
                </nav>
<?php
session_start();
if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){
 $uname = $_SESSION['uname'];
if($_SERVER['REQUEST_METHOD'] == "POST"){

if(strlen($_REQUEST["f"])==0 || strlen($_REQUEST["u"])==0){
	echo "All fields are mandatory!";
}
else{

    $sql="UPDATE `user` SET `password`=".$_REQUEST["u"]." , `email`='".$_REQUEST["f"]."' WHERE `uname`='$uname'";
	$conn = mysqli_connect("localhost", "root", "","cred");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
    $c=mysqli_affected_rows($conn);

    echo "<br/>";
    echo "Updated";
  }
 }
}

?>


<form action="editprofile.php" method="post">

<table>
<tr>
<td>Email:</td>
<td><input type="text" name="f"></td>
<tr>
<td>Password:</td>
<td><input type="text" name="u"></td>
<tr>
    <td></td>
<td><input type="submit" name="sbt" value="update" /></td>
</pre>
</form>


</table>

                </form>
      </div>
    </div>

  </div>
</body>
