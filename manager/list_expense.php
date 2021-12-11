<?php
if(!isset($_COOKIE['loggedinuser']))
{
  header("Location:login.php");
}
if(isset($_POST['logout']))
{
  setcookie("loggedinuser","",time()-60);
  header("Location:login.php");
}
require_once 'database.php';

function getAllExpense()
	{
		$query = "SELECT * FROM expenses";
		$expense = get($query);
		return $expense;
	}

$expenses = getAllExpense();

 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Estimated Expenses </title>
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
  <?php
  require_once 'header.php';
  ?>
<center>
	<table border=1px style ="border-collapse: collapse; border-color: black;">
		<tr>
			<th> ID </th>
			<th> WEBSITE COST </th>
			<th> AIRCRFT COST </th>
			<th> CUSTOMER SERVICE COST </th>
			<th> STAFFS' COST </th>
			<th> COUNTER COST </th>
			<th> TRANSPORT COST </th>
			<th> OPERATIONAL COST </th>
			<th> OTHERS MAINTENANCE COST </th>
			<th> Actiion </th>
		</tr>

	<?php
		foreach($expenses as $expense)
		{
			echo "<tr>";
			echo "<td>"."&nbsp;&nbsp;".$expense['id']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$expense['website_cost']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$expense['aircraft_cost']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$expense['customer_service_cost']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$expense['staff_cost']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$expense['counter_cost']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$expense['transport_cost']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$expense['operational_cost']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$expense['others_maintenance_cost']."&nbsp;&nbsp;"."</td>";
			echo "<td><a href='edit_expense.php?id=".$expense['id']."'>"."&nbsp;&nbsp;"."EDIT"."&nbsp;&nbsp;"."</a></td>";
			echo "</tr>";
		}
	 ?>
	 	</table>
	 </center>
</body>
</html>
