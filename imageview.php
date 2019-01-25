<?php
  include "../conn.php";
if(isset($_GET['image_id'])){ 
$sql = mysqli_query($mysqli,"SELECT * FROM products WHERE ImageId=".$_GET['image_id']);
$row = mysqli_fetch_array($sql);
header("Content-type: " . $row["imageType"]);
echo $row["imageData"];
} 
mysqli_close($mysqli);
?>
