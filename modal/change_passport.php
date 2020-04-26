
<div class="modal fade" id="formModal">
 	<div class="modal-dialog">
    <div class="modal-content">
    	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Change Passport</h4>
		</div>
	    <div class="modal-body">
	        <form class="form-horizontal" role="form" method="post" action="process.php" enctype="multipart/form-data">
	          <div class="form-group">
	            <label class="control-label col-lg-4">Upload Passport</label>
	            <div class="col-lg-8">
	                <div class="fileupload fileupload-new" data-provides="fileupload">
	                    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
	                    <div>
	                        <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file"  name="passport" required/></span>
	                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
	                    </div>
	                </div>
	            </div>
	          </div>
	          <div class="form-group">
                <input type="hidden" value="<?php echo $staff_id;?>" name="staff_id" class="form-control"> 
              </div>
	          <div class="form-group"> 
	            <div class="col-sm-offset-8 col-sm-10">
	              <button type="submit" name="passportChange" class="btn btn-danger">Save Changes</button>
	            </div>
	          </div>
	        </form>       
	   </div>
      <div class="modal-footer">
      </div>
    </div>
   </div>
</div>

