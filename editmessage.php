<?php
session_start();
error_reporting( ~E_NOTICE ); 
	include('../conn.php');
	$email=$_GET['id'];
	$message=$_POST['message'];
$insert = mysqli_query($mysqli,"INSERT INTO messages(email,message) VALUES('$email','$message')");
if($insert)
{
	header("Location:messages.php");
}
else
{
	echo "not inserted";
}

?>
