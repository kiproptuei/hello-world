<?php
include "../conn.php";
session_start();
error_reporting( ~E_NOTICE ); // avoid notice
if(isset($_POST['submit'])) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        


     $username=$_SESSION['username'];
        $brand=$_POST['brand'];
       $serial=$_POST['serialNo'];
       $serial = ($serial);
       $serialNo = ($serial);
       $productType=$_POST['productType'];
      $specification=$_POST['specification'];
      $price=$_POST['price'];
      $county=$_POST['county'];
      $status='onsale';
      $catsel = mysqli_query($mysqli,"SELECT * from categories where category_name='$brand'");
      $catnum = mysqli_num_rows($catsel);
      if($catnum<1)
      {
        $date = $_POST['days'];
        $catinsert = mysqli_query($mysqli,"INSERT INTO categories (category_name,perishable) VALUES('$brand','$date')");
        if($catinsert)
        {
          $date = $_POST['days'];
          $catsel2 = mysqli_query($mysqli,"SELECT * from categories where category_name='$brand'");
          $rowcat2 = mysqli_fetch_array($catsel2);
          $catid = $rowcat2['category_id'];
        }
      }
      else
      {
        $date = $_POST['days'];
        $rowcat = mysqli_fetch_array($catsel);
        $catid = $rowcat['category_id'];
      }
//        $description = $_POST['description'];
        $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
        $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
    $imgFile = $_FILES['userImage']['name'];
    $imgSize = $_FILES['userImage']['size'];
   
      if(empty($imgData)){
      $errMSG = "Please Select Image File.";
    }
    else

    {
      $upload_dir = 'images/'; // upload directory
  
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    
      // valid image extensions
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    
      // rename uploading image
      $userpic = rand(1000,1000000).".".$imgExt;
        
      // allow valid image file formats
      if(in_array($imgExt, $valid_extensions)){     
        // Check file size '5MB'
        if($imgSize < 5000000)
        {
          move_uploaded_file($_FILES['userImage']['tmp_name'],$upload_dir);
        }
        else{
          $errMSG = "Sorry, your file is too large.";
        }
      }
      else{
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    
      }
    }
   
      if(!isset($errMSG))
    {
      $image = $upload_dir.$_FILES['userImage']['name'];
  $sql="insert into products(category_id ,farmer_id,product_name,product_description,product_price,product_image,product_status,serial_number,sell_by) values('$catid', '0', '$productType','$specification','$price','$image','$status','$serialNo','$date')";
  $current_id = mysqli_query($mysqli,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error());
        if (isset($current_id)) 
      {
        $successMSG = "new record succesfully inserted ...you will be directed to login "; 
        header("refresh:0;addproduct.php"); // redirects image view page after 5 seconds.
      }
      else
      {
        $errMSG = "error while inserting....";
      }
    
    }
}}
?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Bootstrap Core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="../css/metisMenu.min.css" rel="stylesheet">

  <!-- DataTables CSS -->
  <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../css/startmin.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>

          <div id="wrapper" style="background-color: white">
        <!-- Navigation -->
        <nav class="navbar navbar-light navbar-fixed-top" style="background-color: green" role="navigation">
          <div class="navbar-header">
            <a class="navbar-brand" href="#" style="color:white">Mufa Farms</a>
          </div>

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="../index.php" class="active" style="color:white"><i class="fa fa-home fa-fw"></i> Home</a>
            </li>
            <li><a href="../contact.php" style="color:white;">Contact Us</a></li>
          
            <li><a href="../services.php" style="color:white;">services</a></li>
            <li><a href="../about.php" style="color:white;">About Us</a></li>
          </ul>

          <ul class="nav navbar-right navbar-top-links">
           
         <li><a href="../index.php" style="color: white;"><i class="fa fa-sign-out fa-fw" style="color: white;"></i> Logout</a>
        </ul>
        <!-- /.navbar-top-links -->


      </div>
    </nav>
          <!-- /.navbar-top-links -->
          <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
              <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                
                  <!-- /input-group -->
                </li>
                <li>
                  <a href="addproduct.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
             
                
                <!-- /.nav-second-level -->
                
                
                <li>
                  <a href="adminedit.php"><i class="fa fa-corn fa-fw"></i>View All Products</a>
                </li>
                    <li>
                  <a href="messages.php">
                   <i class="fa fa-corn fa-fw"></i></span>Send Message
                  </a>
                </li>
      

              </ul>
              <!-- /.nav-second-level -->
            </li>
          </ul>
        </div>
        <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->
    </nav>
    <div id="page-wrapper" >
      <div class="row" >
     
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <br><br>
    <div class="row" style="background-color: ">
     <div class="panel panel-default">
      <div class="panel-heading" style="color:red">
        <?php
