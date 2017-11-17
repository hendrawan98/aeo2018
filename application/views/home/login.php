<div class="center" style="margin-top: 50px;">
	<div class="container">
		<h1 style="margin-bottom: 50px;">Login Page</h1>
		
		<div class="col-md-8 col-md-offset-2">
			<?php
				echo form_open('home/login');
			?>
				<div class="col-dm-4 col-md-offset-4">
					<div class="form-group">
						<div class="inputGroupContainer">
							<div class="input-group">
								<label style="margin-right: 30px;">Email</label>
								<input type="email" name="email" id="email">
							</div>
						</div>
					</div>
				</div>
				<div class="col-dm-4 col-md-offset-4">
					<div class="form-group">
						<div class="inputGroupContainer">
							<div class="input-group">
								<label>password</label>
								<input type="password" name="password" id="password">
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 center">
					<button type="submit" class="btn btn-primary" style="float:none;">Submit</button>
					<input type="hidden" name="grc-response" value="">
					<div class="col-sm-12">
						Don't have an account? Just <a href="<?php echo base_url()?>register">Register</a> Here !!!
					</div>
				</div>
			<?php
				echo form_close();
			?>
		</div>
	</div>
</div>
