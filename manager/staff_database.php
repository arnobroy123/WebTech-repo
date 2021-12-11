<?php
	session_start();

	require_once 'database.php';

	if(isset($_GET['req']) && $_GET['req'] == 'add_Staff')
	{
		insertStaff();
	}

	elseif(isset($_POST['edit_staff']))
	{
		editStaff();
	}

	function getStaff($id)
	{
		$query = "SELECT * FROM staff_information WHERE id=$id";
		$staff = get($query);
		return $staff[0];
	}

	function getAllStaff()
	{
		$query = "SELECT * FROM staff_information";
		$staffs = get($query);
		return $staffs;
	}

	function deleteStaff($id)
	{
		$query = "DELETE  FROM staff_information WHERE id=$id";
		$staff = get($query);
		return $staff[0];
	}

	function insertStaff()
	{
		$first_name=$_SESSION['f_name'];
        $last_name=$_SESSION['l_name'];
        $email=$_SESSION['email'];
        $phone=$_SESSION['mobile_no'];
        $gender=$_SESSION['gender'];
        $blood_group=$_SESSION['blood'];
                        
        $query= "INSERT INTO staff_information VALUES(NULL,'$first_name','$last_name','$email','$phone','$gender','$blood_group')";
        execute($query);
        header("Location:list_staff.php");
	}

	function editStaff()
	{

		$id=$_POST['id'];
		$first_name=$_POST['f_name'];
        $last_name=$_POST['l_name'];
        $email=$_POST['email'];
        $phone=$_POST['mobile_no'];
        $gender=$_POST['gender'];
        $blood_group=$_POST['blood'];
                        
        $query2 = "UPDATE staff_information SET  first_name='$first_name',last_name='$last_name',email='$email',phone='$phone',gender='$gender',blood_group='$blood_group' WHERE id=$id";
        execute($query2);
        echo $query2;
        header("Location:list_staff.php");
	}
?>