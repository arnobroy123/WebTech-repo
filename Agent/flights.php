<?php
$cred=array();

$sql="SELECT * FROM `flight` WHERE 1";
	$conn = mysqli_connect("localhost", "root", "","cred");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$c=mysqli_affected_rows($conn);
$flag=0;
$result = $conn->query($sql);
session_start();
if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){

		$data=array();


		$conn = mysqli_connect("localhost", "root", "","cred");
		$sql="select * from flight where 1";

		$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
		while($row = mysqli_fetch_assoc($result)) {

            $temp["Flight ID"]=$row["Flight ID"];
			$temp["From"]=$row["Source"];
			$temp["To"]=$row["Destination"];
			$temp["Date"]=$row["Date"];
			$temp["Departure"]=$row["Departure"];
			$temp["Price"]=$row["Price"];
     		$data[]=$temp;

        }
    }

?>

<html lang="en">

<head>
    <title>Available Flights</title>
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
            <h4>Available Flights</h4><br><br>
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
																	<a class="nav-link" href="addagent.php">Add New Airport Agent</a>
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
																	<a class="nav-link" href="">Flight Information</a>
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
<style>
table, th, td {
  border: 3px solid black;
}
table.center {
  margin-left: auto;
  margin-right: auto;
}
</style>
<table id="myTable" class="Center" width="60%">

        <tr >
          <th>Flight ID</th>
          <th>From</th>
          <th>To</th>
		  <th>Date</th>
		  <th>Departure</th>
          <th>Price</th>

        </tr>

        <?php
          foreach($data as $v){
            ?>
              <tr>
              <tr class="Flight_row">
              <td align="center"><?php echo $v["Flight ID"];?></a</span></td>
              <td align="center"><?php echo $v["From"];?></span></td>
              <td align="center"><?php echo $v["To"];?></span></td>
              <td align="center"><?php echo $v["Date"];?></span></td>
              <td align="center"><?php echo $v["Departure"];?></span></td>
              <td align="center"><?php echo $v["Price"];?></span></td>

              </tr>

        <?php
            }

        ?>

      </table>
      </div>

      <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

            </div>
            <div class="jumbotron text-center" style="margin-bottom:0">
  Quick Search :

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by ID" title="Type ID"><br>

</div>
        </div>

</body>

</html>
