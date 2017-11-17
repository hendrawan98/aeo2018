<div class="container margin-50 center">
	<div class="content">

		<h1>Sent Your Deligates</h1>

		<!-- One "tab" for each step in the form: -->
		<?php echo form_open('user/recap');?>
		<div class="tab">
			<div class="col-md-4">
				<div>
					<img class="sfield" src="<?php base_url()?>assets/images/competition-logo/Debate.png">
				</div>
				<center>Debate</center>
				<?php foreach ($checkDB as $key => $value) { ?>
					<?php if($value['stock'] < 1){ ?>
						<code style="margin-left:-20px;">REGISTRATION&nbsp;CLOSED!</code>
					<?php }else{ ?>
						<table align="center">
							<tr>
								<td>
									<a class="btn btn-danger btn-minus">-</a>
								</td>
								<td>
									<span class="field-number">0</span>
									Team
									<input type="hidden" class="field-value" name="field-db">
									<input type="hidden" class="field-caps" value="<?php echo $checkParticipantCaps['DB'];?>"> 
								</td>
								<td>
									<a class="btn btn-primary btn-plus">+</a>
								</td>
							</tr>
						</table>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<div>
					<img class="sfield" src="<?php base_url()?>assets/images/competition-logo/Spelling Bee.png">
				</div>
				<center>Spelling Bee</center>
				<?php foreach ($checkSB as $key => $value) { ?>
					<?php if($value['stock'] < 1){ ?>
						<code style="margin-left:-20px;">REGISTRATION&nbsp;CLOSED!</code>
					<?php }else{ ?>
						<table align="center">
							<tr>
								<td>
									<a class="btn btn-danger btn-minus">-</a> 
								</td>
								<td>
									<span class="field-number">0</span>
									<input type="hidden" class="field-value" name="field-sb">
									<input type="hidden" class="field-caps" value="<?php echo $checkParticipantCaps['SB'];?>">
								</td>
								<td>
									<a class="btn btn-primary btn-plus">+</a>
								</td>
							</tr>
						</table>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<div>
					<img class="sfield" src="<?php base_url()?>assets/images/competition-logo/Storytelling.png">
				</div>
				<center>Storytelling</center>
				<?php foreach ($checkST as $key => $value) { ?>
					<?php if($value['stock'] < 1){ ?>
						<code style="margin-left:-20px;">REGISTRATION&nbsp;CLOSED!</code>
					<?php }else{ ?>
						<table align="center">
							<tr>
								<td>
									<a class="btn btn-danger btn-minus">-</a> 
								</td>
								<td>
									<span class="field-number">0</span>
									<input type="hidden" class="field-value" name="field-st">
									<input type="hidden" class="field-caps" value="<?php echo $checkParticipantCaps['ST'];?>">
								</td>
								<td>
									<a class="btn btn-primary btn-plus">+</a>
								</td>
							</tr>
						</table>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<div>
					<img class="sfield" src="<?php base_url()?>assets/images/competition-logo/Newscasting.png">
				</div>
				<center>Newscasting</center>
				<?php foreach ($checkNC as $key => $value) { ?>
					<?php if($value['stock'] < 1){ ?>
						<code style="margin-left:-20px;">REGISTRATION&nbsp;CLOSED!</code>
					<?php }else{ ?>
						<table align="center">
							<tr>
								<td>
									<a class="btn btn-danger btn-minus">-</a>
								</td>
								<td>
									<span class="field-number">0</span>
									<input type="hidden" class="field-value" name="field-nc">
									<input type="hidden" class="field-caps" value="<?php echo $checkParticipantCaps['NC'];?>">
								</td>
								<td>
									<a class="btn btn-primary btn-plus">+</a>
								</td>
							</tr>
						</table>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<div>
					<img class="sfield" src="<?php base_url()?>assets/images/competition-logo/Scrabble.png">
				</div>
				<center>Scrabble</center>
				<?php foreach ($checkSC as $key => $value) { ?>
					<?php if($value['stock'] < 1){ ?>
						<code style="margin-left:-20px;">REGISTRATION&nbsp;CLOSED!</code>
					<?php }else{ ?>
						<table align="center">
							<tr>
								<td>
									<a class="btn btn-danger btn-minus">-</a> 
								</td>
								<td>
									<span class="field-number">0</span>
									<input type="hidden" class="field-value" name="field-sc">
									<input type="hidden" class="field-caps" value="<?php echo $checkParticipantCaps['SC'];?>"> 
								</td>
								<td>
									<a class="btn btn-primary btn-plus">+</a>
								</td>
							</tr>
						</table>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<div>
					<img class="sfield" src="<?php base_url()?>assets/images/competition-logo/Short Story Writing.png">
				</div>
				<center>Short Story Writing</center>
				<?php foreach ($checkSSW as $key => $value) { ?>
					<?php if($value['stock'] < 1){ ?>
						<code style="margin-left:-20px;">REGISTRATION&nbsp;CLOSED!</code>
					<?php }else{ ?>
						<table align="center">
							<tr>
								<td>
									<a class="btn btn-danger btn-minus">-</a> 
								</td>
								<td>
									<span class="field-number">0</span>
									<input type="hidden" class="field-value" name="field-ssw">
									<input type="hidden" class="field-caps" value="<?php echo $checkParticipantCaps['SSW'];?>"> 
								</td>
								<td>
									<a class="btn btn-primary btn-plus">+</a>
								</td>
							</tr>
						</table>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<div>
					<img class="sfield" src="<?php base_url()?>assets/images/competition-logo/Speech.png">
				</div>
				<center>Speech</center>
				<?php foreach ($checkSP as $key => $value) { ?>
					<?php if($value['stock'] < 1){ ?>
						<code style="margin-left:-20px;">REGISTRATION&nbsp;CLOSED!</code>
					<?php }else{ ?>
						<table align="center">
							<tr>
								<td>
									<a class="btn btn-danger btn-minus">-</a>
								</td>
								<td>
									<span class="field-number">0</span>
									<input type="hidden" class="field-value" name="field-sp">
									<input type="hidden" class="field-caps" value="<?php echo $checkParticipantCaps['SP'];?>">
								</td>
								<td>
									<a class="btn btn-primary btn-plus">+</a>	
								</td>
							</tr>
						</table>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<div>
					<img class="sfield" src="<?php base_url()?>assets/images/competition-logo/Radio Drama.png">
				</div>
				<center>Radio Drama</center>
				<?php foreach ($checkRD as $key => $value) { ?>
					<?php if($value['stock'] < 1){ ?>
						<code style="margin-left:-20px;">REGISTRATION&nbsp;CLOSED!</code>
					<?php }else{ ?>
						<table align="center">
							<tr>
								<td>
									<a class="btn btn-danger btn-minus">-</a>
								</td>
								<td>
									<span class="field-number">0</span>
									<input type="hidden" class="field-value" name="field-rd">
									<input type="hidden" class="field-caps" value="<?php echo $checkParticipantCaps['RD'];?>"> 
								</td>
								<td>
									<a class="btn btn-primary btn-plus">+</a>
								</td>
							</tr>
						</table>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="col-md-12" style="overflow:auto;">
				<div style="float:right;">
			    <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
			    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
			  		<button type="submit" class="btn btn-success">Submit</button>
			  	</div>
			</div>
			<?php echo form_close();?>
		</div>

		<!-- <div class="tab">Birthday:
		  <p><input placeholder="dd" oninput="this.className = ''"></p>
		  <p><input placeholder="mm" oninput="this.className = ''"></p>
		  <p><input placeholder="yyyy" oninput="this.className = ''"></p>
		</div>

		<div class="tab">Login Info:
		  <p><input placeholder="Username..." oninput="this.className = ''"></p>
		  <p><input placeholder="Password..." oninput="this.className = ''"></p>
		</div> -->

		

		<!-- Circles which indicates the steps of the form: -->
		<div class="col-md-12" style="text-align:center;margin-top:40px;">
		  <span class="field-number"></span>
		  <span class="step active"></span>
		  <span class="step"></span>
		  <span class="step"></span>
		</div>
 
	</div>
</div>
