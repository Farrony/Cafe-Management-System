<?php 
 if (isset($_GET['menu_id'])) {

 	include "include/connectdb.php";
 	$delete_id= $_GET['menu_id'];

 	$delete_Query="DELETE FROM menu WHERE id=$delete_id";

 	if ($conn->query($delete_Query)==true) {
 		// echo "Data deleted";
 		header("Location:update2.php");
 	}else{
 		die($conn->error);
 	}
 }

 ?>