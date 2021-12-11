<?php
	$serverName="localhost";
	$userName="root";
	$password="";
	$dbName="airline";

	$key=$_GET['sk'];
	$query="SELECT * FROM staff_information WHERE first_name LIKE '%$key%' OR last_name LIKE '%$key%' OR email LIKE '%$key%'";
	$conn = mysqli_connect( $serverName, $userName, $password, $dbName);
	$result=mysqli_query($conn,$query);
	echo "<table>";
	while($staff = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
		    echo '<td><a href="print_staff.php?id='.$staff["id"].'" class="btn">'.$staff["first_name"].' '.$staff["last_name"].'</a></td>';
		    echo '<td><a href="print_staff.php?id='.$staff["id"].'" class="btn">'.$staff["email"].'</a></td>';
		echo "</tr>";
	}
    echo "</table>";
?>
