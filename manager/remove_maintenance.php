<?php
require_once ('maintenance_database.php');
deleteMaintenance($_GET['id']);
header("Location:list_maintenance.php");

 ?>