session_start();
include "../conn.php";
$username=$_SESSION["username"];
$query=mysqli_query($mysqli,"SELECT * from admin where username='$username'");
?>
<?php
while ($row=mysqli_fetch_array($query))
{
  echo $row['username'];
}
?>
&nbsp;
Add new products 
      </div>
      <div class="panel-body">
        <div class="row" >
          <div class="col-lg-12" style="background-color:">


<!DOCTYPE html>
<html>
<head>
  <title>mufa</title>
  


<style type="text/css">
table th {
  width: auto !important;

}
    .wrapper{
      width: 97.3%;
      margin-left: 1.4%; 

    }
th{
  padding:0px 0px 0px 50px;
}

</style>
</head>
<body style="background-color: white">



<!DOCTYPE html>
<html>
<head>
  <title></title>
  
<style type="text/css">
table th {
  width: auto !important;

}
    .wrapper{
      width: 97.3%;
      margin-left: 1.4%; 

    }
th{
  padding:0px 0px 0px 50px;
}

</style>
</head>
<body style="background-color: pink">
  <div class="wrapper" style="background-color: purple">
    <div class="cointainer" style="background-color:white">
      &nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 0.1vw" ><a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Add New Product</a></span>



      </script>
      <div style="height:10px;"></div>
      <div class="col-md-12" style="background-color: ">
      <table  class="table table-striped table-hover table-bordered table-fixed table-condensed table-responsive" style=" font-size:10px; width:100%;float:left;margin-left: 0px;" >

          <tr class="info">
             <th style="text-align:center;font-size:1vw;width:20%;">image</th>
            <th class="col-sm-2" style="text-align:center;font-size:1vw;">idNo</th>
            <th style="text-align:center;font-size:1vw;">productName</th>
            <th style="text-align:center;font-size:1vw;">category</th>
                        <th style="text-align:center;font-size:1vw;">specification</th>
                        <th style="text-align:center;font-size:1vw;width:20px;">price</th>
                        <th style="text-align:center;font-size:1vw;">action</th>
                 
                     

 </tr>
      
      <?php
        include('../conn.php');
        $username=$_SESSION['username'];
        $query=mysqli_query($mysqli,"SELECT * from products");
        while($row=mysqli_fetch_array($query)){
          $catid= $row ['category_id'];
          $_SESSION['catid'] = $catid;
      $catsel = mysqli_query($mysqli,"SELECT * from categories where category_id='$catid'");
      $rowcat = mysqli_fetch_array($catsel);
      $brand = $rowcat['category_name'];
      $_SESSION['brand'] = $brand;
          ?>
          <tr >
                      <td>  <a href="#" >
                          <img   src="../imageview.php?image_id=<?php echo $row["imageId"]; ?>" width="40px" height="70vh" class="img-responsive " />
                        </a>
                    </td>
   
          <td style="text-align:center; word-break:break-all; width:;">  <?php echo $row['serial_number']; ?></td>
          <td style="text-align:center; word-break:break-all; width:;font-size: 1vw">  <?php echo $row ['product_name']; ?></td>
                  <td style="text-align:center;  font-size:1vw;width:100px;"> <?php echo $brand; ?></td>
                  <td style="text-align:center;  font-size:1vw;width:200px;"> <?php echo $row ['product_description']; ?></td>
              
                              <td style="text-align:center; word-break:break-all; width:200px;font-size: 0.8vw;">  <?php echo $row ['product_price']; ?></td>
                            
            <td style="width:200px">
              <a href="#edit<?php echo $row['product_id']; ?>" data-toggle="modal" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span><n style="font-size:1vw">  Edit</n></a> 
              <a href="#del<?php echo $row['product_id']; ?>" data-toggle="modal" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span><n style="font-size:1vw"> Delete</n></a>
          <?php include('button.php'); ?>
            </td>
          </tr>


          <?php
        }
      
      ?>
    
    </table>
  </div>
    <div style="height:400px;"></div>
