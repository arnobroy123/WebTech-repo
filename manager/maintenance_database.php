<?php
	session_start();

	require_once 'database.php';

	if(isset($_POST['submit']))
	{
		insertMaintenance();
	}

	elseif(isset($_POST['edit_maintenance']))
	{
		editMaintenance();
	}

	function getMaintenance($id)
	{
		$query = "SELECT * FROM maintenance_personnel WHERE id=$id";
		$maintenance = get($query);
		return $maintenance[0];
	}

	function getAllMaintenance()
	{
		$query = "SELECT * FROM maintenance_personnel";
		$maintenances = get($query);
		return $maintenances;
	}

	function deleteMaintenance($id)
	{
		$query = "DELETE  FROM maintenance_personnel WHERE id=$id";
		$maintenance = get($query);
		return $maintenance[0];
	}

	function insertMaintenance()
	{
				$first_name=$_POST['f_name'];
        $last_name=$_POST['l_name'];
        $email=$_POST['email'];
        $phone=$_POST['mobile_no'];
        $gender=$_POST['gender'];
        $blood_group=$_POST['blood'];
				$maintenance_field=$_POST['maintenance'];

        $query= "INSERT INTO maintenance_personnel VALUES(NULL,'$first_name','$last_name','$email','$phone','$gender','$blood_group','$maintenance_field')";
        execute($query);
        header("Location:list_maintenance.php");
	}

	function editMaintenance()
	{

				$id=$_POST['id'];
				$first_name=$_POST['f_name'];
        $last_name=$_POST['l_name'];
        $email=$_POST['email'];
        $phone=$_POST['mobile_no'];
        $gender=$_POST['gender'];
        $blood_group=$_POST['blood'];
				$maintenance_field=$_SESSION['maintenance'];

        $query2 = "UPDATE maintenance_personnel SET  first_name='$first_name',last_name='$last_name',email='$email',phone='$phone',gender='$gender',blood_group='$blood_group',maintenance_field='$maintenance_field' WHERE id=$id";
        execute($query2);
        echo $query2;
        header("Location:list_maintenance.php");
	}
?>
