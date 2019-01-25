<?php
	include('../conn.php');
	$id=$_GET['id'];
	mysqli_query($mysqli,"delete from products where imageId='$id'");
	header('location:adminedit.php');

?>