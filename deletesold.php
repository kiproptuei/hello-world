<?php
	include('../conn.php');
	$id=$_GET['id'];
	mysqli_query($mysqli,"delete from product_detail where imageId='$id'");
	header('location:solditems.php');

?>