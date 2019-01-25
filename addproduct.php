<?php
session_start();
?>
<?php
error_reporting( ~E_NOTICE ); // avoid notice
if(isset($_POST['submit'])) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
      include "../conn.php";
     
$serialNo=$_POST['serialNo'];
$productType=$_POST['productType'];
$brand=$_POST['brand'];
$specification=$_POST['specification'];
$price=$_POST['price'];
$description=$_POST['description'];
$date=$_POST['date'];
$status=onsale;
$username=$_SESSION['username'];
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
      $upload_dir = 'user_image/'; // upload directory
  
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    
      // valid image extensions
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    
      // rename uploading image
      $userpic = rand(1000,1000000).".".$imgExt;
        
      // allow valid image file formats
      if(in_array($imgExt, $valid_extensions)){     
        // Check file size '5MB'
        if($imgSize < 5000000)        {
          move_uploaded_file($upload_dir,$userpic);
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
 $sql="insert into products(imageType ,imageData,serialNo,productType,brand,specification,price,status,username,description,date) values('{$imageProperties['mime']}', '$imgData','$serialNo','$productType','$brand','$specification','$price','$status','$username','$description','$date')";
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

  <title>Add New products</title>

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

       <div id="wrapper" style="background-color:purple">

        <!-- Navigation -->
        <nav class="navbar navbar-light navbar-fixed-top" style="background-color: green" role="navigation">
          <div class="navbar-header">
            <a class="navbar-brand" href="#" style="color:white">ONLINE PURCHASE OF AGRICULTURAL PRODUCTS</a>
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
          
  
            <li><a href="../about.php" style="color:white;">About Us</a></li>
          </ul>
 <ul class="nav navbar-right navbar-top-links">
            <li><a href="../help.php" style="color:white;">Help</a></li>
             
                <li><a href="../index.php" style="color: white"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
              </ul>
            </li>
          </ul>
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
                   <i class="fa fa-corn fa-fw"></i></span>send notification
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
      <div class="panel-heading" style="color:green">
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
            <th class="col-sm-2" style="text-align:center;font-size:1vw;">serialNo</th>
            <th style="text-align:center;font-size:1vw;">productName</th>
            <th style="text-align:center;font-size:1vw;">category</th>
            <th style="text-align:center;font-size:1vw;">specification</th>
                        <th style="text-align:center;font-size:1vw;">description</th>
                        <th style="text-align:center;font-size:1vw;width:20px;">price</th>
                         <th style="text-align:center;font-size:1vw;width:20px;">Sell by</th>
                        <th style="text-align:center;font-size:1vw;">action</th>
                 
                     

 </tr>
      
      <?php
      include "../conn.php";
        $username=$_SESSION['username'];
        $query=mysqli_query($mysqli,"SELECT * from products where username='$username' ORDER BY imageId DESC");
        while($row=mysqli_fetch_array($query)){
          ?>
          <tr >
                      <td>  <a href="#" >
                          <img   src="imageview.php?image_id=<?php echo $row["imageId"]; ?>" width="40px" height="70vh" class="img-responsive " />
                        </a>
                    </td>
   
                               <td style="text-align:center; word-break:break-all; width:200px;">  <?php echo $row ['serialNo']; ?></td>
                <td style="text-align:center; word-break:break-all; width:;font-size: 1vw">  <?php echo $row ['productType']; ?></td>
                  <td style="text-align:center;  font-size:1vw;width:200px;"> <?php echo $row ['brand']; ?></td>
                  <td style="text-align:center;  font-size:1vw;width:200px;"> <?php echo $row ['specification']; ?></td>
                   <td style="text-align:center; word-break:break-all; width:200px;font-size: 0.8vw;">  <?php echo $row ['description']; ?></td>
            
                              <td style="text-align:center; word-break:break-all; width:110px;font-size: 0.8vw;">  <?php echo $row ['price']; ?></td>
                                <td style="text-align:center; word-break:break-all; width:200px;font-size: 0.8vw;">  <?php echo $row ['date']; ?></td>
                            
            <td style="width:200px">
              <a href="#edit<?php echo $row['imageId']; ?>" data-toggle="modal" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span><n style="font-size:1vw">  Edit</n></a> 
              
              <a href="#del<?php echo $row['imageId']; ?>" data-toggle="modal" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span><n style="font-size:1vw"> Delete</n></a>
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
      <label for="indexnumber" class="col-sm-3 control-label">serialNo:</label>
       <div class="col-sm-9"><input type="serialNo" class="form-control input-sm" name="serialNo" placeholder=" serialNo" required="required"></div>
    </div>   


     <div class="form-group">
              <label class="col-sm-3 control-label" >category:</label>
              <div class="col-sm-9">
              <select  class="form-control input-sm"  type="text" name="brand"  required="required"/>
               <option ></option>
              <option value="cereals">Cereals</option>
              <option value="vegetables">Vegetables</option>
              <option value="fruits">Fruits</option>
              <option value="cash crops">cash crops</option>
              </select>
            </div>


            </div>
                <div class="form-group">
              <label for="indexnumber" class="col-sm-3 control-label">productType:</label>
              <div class="col-sm-9"><input type="text" class="form-control input-sm" name="productType" placeholder="productType"></div>
            </div>
 
   


     <div class="form-group">
      <label for="indexnumber" class="col-sm-3 control-label">specification:</label>
       <div class="col-sm-9"><input type="text" class="form-control input-sm" name="specification" placeholder="specification"></div>
    </div> 
        <div class="form-group">
      <label for="indexnumber" class="col-sm-3 control-label">Description:</label>
       <div class="col-sm-9"><textarea class="form-control " rows="3" cols="34" name="description" placeholder="description" required="required"></textarea>
       </div>
    </div> 
        <div class="form-group">
      <label for="indexnumber" class="col-sm-3 control-label">Expiry Date:</label>
       <div class="col-sm-9"><input type="date" class="form-control input-sm" name="date" placeholder="Expiry date"></div>
    </div> 
    <div class="form-group">
      <label for="indexnumber" class="col-sm-3 control-label">price:</label>
       <div class="col-sm-9"><input type="text" class="form-control input-sm" name="price" placeholder="price"></div>
    </div>  
    
                <div class="form-group">
                <label class="col-sm-3 control-label">Product Image:</label>
                <div class="col-sm-9"> <input  class="form-control input-sm" name="userImage" type="file" class="inputFile" id="image"  />
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





</div>
</div>
       <center>
<div class="col-md-12">
<hr>
<a href="http://www.facebook.com"><img src="../images/f1.png"width="30"height="30"rspace="4"></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="http://www.twitter.com"><img src="../images/t1.png"width="30"height="30"rspace="4"></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="http://www.gmail.com"><img src="../images/g3.jpg"width="30"height="30"rspace="4"></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="http://www.youtube.com"><img src="../images/yu2.jpg"width="30"height="30"rspace="4"></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="http://www.skype.com"><img src="../images/s3.png"width="30"height="30"rspace="4"></a>
<br>

</div>
</center>
           

</div>
</div>
</div>

<div style="height:0px"></div>
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