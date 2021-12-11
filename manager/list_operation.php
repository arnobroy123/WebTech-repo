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
    include_once "operation_database.php";
    $operations = getAllOperation();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Operation List</title>
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
	<table border=1px style = " border-collapse: collapse; border-color: black;">
		<tr>
			<th> ID </th>
			<th> FIRST NAME </th>
			<th> LAST NAME </th>
			<th> EMAIL </th>
			<th> PHONE NO </th>
			<th> GENDER </th>
			<th> BLOOD TYPE </th>
      <th> OPERATIONAL FIELD </th>
			<th colspan="2">ACTION</th>
		</tr>
	<?php
		foreach($operations as $operation)
		{
			echo "<tr>";
			echo "<td>"."&nbsp;&nbsp;".$operation['id']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$operation['first_name']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$operation['last_name']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$operation['email']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$operation['phone']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$operation['gender']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$operation['blood_group']."&nbsp;&nbsp;"."</td>";
      echo "<td>"."&nbsp;&nbsp;".$operation['operational_field']."&nbsp;&nbsp;"."</td>";
			echo "<td><a href='edit_operation.php?id=".$operation['id']."'>"."&nbsp;&nbsp;"."EDIT"."&nbsp;&nbsp;"."</a></td>";
			echo "<td><a href='remove_operation.php?id=".$operation['id']."'>"."&nbsp;&nbsp;"."REMOVE"."&nbsp;&nbsp;"."</a></td>";
			echo "</tr>";
		}
	 ?>
	 	</table>
	 </center>
</body>
</html>
