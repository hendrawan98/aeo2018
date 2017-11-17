<div class="center" style="margin-top: 50px;">
	<div class="container">
		<h1 style="margin-bottom: 50px;">Register Page</h1>

		<div class="col-md-8 col-md-offset-2">
			<form action="<?php echo base_url();?>home/register" method="post" enctype="multipart/form-data">
				<div class="col-md-6">
					<div class="form-group">
						<div class="inputGroupContainer">
							<div class="input-group">
								<label>Institution Name</label>
								<input type="text" name="institution" id="institution">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="inputGroupContainer">
							<div class="input-group">
								<label style="margin-right: 40px;">PIC Name</label>
								<input type="text" name="pic" id="pic">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="inputGroupContainer">
							<div class="input-group">
								<label style="margin-right: 68px;">Phone</label>
								<input type="text" name="phone" id="phone">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="inputGroupContainer">
							<div class="input-group">
								<label style="margin-right: 70px;">Email</label>
								<input type="email" name="email" id="email">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="inputGroupContainer">
							<div class="input-group">
								<label style="margin-right: 45px;">password</label>
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
				<div class="col-md-6">
					<div class="form-group">
						<div class="inputGroupContainer">
							<div class="input-group">
								<label style="margin-right: 8px;">institution type</label>
									<select id="ins_type" name="ins_type">
										<?php
											echo "<option value=''>select institution type</option>";
											echo "<option value='high school'>high school</option>";
											echo "<option value='university'>university</option>";
										?>
									</select>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="inputGroupContainer">
							<div class="input-group">
								<label style="margin-right: 50px;">country</label>
									<select id="country" name="country">
										<?php
											echo "<option value=''>select country</option>";
											echo "<option value='indonesia'>indonesia</option>";
											echo "<option value='malaysia'>malaysia</option>";
										?>
									</select>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<div class="inputGroupContainer">
							<div class="input-group">
								<label style="margin-left: -135px;">Institution Logo</label>
								<input type="file" name="ins_logo">
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
