<?php

  require "db/dbh.inc.php";

  $pnameError = $frmError = $phoneErr = $toError = $fnoError = $btokenError = $billErr = "";
  $pname = $from = $to = $aPhone = $flightno = $seatno = $btoken = $bill = "";
  $errors = 0;
  $purchaseCompleted = "";


  if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(empty($_POST['pname'])){
      $pnameError = "Name cannot be empty!";
      $errors = 1;
    }else{
      $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    }

    if(empty($_POST['from'])){
      $frmError = "Mandatory field!";
      $errors = 1;
    }else{
      $from = mysqli_real_escape_string($conn, $_POST['from']);
    }

    if(empty($_POST['to'])){
      $toError = "Must mention destination!";
      $errors = 1;
    }else{
      $to = mysqli_real_escape_string($conn, $_POST['to']);
    }

    if(empty($_POST['aPhone'])){
      $phoneErr = "Phone Cannot be empty!";
      $errors = 1;
    }else{
      $aPhone = mysqli_real_escape_string($conn, $_POST['phone']);
    }

    $seatno = mysqli_real_escape_string($conn, $_POST['seatno']);
    $btoken = mysqli_real_escape_string($conn, $_POST['btoken']);
    $flightno = mysqli_real_escape_string($conn,$_POST['flightno']);
    $bill = mysqli_real_escape_string($conn,$_POST['bill']);



    if($errors != 1){

      $sqlUers = "select passenger_name from purchase where passenger_name = '$pname'";
      $results = mysqli_query($conn, $sqlUers);

      $rowCount = mysqli_num_rows($results);

      if($rowCount > 0){
        $userErr = "User already exists!";
      }
      else{
        $sqlUserInsert = "insert into purchase (passenger_name, phone, source, destination, flight_no, seat_no, baggage_token, bill)
        values ('$pname', '$aPhone', '$from', '$to', '$flightno','$seatno',' $btoken', '$bill');";

        mysqli_query($conn, $sqlUserInsert);

        $purchaseCompleted = "Ticket Purchase Succesful";
      }
    }
  }

?>

<form action="purchaseTicket.php" method="post">
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Ticket </title>
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
            <h4> Purchase Your Ticket </h4><br><br>
            <h3 style="color:green;"><?php echo $purchaseCompleted; ?></h3>
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
                                    <a class="nav-link" href="customers.php">Customer List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">Make Check-ins</a>
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

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <table align="center">
          <!-- VALIDATE THE FOLLOWING COMMENTED OUT FIELDS AND RETAIN THEIR DATA -->
          <tr>
            <td> <label>Passenger Name : </label> </td>
            <td> <input type="text" name="pname" value=""> <span style="color:red;"><?php echo $pnameError; ?></span> </td>
          </tr>
          <tr>
            <td> <label>Phone: </label> </td>
            <td> <input type="number" name="phone" value="" min="1" required> <?php echo $phoneErr; ?></span></td>
          </tr>
          <tr>
            <td> <label>From : </label> </td>
            <td> <input type="text" name="from" value=""> <span style="color:red;"><?php echo $frmError; ?></span> </td>
          </tr>

          <tr>
            <td> <label>To: </label> </td>
            <td> <input type="text" name="to" value="" > <span style="color:red;"><?php echo $toError; ?></span> </td>
          </tr>
          <tr>
            <td> <label>Flight No: </label> </td>
            <td> <input type="text" name="flightno" value="" required> <span style="color:red;"><?php echo $fnoError; ?></span> </td>
          </tr>
          <tr>
            <td> <label>Seat No: </label> </td>
            <td> <input type="text" name="seatno" value="" required></td>
          </tr>
          <tr>
            <td> <label>Baggage Token: </label> </td>
            <td> <input type="text" name="btoken" value="" required> <span style="color:red;"><?php echo $btokenError; ?></span> </td>
          </tr>
          <tr>
            <td> <label>Bill: </label> </td>
            <td> <input type="number" name="bill" value="" required> <span style="color:red;"><?php echo $billErr; ?></span> </td>
          </tr>
          <tr>
            <td> <br><input type="submit" name="btn_purchase" value="Purchase"> </td>
          </tr>
        </table>
      </form>
