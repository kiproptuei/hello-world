<?php
	include('../conn.php');
	$id=$_GET['id'];
	mysqli_query($mysqli,"delete from register where imageId='$id'");
	header('location:messages.php');

?>