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
    include_once "staff_database.php";
    $staffs = getAllStaff();

    $id= $_GET['id'];
  	$serverName="localhost";
  	$userName="root";
  	$password="";
  	$dbName="airline";
  	$conn = mysqli_connect($serverName, $userName,  $password, $dbName);

  	$query="SELECT * FROM staff_information WHERE id='$id'";
      $rs=mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Staff List</title>
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
  <script>
		function search()
		{
			http = new XMLHttpRequest();
			var search_word=document.getElementById("search_input").value;
			http.onreadystatechange=function()
			{
				if(http.readyState == 4 && http.status == 200)
				{
					document.getElementById("search_result").innerHTML=http.responseText;
				}
			}
			http.open("GET","search_staff.php?sk="+search_word,true);
		    http.send();
		}

	</script>
</head>
<body>
  <?php
  require_once 'header.php';
  ?>
  <label>SEARCH : </label>
  <input type="text" id="search_input" onkeyup="search()" placeholder="searching...">
  <div id="search_result">

  </div>
<center>
	<table border=1px style ="border-collapse: collapse; border-color: black;">
		<tr>
			<th> ID </th>
			<th> FIRST NAME </th>
			<th> LAST NAME </th>
			<th> EMAIL </th>
			<th> PHONE NO </th>
			<th> GENDER </th>
			<th> BLOOD TYPE </th>
			<th colspan="2">ACTION</th>
		</tr>

	<?php
		while($staff = mysqli_fetch_assoc($rs))
		{
			echo "<tr>";
			echo "<td>"."&nbsp;&nbsp;".$staff['id']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$staff['first_name']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$staff['last_name']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$staff['email']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$staff['phone']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$staff['gender']."&nbsp;&nbsp;"."</td>";
			echo "<td>"."&nbsp;&nbsp;".$staff['blood_group']."&nbsp;&nbsp;"."</td>";
			echo "<td><a href='edit_staff.php?id=".$staff['id']."'>"."&nbsp;&nbsp;"."EDIT"."&nbsp;&nbsp;"."</a></td>";
			echo "<td><a href='remove_staff.php?id=".$staff['id']."'>"."&nbsp;&nbsp;"."REMOVE"."&nbsp;&nbsp;"."</a></td>";
			echo "</tr>";
		}

	 ?>
	 	</table>
	 </center>
</body>
</html>
