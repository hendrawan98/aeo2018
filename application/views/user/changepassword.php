<div class="center">
	<div class="container">
		<h1>Register Page</h1>
		<div class="col-md-8 col-md-offset-2">
			<form action="<?php echo base_url();?>user/dochangepassword" method="post" enctype="multipart/form-data" id="changepassword">
				
				<div class="col-md-6">
					<div class="form-group">
						<div class="inputGroupContainer">
							<div class="input-group">
								<label>password</label>
								<input type="password" name="password" id="password">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="inputGroupContainer">
							<div class="input-group">
								<label>verif password</label>
								<input type="password" name="verifpassword" id="verifpassword">
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 center">
					<button type="submit" class="btn btn-primary" style="float:none;">Submit</button>
					<input type="hidden" name="grc-response" value="">
					<div class="col-sm-12">
						Already have an account? Just <a href="<?php echo base_url()?>login">Login</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>