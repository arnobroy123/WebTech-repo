<!DOCTYPE html>
<html lang="en">

<head>
    <title>Change/Upload Photo</title>
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
            <h4> Upload profile photo </h4><br><br>
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
                              <a class="nav-link" href="addAgent.php">Add New Airport Agent</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="managers.php">Reserve Ticket</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="agents.php">Purchage Ticket</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="customers.php">Customer List</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="">Make Check-ins</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="sold.php">Add Luggage</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="">Baggage Service Token</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="flights.php">Flight Information</a>
                          <li class="nav-item">
                              <a class="nav-link" href="">Boarding Pass</a>
                          </li>
                          </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logoutAgent.php">Log Out</a>
                        </li>
                        </ul>
                    </div>
                </nav>

<?php
session_start();
if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){?>
	<form action="upload.php" method="post" enctype="multipart/form-data" name="mfm"><pre><br>
	Select image to upload : <input type="file" name="fileToUpload"><br>
	<input type="submit" value="Upload File" name="sbt"></pre>
</form>
<?php
}
else{
	header("Location:logout.php");
}
?>
<table>

</table>

                </form>
      </div>
    </div>

  </div>
</body>
