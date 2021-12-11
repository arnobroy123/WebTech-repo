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
    require_once ('operation_database.php');

    $o_id = $_GET['id'];

    $operation = getOperation($o_id);
 ?>

  <!DOCTYPE html>
<html>
<head>
	<title>Edit Operation</title>
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
	<form method="post" action="operation_database.php">
		<center>
		<table>
			<tr>
				<td>
					<label>First Name</label><br>
					<input type="text" name="f_name" placeholder="Enter the first name" value="<?php echo $operation['first_name'] ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label>Last Name</label><br>
					<input type="text" name="l_name" placeholder="Enter the last name" value="<?php echo $operation['last_name'] ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label>Email</label><br>
					<input type="email" name="email" placeholder="Enter the Email" value="<?php echo $operation['email']?>">

				</td>
			</tr>
			<tr>
				<td>
					<label>Phone Number</label><br>
					<input type="text" name="mobile_no" placeholder="Enter the Phone number" value="<?php echo $operation['phone']?>">
				</td>
			</tr>
			<tr>
				<td>
					<label>Gender</label><br>
                    <select  name="gender">
                    <option selected value="<?php echo $operation['gender']?>"><?php echo $operation['gender']?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                    </select>
				</td>
			</tr>
			<tr>
				<td>
					<label>Blood Type</label><br>
                        <select  name="blood">
                        <option selected value="<?php echo $operation['blood_group']?>"><?php echo $operation['blood_group']?></option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        </select>
				</td>
			</tr>
      <tr>
        <td>
          <label>Operational Field</label><br>
          <input type="text" name="operation" value="<?php echo $operation['operational_field']?>">
        </td>
      </tr>
			<input type="hidden" name="id"  value="<?php echo $operation['id']?>">
			<tr>
				<td>
					<input type="submit" name="edit_operation" value="Update">
				</td>
			</tr>
		</table>
		</center>

	</form>

</body>
</html>