</div>
</div>
  
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
  
    .modal-content{
       background-color: white;
        width:100%;
        
    
     top:20px;
        overflow: auto;

}
.form-group{
margin-bottom:5px; 
}
  
  </style>
</head>
<body style="background-color:red ">


<!-- Add New -->
    <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Add New Product</h4></center>
                </div>

  
                <div class="modal-body">
                  <div class="container-fluid">
       <form  enctype="multipart/form-data" action="addproduct.php" method="post" class="form-horizontal"    onsubmit="return validation(thisform)">

     



            <div class="col-md-12" style="background-color:">
       <br>
  
                <div class="form-group">
              <label for="indexnumber" class="col-sm-3 control-label">Product Name:</label>
              <div class="col-sm-9"><input type="text" class="form-control input-sm" required="required" name="productType" placeholder="productType"></div>
            </div>
     <div class="form-group">
      <label for="indexnumber" class="col-sm-3 control-label">Product Category:</label>
       <div class="col-sm-9"><input type="text" class="form-control input-sm" name="brand" required="required" placeholder="brand"></div>
    </div> 

                                 <div class="form-group">
              <label class="col-md-3 control-label">County:</label>
            <div class="col-md-9">
              <select   class="form-control input-sm" name="county" required="required" />
               <option value="" required />Select County</option>
              <Option  value="kisii">Kisii</option>
                <option value="kitui">Kitui</option>
                              <Option  value="kisii">Kisii</option>
                <option value="turkana">Turkana</option>
                              <Option  value="kisii">Kisii</option>
                <option value="kakamega">Kakamega</option>
                              <Option  value="kisii">Kisii</option>
                <option value="transmara">Transmara</option>
              </select>
            </div>
          </div>
                 <div class="form-group">
      <label for="indexnumber" class="col-sm-3 control-label">Phone Number:</label>
       <div class="col-sm-9"><input type="text" class="form-control input-sm" required="required" name="serialNo" placeholder="Phone Number"></div>
    </div> 

     <div class="form-group">
      <label for="indexnumber" class="col-sm-3 control-label">specification:</label>
       <div class="col-sm-9"><input type="text" class="form-control input-sm"required="required"  name="specification" placeholder="specification"></div>
    </div> 
    <div class="form-group">
      <label for="indexnumber" class="col-sm-3 control-label">price:</label>
       <div class="col-sm-9"><input type="text" class="form-control input-sm" name="price"required="required"  placeholder="price"></div>
    </div>  
    
                <div class="form-group">
                <label class="col-sm-3 control-label">Product Image:</label>
                <div class="col-sm-9"> <input  class="form-control input-sm" required="required" name="userImage" type="file" class="inputFile" id="image"  />
                </div>
              </div>
            <br>
                <div class="form-group">
    <div class="col-md-5 col-sm-push-3 " style="background-color:">
      <input type="submit" class="btn btn-success btn-xs" name="submit" value="submit" >

               <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                </div>
              </div>
  </div>
           

            </div>
          </form>

    
     
        </div>
</div>
</div>
      </div>
</div>













</div>




           
   
<div style="height:250px"></div>
</div>

</div>
</div>
</div>
</div>
</div>
<?php include "../includes/footer.php"; ?>
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../js/startmin.js"></script>
</body>
</html>