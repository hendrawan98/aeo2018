<div class="center">

	<!-- section background video -->

	<section style="position: relative; min-width: 100%">

		<!-- cek sudah login atau belum, jika sudah login maka ke dashboard kalau belum ke registration -->

		<!-- desktop -->
		<div align="center" class="desktopview">
			<?php if($this->session->userdata('user_id') == null)
			{ ?>
				<div style="margin-bottom: -430px;">
					<a href="<?php echo base_url()?>register"><button style="margin-top: 400px; margin-right: 45%; margin-left: 45%;">Registration Here</button></a>
				</div>
			<?php }else{ ?>
				<div style="margin-bottom: -430px;"">
					<a href="<?php echo base_url()?>dashboard"><button style="margin-top: 400px; margin-right: 45%; margin-left: 45%;">Dashboard</button></a>
				</div>
			<?php } ?>
		</div>

		<!-- mobile -->
		<div align="center" class="mvideo">
			<?php if($this->session->userdata('user_id') == null)
			{ ?>
				<div style="margin-bottom: -430px;">
					<a href="<?php echo base_url()?>register"><button style="margin-top: 400px;">Registration Here</button></a>
				</div>
			<?php }else{ ?>
				<div style="margin-bottom: -430px;"">
					<a href="<?php echo base_url()?>dashboard"><button style="margin-top: 400px;">Dashboard</button></a>
				</div>
			<?php } ?>
		</div>

		<!-- div background video -->

		<div align="center">
			<video autoplay="yes" loop="yes" muted="">
				<source src="assets/aeo.mp4" type="video/mp4">
			</video>
		</div>
		<div align="center" class="mvideo col-md-12">
			<img style="width: 100%" src="<?php echo base_url();?>assets/images/main poster.jpg">
		</div>
	</section>

	<!-- section countdown -->
	<section>
		<div class="desktopview" align="center">
			<script src="<?php echo base_url()?>assets/countdown/countdown.js" type="text/javascript"></script>
			<script type="application/javascript">
			var myCountdownTest = new Countdown({
												// I'm cheating here... so I don't have to update this every year!
												// year : 2042, // <-- This is a better example of what to use.
											 	year: 2018,
												month	: 2, 
												day		: 8,
												ms 		: 0,
												second 	: 0,
												minute 	: 0,
												hour	: 0,
												width	: 500,
												height	: 100
												});
			</script>
		</div>
		<div class="mvideo" align="center">
			<script src="<?php echo base_url()?>assets/countdown/countdown.js" type="text/javascript"></script>
			<script type="application/javascript">
			var myCountdownTest = new Countdown({
												// I'm cheating here... so I don't have to update this every year!
												// year : 2042, // <-- This is a better example of what to use.
											 	year: 2018,
												month	: 2, 
												day		: 8,
												ms 		: 0,
												second 	: 0,
												minute 	: 0,
												hour	: 0,
												width	: 200,
												height	: 40
												});
			</script>
		</div>
	</section>

	<!-- section news -->
	<section>
		<h1>News</h1>
	</section>

	<!-- section field -->
	<section>
		<h1>Field</h1>
	</section>
</div>