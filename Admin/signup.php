<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){

$dotPos=strpos($_REQUEST["email"],".");
$atPos=strpos($_REQUEST["email"],"@");
if(strlen($_REQUEST["uname"])==0 || strlen($_REQUEST["pass"])==0 || strlen($_REQUEST["email"])==0){
	echo "All fields are mandatory!";
}
else if ($_REQUEST["pass"]!=$_REQUEST["confirmPass"]){
	echo "Passwords must match";
}
else if($atPos>$dotPos){
	echo "Invalid Email";
}
else{

	$sql="insert into user(`uname`, `firstname`, `lastname`, `password`, `email`, `phone`,`type`) values('".$_REQUEST["uname"]."','".$_REQUEST["firstname"]."','".$_REQUEST["lastname"]."','".$_REQUEST["pass"]."','".$_REQUEST["email"]."','".$_REQUEST["phone"]."', 'admin')";
	$conn = mysqli_connect("localhost", "root", "","cred");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$c=mysqli_affected_rows($conn);
	echo "<br/>";
echo " Sign Up Completed, Now you can log in using your uname and password";
header("Location:login.php");

}
}

?>



<form action="signup.php" name="fm" method="post">

<html lang="en">

<head>
    <title>Sign Up</title>
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
            <p>Sign Up page</p>

            <ul class="nav justify-content-center">

                <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="home.html">Home Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </ul>
        </div>
        <div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">
<form>
        <!-- insert the page content here -->
<table>

<tr> 
  <td>First name : </td>
  <td> <input type="text" name="firstname"></td>
</tr> 
<tr> 
  <td> Last name : </td>
  <td><input type="text" name="lastname"></td>
</tr> 
<tr> 
  <td> User name : </td>
  <td><input type="text" name="uname" id="txt"></td>
</tr> 
<tr> 
  <td> Phone Number : </td>
  <td><input type="text" name="phone"></td>
</tr> 
<tr> 
  <td>Email : </td>
  <td><input type="email" id="email" name="email"></td>
</tr> 
<tr> 
  <td>Password : </td>
  <td><input type="password" name="pass"></td>
</tr> 
<tr> 
  <td> Confirm Password : </td>
  
  <td><input type="password" name="confirmPass"></td>
</tr> 
<tr> 
  <td><input type="submit" name="sbt" value="submit" /> </td>

