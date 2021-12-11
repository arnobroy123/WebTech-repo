<?php
require_once ('operation_database.php');
deleteOperation($_GET['id']);
header("Location:list_operation.php");

 ?>
