

<?php
	include('../conn.php');
	
	
	$id=$_GET['id'];
	
	$serialNo=$_POST['serialNo'];
	$productType=$_POST['productType'];
	$brand=$_POST['brand'];
	$specification= $_POST['specification'];
$price= $_POST['price'];



	mysqli_query($mysqli,"update products set serialNo='$serialNo',productType='$productType',brand='$brand',specification='$specification',price='$price' where imageId='$id'");
	header('location:adminedit.php');

?>







