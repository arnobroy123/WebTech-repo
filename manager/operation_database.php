<?php
	session_start();

	require_once 'database.php';

	if(isset($_GET['req']) && $_GET['req'] == 'add_ope')
	{
		insertOperation();
	}

	elseif(isset($_POST['edit_operation']))
	{
		editOperation();
	}

	function getOperation($id)
	{
		$query = "SELECT * FROM operational_personnel WHERE id=$id";
		$operation = get($query);
		return $operation[0];
	}

	function getAllOperation()
	{
		$query = "SELECT * FROM operational_personnel";
		$operations = get($query);
		return $operations;
	}

	function deleteOperation($id)
	{
		$query = "DELETE  FROM operational_personnel WHERE id=$id";
		$operation = get($query);
		return $operation[0];
	}

	function insertOperation()
	{
				$first_name=$_SESSION['f_name'];
        $last_name=$_SESSION['l_name'];
        $email=$_SESSION['email'];
        $phone=$_SESSION['mobile_no'];
        $gender=$_SESSION['gender'];
        $blood_group=$_SESSION['blood'];
				$operational_field=$_SESSION['operation'];

        $query= "INSERT INTO operational_personnel VALUES(NULL,'$first_name','$last_name','$email','$phone','$gender','$blood_group','$operational_field')";
        execute($query);
        header("Location:list_operation.php");
	}

	function editOperation()
	{

				$id=$_POST['id'];
				$first_name=$_POST['f_name'];
        $last_name=$_POST['l_name'];
        $email=$_POST['email'];
        $phone=$_POST['mobile_no'];
        $gender=$_POST['gender'];
        $blood_group=$_POST['blood'];
				$operational_field=$_SESSION['operation'];

        $query2 = "UPDATE operational_personnel SET  first_name='$first_name',last_name='$last_name',email='$email',phone='$phone',gender='$gender',blood_group='$blood_group',operational_field='$operational_field' WHERE id=$id";
        execute($query2);
        echo $query2;
        header("Location:list_operation.php");
	}
?>
