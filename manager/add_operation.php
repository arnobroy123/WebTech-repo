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

    if(!isset($_SESSION))
    {
        session_start();
    }
    ?>
    <?php
    $has_error=false;
    $err_f_name="";
    $f_name="";
    $err_l_name="";
    $l_name="";
    $err_mobile_no="";
    $mobile_no="";
    $err_email="";
    $email="";
    $err_blood="";
    $blood="";
    $err_gender="";
    $gender="";
    $operation="";
    $err_operation="";

    if(isset($_POST['submit']))
        {
            if(empty($_POST['f_name']))
            {
                $err_f_name="First Name Required";
                $has_error=true;
            }
            else
            {
                $f_name=htmlspecialchars($_POST['f_name']);
                    $_SESSION['f_name'] = $f_name;
            }
            if(empty($_POST['l_name']))
            {
                $err_l_name="Last Name Required";
                $has_error=true;
            }
            else
            {
                $l_name=htmlspecialchars($_POST['l_name']);
                $_SESSION['l_name'] = $l_name;
            }
            if(empty($_POST['blood']))
            {
                $err_blood ="Please Select Blood";
                $has_error=true;
            }
            else
            {
                $blood=htmlspecialchars($_POST['blood']);
                $_SESSION['blood'] = $blood;
            }
            if(empty($_POST['gender']))
            {
                $err_gender ="Please Select Gender";
                $has_error=true;
            }
            else
            {
                $gender=htmlspecialchars($_POST['gender']);
                $_SESSION['gender'] = $gender;
            }
        	if(empty($_POST['mobile_no']))
            {
                $err_mobile_no="Mobile No Required";
                $has_error=true;
            }
            else
            {
            	$mobile_no=htmlspecialchars($_POST['mobile_no']);
            	$_SESSION['mobile_no'] = $mobile_no;
            }
            if(empty($_POST['email']))
            {
                $err_email="Email Required";
                $has_error=true;
            }
            else
            {
                $email=htmlspecialchars($_POST['email']);
                $_SESSION['email'] = $email;
            }
            if(empty($_POST['operation']))
            {
                $err_operation="Field Required";
                $has_error=true;
            }
            else
            {
                $operation=htmlspecialchars($_POST['operation']);
                $_SESSION['operation'] = $operation;
            }
            if(!$has_error)
            {
           	header('Location:operation_database.php?req=add_ope');
            }
		}

?>
 <!DOCTYPE html>
<html>
<head>
	<title>Add Operation</title>
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
					<label>First Name</label><br>
					<input type="text" name="f_name" placeholder="Enter the first name" value="<?php echo $f_name; ?>"><br>
					<span style="color:red"><?php echo $err_f_name ?></span>

				</td>
			</tr>
			<tr>
				<td>
					<label>Last Name</label><br>
					<input type="text" name="l_name" placeholder="Enter the last name" value="<?php echo $l_name; ?>"><br>
					<span style="color:red"><?php echo $err_l_name ?></span>


				</td>
			</tr>
			<tr>
				<td>
					<label>Email</label><br>
					<input type="email" name="email" placeholder="Enter the Email" value="<?php echo $email; ?>"><br>
					<span style="color:red"><?php echo $err_email ?></span>

				</td>
			</tr>
			<tr>
				<td>
					<label>Phone Number</label><br>
					<input type="text" name="mobile_no" placeholder="Enter the Phone number" value="<?php echo $mobile_no; ?>"><br>
					<span style="color:red"><?php echo $err_mobile_no ?></span>

				</td>
			</tr>
			<tr>
				<td>
					<label>Gender</label><br>
                    <select  name="gender">
                    <option selected disabled value="NULL">Select Gender</option>
                    <option <?php if($gender == 'Male') echo 'selected'; ?> value="Male">Male</option>
                    <option <?php if($gender == 'Female') echo 'selected'; ?> value="Female">Female</option>
                    <option <?php if($gender == 'Other') echo 'selected'; ?> value="Other">Other</option>
                    </select><br>
					<span style="color:red"><?php echo $err_gender ?></span>

				</td>
			</tr>
			<tr>
				<td>
					<label>Blood Type</label><br>
                        <select  name="blood">
                        <option selected disabled value="NULL">Select Blood</option>
                        <option <?php if($blood == 'A+') echo 'selected'; ?> value="A+">A+</option>
                        <option <?php if($blood == 'A-') echo 'selected'; ?> value="A-">A-</option>
                        <option <?php if($blood == 'B+') echo 'selected'; ?> value="B">B+</option>
                        <option <?php if($blood == 'B-') echo 'selected'; ?> value="B-">B-</option>
                        <option <?php if($blood == 'AB+') echo 'selected'; ?> value="AB+">AB+</option>
                        <option <?php if($blood == 'AB-') echo 'selected'; ?> value="AB-">AB-</option>
                        <option <?php if($blood == 'O+') echo 'selected'; ?> value="O+">O+</option>
                        <option <?php if($blood == 'O-') echo 'selected'; ?> value="O-">O-</option>
                        </select><br>
					<span style="color:red"><?php echo $err_blood ?></span>
				</td>
			</tr>
      <tr>
        <td>
          <label>Operational Field</label><br>
          <input type="text" name="operation" placeholder="Enter the Name of Operational" value="<?php echo $operation; ?>"><br>
          <span style="color:red"><?php echo $err_operation ?></span>

        </td>
      </tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="Submit">
			</tr>
		</table>
		</center>

	</form>

</body>
</html>
