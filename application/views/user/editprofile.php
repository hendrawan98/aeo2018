<div class="center">
	<div class="container">
		<h1>Edit Profile Page</h1>

		<div class="col-md-8 col-md-offset-2">
			<form action="<?php echo base_url();?>user/doEditProfile" method="post" enctype="multipart/form-data">
				<div class="col-md-12">
					<div class="form-group">
						<div class="inputGroupContainer">
							<div class="input-group">
								<label>Institution Name</label>
								<input type="text" name="institution" id="institution" value=<?php echo $userdata['institution']?>>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="inputGroupContainer">
							<div class="input-group">
								<label>PIC Name</label>
								<input type="text" name="pic" id="pic" value=<?php echo $userdata['pic']?>>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="inputGroupContainer">
							<div class="input-group">
								<label>Email</label>
								<input type="email" name="email" id="email" value=<?php echo $userdata['email']?>>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<div class="inputGroupContainer">
							<div class="input-group">
								<input type="file" name="ins_logo">
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 center">
					<button type="submit" class="btn btn-primary" style="float:none;">Update profile</button>
					<input type="hidden" name="grc-response" value="">
				</div>
			</form>
		</div>
	</div>
</div>
