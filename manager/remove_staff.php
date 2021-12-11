<?php 
require_once ('staff_database.php');
deleteStaff($_GET['id']);
header("Location:list_staff.php");

 ?>