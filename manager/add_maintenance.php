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

    // if(!isset($_SESSION))
    // {
    //     session_start();
    // }
    //
    // $has_error=false;
    // $err_f_name="";
    // $f_name="";
    // $err_l_name="";
    // $l_name="";
    // $err_mobile_no="";
    // $mobile_no="";
    // $err_email="";
    // $email="";
    // $err_blood="";
    // $blood="";
    // $err_gender="";
    // $gender="";
    // $maintenance="";
    // $err_maintenance="";
    //
    // if(isset($_POST['submit']))
    //     {
    //         if(empty($_POST['f_name']))
    //         {
    //             $err_f_name="First Name Required";
    //             $has_error=true;
    //         }
    //         else
    //         {
    //             $f_name=htmlspecialchars($_POST['f_name']);
    //                 $_SESSION['f_name'] = $f_name;
    //         }
    //         if(empty($_POST['l_name']))
    //         {
    //             $err_l_name="Last Name Required";
    //             $has_error=true;
    //         }
    //         else
    //         {
    //             $l_name=htmlspecialchars($_POST['l_name']);
    //             $_SESSION['l_name'] = $l_name;
    //         }
    //         if(empty($_POST['blood']))
    //         {
    //             $err_blood ="Please Select Blood";
    //             $has_error=true;
    //         }
    //         else
    //         {
    //             $blood=htmlspecialchars($_POST['blood']);
    //             $_SESSION['blood'] = $blood;
    //         }
    //         if(empty($_POST['gender']))
    //         {
    //             $err_gender ="Please Select Gender";
    //             $has_error=true;
    //         }
    //         else
    //         {
    //             $gender=htmlspecialchars($_POST['gender']);
    //             $_SESSION['gender'] = $gender;
    //         }
    //     	if(empty($_POST['mobile_no']))
    //         {
    //             $err_mobile_no="Mobile No Required";
    //             $has_error=true;
    //         }
    //         else
    //         {
    //         	$mobile_no=htmlspecialchars($_POST['mobile_no']);
    //         	$_SESSION['mobile_no'] = $mobile_no;
    //         }
    //         if(empty($_POST['email']))
    //         {
    //             $err_email="Email Required";
    //             $has_error=true;
    //         }
    //         else
    //         {
    //             $email=htmlspecialchars($_POST['email']);
    //             $_SESSION['email'] = $email;
    //         }
    //         if(empty($_POST['maintenance']))
    //         {
    //             $err_maintenance="Field Required";
    //             $has_error=true;
    //         }
    //         else
    //         {
    //             $maintenance=htmlspecialchars($_POST['maintenance']);
    //             $_SESSION['maintenance'] = $maintenance;
    //         }
    //         if(!$has_error)
    //         {
    //        	header('Location:maintenance_database.php?req=add_main');
    //         }
		//}

?>
 <!DOCTYPE html>
<html>
<head>
	<title>Add Maintenance</title>
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
		function validate_form()
		{

			var valid = true;
			document.getElementById("err_f_name").innerHTML = "";
			var f_name=document.forms["myForm"]["f_name"].value;

      document.getElementById("err_l_name").innerHTML = "";
			var l_name=document.forms["myForm"]["l_name"].value;

			document.getElementById("err_email").innerHTML = "";
			var email=document.forms["myForm"]["email"].value;

      document.getElementById("err_mobile_no").innerHTML = "";
      var mobile_no=document.forms["myForm"]["mobile_no"].value;

      document.getElementById("err_gender").innerHTML = "";
      var gender=document.forms["myForm"]["gender"].value;

      document.getElementById("err_blood").innerHTML = "";
      var blood=document.forms["myForm"]["blood"].value;

      document.getElementById("err_maintenance").innerHTML = "";
      var maintenance=document.forms["myForm"]["maintenance"].value;

      if(f_name == "" || f_name == null)
			{
				document.getElementById("err_f_name").innerHTML="Required";
				valid = false;
			}
      if(l_name == "" || l_name == null)
			{
				document.getElementById("err_l_name").innerHTML="Required";
				valid = false;
			}
			if(mobile_no == "" || mobile_no == null)
			{

				document.getElementById("err_mobile_no").innerHTML="Required";
				valid = false;
			}
			if(email == "" || email == null)
			{

				document.getElementById("err_email").innerHTML="Required";
				valid = false;
			}
      if(gender == "" || gender == null)
			{

				document.getElementById("err_gender").innerHTML="Required";
				valid = false;
			}
			if(blood == "" || blood == null)
			{

				document.getElementById("err_blood").innerHTML="Required";
				valid = false;
			}
      if(maintenance == "" || maintenance == null)
			{

				document.getElementById("err_maintenance").innerHTML="Required";
				valid = false;
			}

			return valid;
		}
	</script>
</head>
<body>
  <?php
  require_once 'header.php';
  ?>
	<form method="post" onsubmit="return validate_form()" action="maintenance_database.php" name="myForm">
		<center>
		<table>
			<tr>
				<td>
					<label>First Name</label><br>
					<input type="text" name="f_name" id="f_name" placeholder="Enter the first name">
					<p style="color: red;" id="err_f_name"> </p>

				</td>
			</tr>
			<tr>
				<td>
					<label>Last Name</label><br>
					<input type="text" name="l_name" id="l_name" placeholder="Enter the last name">
					<p style="color: red;" id="err_l_name"> </p>


				</td>
			</tr>
			<tr>
				<td>
					<label>Email</label><br>
					<input type="email" name="email" id="email" placeholder="Enter the Email"><br>
					<p style="color: red;" id="err_email"> </p>

				</td>
			</tr>
			<tr>
				<td>
					<label>Phone Number</label><br>
					<input type="text" name="mobile_no" id="mobile_no" placeholder="Enter the Phone number"><br>
						<p style="color: red;" id="err_mobile_no"> </p>

				</td>
			</tr>
			<tr>
				<td>
					<label>Gender</label><br>
                    <select  name="gender" id="gender">
                    <option selected disabled>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                    </select><br>
					<p style="color: red;" id="err_gender"> </p>

				</td>
			</tr>
			<tr>
				<td>
					<label>Blood Type</label><br>
                        <select  name="blood" id="blood">
                        <option selected disabled>Select Blood</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        </select>
					<p style="color: red;" id="err_blood"> </p>
				</td>
			</tr>
      <tr>
        <td>
          <label>Maintenance Field</label><br>
          <input type="text" name="maintenance"  id="maintenance" placeholder="Enter the Name of Maintenance"><br>
          <p style="color: red;" id="err_maintenance"> </p>

        </td>
      </tr>
			<tr>
				<td>
					<input type="submit" id="submit" name="submit" value="Submit">
			</tr>
		</table>
		</center>

	</form>

</body>
</html>
