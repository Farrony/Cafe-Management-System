<?php 
 if (isset($_GET['employee_id'])) {

 	include "include/connectdb.php";
 	$delete_id= $_GET['employee_id'];

 	$delete_Query="DELETE FROM employee WHERE id=$delete_id";

 	if ($conn->query($delete_Query)==true) {
 		// echo "Data deleted";
 		header("Location:update.php");
 	}else{
 		die($conn->error);
 	}
 }

 ?>