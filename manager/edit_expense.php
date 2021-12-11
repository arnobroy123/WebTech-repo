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

if(isset($_POST['edit_expense']))
{
	editExpense();
}

function getExpense($id)
{
		$query = "SELECT * FROM expenses WHERE id=$id";
		$expense = get($query);
		return $expense[0];
}

$e_id = $_GET['id'];
$expense = getExpense($e_id);

function editExpense()
{
			$id=$_POST['id'];
			$website_cost=$_POST['website_cost'];
			$aircraft_cost=$_POST['aircraft_cost'];
			$customer_service_cost=$_POST['customer_service_cost'];
			$staff_cost=$_POST['staff_cost'];
			$counter_cost=$_POST['counter_cost'];
			$transport_cost=$_POST['transport_cost'];
			$operational_cost=$_POST['operational_cost'];
			$others_maintenance_cost=$_POST['others_maintenance_cost'];

			$query2 = "UPDATE expenses SET  website_cost='$website_cost',aircraft_cost='$aircraft_cost',customer_service_cost='$customer_service_cost',staff_cost='$staff_cost',counter_cost='$counter_cost',transport_cost='$transport_cost',operational_cost='$operational_cost',others_maintenance_cost='$others_maintenance_cost' WHERE id=$id";
			execute($query2);
			header("Location:list_expense.php");
}

 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Edit Estimated Expenses </title>
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
	<form method="post" action="">
		<center>
		<table>
			<tr>
				<td>
					<label>Website Cost</label><br>
					<input type="text" name="website_cost"  value="<?php echo $expense['website_cost'] ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label>Aircraft Cost</label><br>
					<input type="text" name="aircraft_cost"  value="<?php echo $expense['aircraft_cost'] ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label>Customer Service Cost</label><br>
					<input type="text" name="customer_service_cost"  value="<?php echo $expense['customer_service_cost']?>">

				</td>
			</tr>
			<tr>
				<td>
					<label>Staff Cost</label><br>
					<input type="text" name="staff_cost"  value="<?php echo $expense['staff_cost']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label>Counter Cost</label><br>
					<input type="text" name="counter_cost" value="<?php echo $expense['counter_cost']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label>Transport Cost</label><br>
					<input type="text" name="transport_cost" value="<?php echo $expense['transport_cost']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label>Operational Cost</label><br>
					<input type="text" name="operational_cost" value="<?php echo $expense['operational_cost']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label>Others Maintenance Cost</label><br>
					<input type="text" name="others_maintenance_cost" value="<?php echo $expense['others_maintenance_cost']?>">
				</td>
			</tr>
			<input type="hidden" name="id"  value="<?php echo $expense['id']?>">
			<tr>
				<td>
					<input type="submit" name="edit_expense" value="Update">
				</td>
			</tr>
		</table>
		</center>

	</form>
</body>
</html>
