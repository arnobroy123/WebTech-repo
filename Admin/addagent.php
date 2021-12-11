<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){

$dotPos=strpos($_REQUEST["email"],".");
$atPos=strpos($_REQUEST["email"],"@");
if(strlen($_REQUEST["uname"])==0 || strlen($_REQUEST["pass"])==0 || strlen($_REQUEST["email"])==0){
	echo "All fields are mandatory!";
}
else if($_REQUEST["pass"]!=$_REQUEST["confirmPass"]){
	echo "Passwords must match";
}
else if($atPos>$dotPos){
	echo "Invalid Email";
}
else{

	$sql="insert into user(`uname`, `firstname`, `lastname`, `password`, `email`, `phone`,`type`) values('".$_REQUEST["uname"]."','".$_REQUEST["firstname"]."','".$_REQUEST["lastname"]."','".$_REQUEST["pass"]."','".$_REQUEST["email"]."','".$_REQUEST["phone"]."','agent')";
	$conn = mysqli_connect("localhost", "root", "","cred");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$c=mysqli_affected_rows($conn);
	echo "<br/>";
echo "New Agent Added!";
header("Location:adminhomepage.html");
}
}

?>

<form action="addagent.php" name="fm" method="post">
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Agent Account</title>
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
            <h4> Create Agent Account </h4><br><br>
            <ul class="nav justify-content-center">

                <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="adminhomepage.html">Back</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php">My Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="addmanager.php">Add New Airport Manager</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="managers.php">Airport Managers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="agents.php">Airport Agents</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="customers.php">Customers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="flights.php">Available Flights</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="sold.php">Sold tickets</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="addflight.php">Add New Flight</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="editflightinfo.php">Edit Flight Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </nav>
<form>

<table>
  
<tr>
  <td>First name : </td>
  <td><input type="text" name="firstname"></td>
</tr> 
<tr> 
  <td> Last name : </td>
  <td><input type="text" name="lastname"></td>
</tr> 
<tr> 
  <td> User name : </td>
  <td><input type="text" name="uname" id="txt"><span id="msg"></span></td>
</tr> 
<tr> 
  <td> Phone Number :</td>
  <td><input type="text" name="phone"></td>
</tr> 
<tr> 
  <td> Email : </td>
  <td> <input type="text" name="email"></td>
</tr> 
<tr> 
  <td> Password : </td>
  <td><input type="password" name="pass"></td>
</tr> 
<tr> 
  <td> Confirm Password : </td>
  <td><input type="password" name="confirmPass"></td>
</tr> 
<tr> 
  <td> <input type="submit" name="sbt" value="submit" /> </td>

