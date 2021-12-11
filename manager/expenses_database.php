<?php
	session_start();

	require_once 'database.php';

	if(isset($_GET['req']) && $_GET['req'] == 'add_exp')
	{
		insertExpense();
	}

	function insertExpense()
	{
		$website_cost=$_SESSION['website_cost'];
		$aircraft_cost=$_SESSION['aircraft_cost'];
		$customer_service_cost=$_SESSION['customer_service_cost'];
		$staff_cost=$_SESSION['staff_cost'];
		$counter_cost=$_SESSION['counter_cost'];
		$transport_cost=$_SESSION['transport_cost'];
		$operational_cost=$_SESSION['operational_cost'];
		$others_maintenance_cost=$_SESSION['others_maintenance_cost'];

		$query2 = "INSERT INTO expenses VALUES(NULL,'$website_cost','$aircraft_cost','$customer_service_cost','$staff_cost','$counter_cost','$transport_cost','$operational_cost','$others_maintenance_cost')";
		execute($query2);
		header("Location:list_expense.php");
	}
?>
