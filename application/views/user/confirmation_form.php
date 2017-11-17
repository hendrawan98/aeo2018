<div class="container top20">
<center><h2 class="top20 bottom20">Confirmation Form</h2></center>

<form action="<?php echo base_url();?>user/doConfirmation" id="formConfirmation" method="post" enctype="multipart/form-data">
	<div style="min-height:500px;" class="container top20 bottom20 ">	
		<div class="row">
			<div class="col-sm-6 offset-sm-3 top20 tab-pane fade in active">
				<div class="col-sm-12 form-group">
					<select name="payment_type" id="payment_type" class="btn btn-primary col-sm-12">
						<option selected disabled>Select your Payment Type</option>
						<option value="national">National Payment</option>
						<option value="international">International Payment</option>
					</select>
				</div> 
				<div id="formContent">
					
				</div>
			</div>	
		</div>
	</div>
</form>
</div>

