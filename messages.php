<?php
session_start();
error_reporting( ~E_NOTICE ); // avoid notice
?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Messages</title>

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
                   <i class="fa fa-corn fa-fw"></i></span>Send notification
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
View Users 
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
  <div class="wrapper" style="background-color: white">
  
      <div style="height:10px;"></div>
      <div class="col-md-12" style="background-color: ">
      <table  class="table table-striped table-hover table-bordered table-fixed table-condensed table-responsive" style=" font-size:10px; width:100%;float:left;margin-left: 0px;" >

 <center><h4>Farmers</h4></center>

          <tr class="info">
             <th style="text-align:center;font-size:1vw;width:20%;">Name</th>
            <th class="col-sm-2" style="text-align:center;font-size:1vw;">User Type</th>
                        <th style="text-align:center;font-size:1vw;">action</th>
                 
                     

 </tr>
      
      <?php
        include('../conn.php');
      
        $query=mysqli_query($mysqli,"SELECT * from register where usertype='farmer'");
        while($row=mysqli_fetch_array($query)){
          ?>
          <tr >
   
                <td style="text-align:center; word-break:break-all;font-size: 1vw; width:;">  <?php echo $row ['fname']." ".$row['lname']; ?></td>
                <td style="text-align:center; word-break:break-all; width:;font-size: 1vw">  <?php echo $row ['usertype']; ?></td>
                  
            <td style="width:200px">
              <a href="#edituser<?php echo $row['imageId']; ?>" data-toggle="modal" class="btn btn-warning btn-xs"><n style="font-size:1vw">Compose</n></a> 

              <a href="#del<?php echo $row['imageId']; ?>" data-toggle="modal" class="btn btn-danger btn-xs"><n style="font-size:1vw"> Delete User</n></a>
          <?php include'button12.php'; ?>
         
            </td>
          </tr>


          <?php
        }
      
      ?>
    
    </table>
  </div>

<div style="height: 240px"></div>


    <div class="col-md-12" style="background-color: ">
      <table  class="table table-striped table-hover table-bordered table-fixed table-condensed table-responsive" style=" font-size:10px; width:100%;float:left;margin-left: 0px;" >

 

 <center><h4>customers</h4></center>
          <tr class="info">
             <th style="text-align:center;font-size:1vw;width:20%;">Name</th>
            <th class="col-sm-2" style="text-align:center;font-size:1vw;">User Type</th>
                        <th style="text-align:center;font-size:1vw;">action</th>
                 
                     

 </tr>
      
      <?php
        include('../conn.php');
      
        $query=mysqli_query($mysqli,"SELECT * from register where usertype='customer'");
        while($row=mysqli_fetch_array($query)){
          ?>
          <tr >
   
                <td style="text-align:center; word-break:break-all;font-size: 1vw; width:;">  <?php echo $row ['fname']." ".$row['lname']; ?></td>
                <td style="text-align:center; word-break:break-all; width:;font-size: 1vw">  <?php echo $row ['usertype']; ?></td>
                  
            <td style="width:200px">
              <a href="#edituser<?php echo $row['imageId']; ?>" data-toggle="modal" class="btn btn-warning btn-xs"><n style="font-size:1vw">Compose</n></a> 


              <a href="#del<?php echo $row['imageId']; ?>" data-toggle="modal" class="btn btn-danger btn-xs"><n style="font-size:1vw"> Delete User</n></a>
          <?php include'button12.php'; ?>
     
            </td>
          </tr>


          <?php
        }
      
      ?>
    
    </table>
  </div>
    <div style="height:200px;"></div>
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
       <div class="col-sm-9"><input type="serialNo" class="form-control input-sm" name="serialNo" placeholder=" serialNo"></div>
    </div>   
                <div class="form-group">
              <label for="indexnumber" class="col-sm-3 control-label">productType:</label>
              <div class="col-sm-9"><input type="text" class="form-control input-sm" name="productType" placeholder="productType"></div>
            </div>
     <div class="form-group">
      <label for="indexnumber" class="col-sm-3 control-label">brand:</label>
       <div class="col-sm-9"><input type="text" class="form-control input-sm" name="brand" placeholder="brand"></div>
    </div>   
     <div class="form-group">
      <label for="indexnumber" class="col-sm-3 control-label">specification:</label>
       <div class="col-sm-9"><input type="text" class="form-control input-sm" name="specification" placeholder="specification"></div>
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
                    
   
<div style="height:100px"></div>
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