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
    $has_error=false;
    $website_cost="";
    $aircraft_cost="";
    $customer_service_cost="";
    $staff_cost="";
    $counter_cost="";
    $transport_cost="";
    $operational_cost="";
    $others_maintenance_cost="";
    $err_website_cost="";
    $err_aircraft_cost="";
    $err_customer_service_cost="";
    $err_staff_cost="";
    $err_counter_cost="";
    $err_transport_cost="";
    $err_operational_cost="";
    $err_others_maintenance_cost="";

    if(isset($_POST['submit']))
        {
            if(empty($_POST['website_cost']))
            {
                $err_website_cost="Required";
                $has_error=true;
            }
            else
            {
                $website_cost=htmlspecialchars($_POST['website_cost']);
                $_SESSION['website_cost'] = $website_cost;
            }
            if(empty($_POST['aircraft_cost']))
            {
                $err_aircraft_cost="Required";
                $has_error=true;
            }
            else
            {
                $aircraft_cost=htmlspecialchars($_POST['aircraft_cost']);
                $_SESSION['aircraft_cost'] = $aircraft_cost;
            }
            if(empty($_POST['customer_service_cost']))
            {
                $err_customer_service_cost ="Required";
                $has_error=true;
            }
            else
            {
                $customer_service_cost=htmlspecialchars($_POST['customer_service_cost']);
                $_SESSION['customer_service_cost'] = $customer_service_cost;
            }
            if(empty($_POST['staff_cost']))
            {
                $err_staff_cost ="Required";
                $has_error=true;
            }
            else
            {
                $staff_cost=htmlspecialchars($_POST['staff_cost']);
                $_SESSION['staff_cost'] = $staff_cost;
            }
        	if(empty($_POST['counter_cost']))
            {
                $err_counter_cost="Required";
                $has_error=true;
            }
            else
            {
            	$counter_cost=htmlspecialchars($_POST['counter_cost']);
            	$_SESSION['counter_cost'] = $counter_cost;
            }
            if(empty($_POST['transport_cost']))
            {
                $err_transport_cost="Required";
                $has_error=true;
            }
            else
            {
                $transport_cost=htmlspecialchars($_POST['transport_cost']);
                $_SESSION['transport_cost'] = $transport_cost;
            }
            if(empty($_POST['operational_cost']))
            {
                $err_operational_cost="Required";
                $has_error=true;
            }
            else
            {
                $operational_cost=htmlspecialchars($_POST['operational_cost']);
                $_SESSION['operational_cost'] = $operational_cost;
            }
            if(empty($_POST['others_maintenance_cost']))
            {
                $err_others_maintenance_cost="Required";
                $has_error=true;
            }
            else
            {
                $others_maintenance_cost=htmlspecialchars($_POST['others_maintenance_cost']);
                $_SESSION['others_maintenance_cost'] = $others_maintenance_cost;
            }
            if(!$has_error)
            {
           	header('Location:expenses_database.php?req=add_exp');
            }
		}

?>
 <!DOCTYPE html>
<html>
<head>
	<title>Add Expenses</title>
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
					<input type="text" name="website_cost"  value="<?php echo $website_cost; ?>"><br>
					<span style="color:red"><?php echo $err_website_cost ?></span>

				</td>
			</tr>
			<tr>
				<td>
          <label>Aircraft Cost</label><br>
          <input type="text" name="aircraft_cost"  value="<?php echo $aircraft_cost; ?>"><br>
					<span style="color:red"><?php echo $err_aircraft_cost ?></span>


				</td>
			</tr>
			<tr>
				<td>
          <label>Customer Service Cost</label><br>
					<input type="text" name="customer_service_cost"  value="<?php echo $customer_service_cost;?>"><br>
					<span style="color:red"><?php echo $err_customer_service_cost ?></span>

				</td>
			</tr>
			<tr>
				<td>
          <label>Staff Cost</label><br>
					<input type="text" name="staff_cost"  value="<?php echo $staff_cost;?>"><br>
					<span style="color:red"><?php echo $err_staff_cost ?></span>

				</td>
			</tr>
      <tr>
        <td>
          <label>Counter Cost</label><br>
					<input type="text" name="counter_cost" value="<?php echo $counter_cost; ?>"><br>
          <span style="color:red"><?php echo $err_counter_cost ?></span>
        </td>
      </tr>
      <tr>
				<td>
          <label>Transport Cost</label><br>
					<input type="text" name="transport_cost" value="<?php echo $transport_cost; ?>"><br>
					<span style="color:red"><?php echo $err_transport_cost ?></span>

				</td>
			</tr>
			<tr>
				<td>
          <label>Operational Cost</label><br>
					<input type="text" name="operational_cost" value="<?php echo $operational_cost; ?>"><br>
					<span style="color:red"><?php echo $err_operational_cost ?></span>

				</td>
			</tr>
      <tr>
        <td>
          <label>Others Maintenance Cost</label><br>
          <input type="text" name="others_maintenance_cost" value="<?php echo $others_maintenance_cost;?>"><br>
          <span style="color:red"><?php echo $err_others_maintenance_cost ?></span>
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
