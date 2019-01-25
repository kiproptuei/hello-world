<!-- Delete -->
    <div class="modal fade" id="del<?php echo $row['imageId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($mysqli,"select * from product_detail where imageId='".$row['imageId']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>type of product to be deleted: <strong><?php echo $drow['productType']; ?></strong></center></h5> 
                </div> 
				</div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="deletesold.php?id=<?php echo $row['imageId']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
				
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit -->




















					  
<div class="col-lg-12">
	<div class="modal fade" id="edit<?php echo $row['imageId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit Product Information </h4></center>
                </div>
                <div class="modal-body">

                	    <table  class="table table-striped table-hover table-bordered " style="width: 70%" font-size="10px" > 
				<?php
					$edit=mysqli_query($mysqli,"select * from product_detail where imageId='".$row['imageId']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				 <form method="POST" class="form-horizontal" action="edit.php?id=<?php echo $erow['imageId']; ?>" enctype="multipart/form-data">


		<div class="form-horizontal">
       

            <div class="col-md-12" style="background-color:">
             
              <br>
       <div class="form-group">
      <label for="indexnumber" class="col-sm-3 control-label" style="font-size: 0.7vw">serialNo:</label>
       <div class="col-sm-9"><input type="date" class="form-control input-sm" name="serialNo" value="<?php echo $erow['serialNo']; ?>"></div>
    </div>   
                <div class="form-group">
              <label for="indexnumber" class="col-sm-3 control-label" style="font-size: 0.7vw">productType:</label>
              <div class="col-sm-9"><input type="text" class="form-control input-sm" name="productType" value="<?php echo $erow['productType']; ?>""></div>
            </div>
     <div class="form-group">
      <label for="indexnumber" class="col-sm-3 control-label" style="font-size: 0.7vw">brand:</label>
       <div class="col-sm-9"><input type="text" class="form-control input-sm" name="brand" value="<?php echo $erow['brand']; ?>"></div>
    </div>   
     <div class="form-group">
      <label for="indexnumber" class="col-sm-3 control-label" style="font-size: 0.7vw">specification:</label>
       <div class="col-sm-9"><input type="text" class="form-control input-sm" name="specification" value="<?php echo $erow['specification']; ?>"></div>
    </div> 
    <div class="form-group">
      <label for="indexnumber" class="col-sm-3 control-label" style="font-size: 0.7vw">price:</label>
       <div class="col-sm-9"><input type="text" class="form-control input-sm" name="price" value="<?php echo $erow['price']; ?>"></div>
    </div>  
          

               <div class="form-group">
                
                 <div class="col-md-5 col-md-push-3">
                          <a href="#" >
                          <img   src="../imageview.php?image_id=<?php echo $erow["imageId"]; ?>" width="100%" height="90vh" class="img-responsive img-thumbnail" />
                        </a>
                      </div>
                    </div>
                                          <div class="form-group">
                <label class="col-sm-3 control-label">Product Image:</label>
                <div class="col-sm-9"> <input  class="form-control input-sm" name="userImage" type="file" class="inputFile" id="image"   />
                </div>
              </div>\

         <div class="col-sm-5 col-md-push-3"  style="background-color: ">
                  <button type="submit" class="btn btn-success  btn-xs"><span class="glyphicon glyphicon-check"></span> Save</button>
                 <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

            
          </div>
              
            
  </div>
   	<div style="height:330px;"></div>     

				


            </div>
                </form>
        </div>
                   </table>
                				
                 
       
			
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.modal -->








