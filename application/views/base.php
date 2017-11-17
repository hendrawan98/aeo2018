<!DOCTYPE html>
<html>
	<head>
		<title>The 2018 Asian English Olympics - Discover the Extraordinary</title>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/boiler/css/main.css">
    	<link rel="stylesheet" href="<?php echo base_url();?>assets/boiler/css/normalize.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/style.css">
		<script src="<?php echo base_url();?>assets/boiler/js/vendor/modernizr-2.8.3.min.js"></script>  
		<!-- Partial CSS -->
		<?php
			if(isset($css)){
				include('/partial/'.$this->router->fetch_class().'/'.$content.'_css.php');
			}
		?>

		<!-- check user session -->
		<?php
			$session_id='';
			if($this->session->userdata('user_id') != null)
			{
				$session_id = $this->session->userdata('user_id');
			}
		?>

	</head>
	<body>
		<!-- Header -->
			<!-- navbar -->
		<?php if(!isset($userlogin)){ ?>

		<nav class="navbar navbar-default" style="margin-bottom: -20px;">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="<?php echo base_url()?>home">Home</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		      	<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			           <li><a href="<?php echo base_url()?>about_event">Event</a></li>
			            <li><a href="<?php echo base_url()?>about_organizer">Organizer</a></li>
			            <li><a href="<?php echo base_url()?>program_highlight">Program</a></li>
			            <li><a href="#">Why AEO</a></li>
			          </ul>
			        </li>
		        <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> -->
		        <li><a href="#">Link</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Action</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#">One more separated link</a></li>
		          </ul>
		        </li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        
        		<li><a href="<?php echo base_url()?>register">Register</a></li>
		        		
		        

		        <!-- <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Action</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		          </ul>
		        </li> -->
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

		<?php }else{ ?>
			<nav class="navbar navbar-default" style="margin-bottom: -20px;">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="<?php echo base_url()?>home">Home</a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			      	<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="<?php echo base_url()?>about_event">Event</a></li>
			            <li><a href="<?php echo base_url()?>about_organizer">Organizer</a></li>
			            <li><a href="<?php echo base_url()?>program_highlight">Program</a></li>
			            <li><a href="#">Why AEO</a></li>
			          </ul>
			        </li>
			        <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> -->
			        <li><a href="#">Link</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="#">Action</a></li>
			            <li><a href="#">Another action</a></li>
			            <li><a href="#">Something else here</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">Separated link</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">One more separated link</a></li>
			          </ul>
			        </li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="<?php echo base_url()?>dashboard"><?php echo $userdata['institution']; ?></a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img class="img-dropdown-menu" src="<?php echo base_url();?><?php echo $userdata['institution_logo'];?>"> <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="<?php echo base_url()?>view/profile">View Profile</a></li>
			            <li><a href="<?php echo base_url()?>change-password">Change Password</a></li>
			            <li><a href="<?php echo base_url()?>logout">View Transaction History</a></li>
			          	<li><a href="<?php echo base_url()?>logout">Logout</a></li>
			          </ul>
			        </li>

			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		<?php } ?>

		<!-- Content -->
		<?php
			include($this->router->fetch_class().'/'.$content.'.php');
		?>

		<!-- Footer -->
		<div align="center">
			<h6>Powered by : The 2018 Asian English Olympics Organizer © 2017</h6>	
		</div>

		<!-- Script -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"><\/script>')</script>
		<script src="<?php echo base_url();?>assets/boiler/js/plugins.js"></script>
	    <script src="<?php echo base_url();?>assets/boiler/js/main.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script>
	        var base_url = "<?php echo base_url();?>";
	    </script>

		<!-- Partial JS -->
		<?php
			if(isset($js)){
				include('/partial/'.$this->router->fetch_class().'/'.$content.'_js.php');
			}
		?>
	</body>
</html>
