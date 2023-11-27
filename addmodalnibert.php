<!---Add in modal---->

<!-- Modal -->
<div id="add_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
<!-- 		<center><img src="https://codingcush.com/uploads/logo/logo_61b79976c34f5.png" width="300px" height="80px" alt=""></center> -->
        <h4 class="modal-title text-center">Project Details</h4>
      </div>
      <div class="modal-body">
        <form action="user_resortinfo.php" method="POST" enctype="multipart/form-data">
			
			<!-- This is test for New Card Activate Form  -->
			<!-- This is Address with email id  -->


<div class="form-row">
<div class="form-group col-md-6">
<label for="fname">First Name</label>
<input type="text" class="form-control" name="fname" placeholder=""required>
</div>
<div class="form-group col-md-6">
<label for="mname">Middle Name</label>
<input type="text" class="form-control" name="mname" placeholder=""required>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="lname">Last Name</label>
<input type="text" class="form-control" name="lname" placeholder=""required>
</div>
<div class="form-group col-md-6">
<label for="ext_name">Extension name</label>
<input type="text" class="form-control" name="ext_name" placeholder="">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="contact_no">Contact No.</label>
<input type="text" class="form-control" name="contact_no" placeholder="" maxlength="11" required>
</div>
<div class="form-group col-md-6">
<label for="address">Address</label>
<input type="text" class="form-control" name="address" placeholder=""required>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="uploaded">Account Created</label>
<input type="date" class="form-control" name="uploaded" placeholder=""required>
</div>
<div class="form-group col-md-6">
<label for="email">Email</label>
<input type="email" class="form-control" name="email" placeholder=""required>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="password">Password</label>
<input type="password" class="form-control" name="password" placeholder=""required>
</div>

<div class="form-group col-md-6">
<label for="confirm_password">Confirm Password</label>
<input type="password" class="form-control" name="confirm_password" placeholder=""required>
</div>
</div>
		


        	<div class="form-group">
        		<label>Image</label>
        		<input type="file" name="image" class="form-control" >
        	</div>

        	
        	 <input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">
        	
        	
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>