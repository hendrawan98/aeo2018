<style>
/*body .modal-open */
.datepicker{z-index:100000 !important;}
</style>
<div class="container-fluid bg-dashboard">
	
		<div class="row top20 bottom20">
			<div class="col-sm-12">
				<center>
					<h3 style="color:#ed1a43;"><b>BINUS SQUARE</b></h3>
					<h5 class="bottom20 top20"><a href="<?php echo base_url();?>accommodation">Click here</a> to see the facilities offered by BINUS Square</h5>
				</center>
			</div>

			<center>
			<div class="col-sm-10 offset-sm-1">
				<table class="table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Room Type</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Nights</th>
							<th>Check In Date</th>
							<th>Check Out Date</th>
							<th style="text-align:center;">Action</th>
							<th style="text-align:center;">Total</th>
						</tr>
					</thead>
					<tbody>
						<?php				
						$totalprice = 0;
						$cart = $this->cart->contents();
						$noItem = 0;

						$totalqty = 0;
								$totaldeposit = 0;
								$deposit = 200000;

							foreach($cart as $key => $value):
							?>
							<tr>
								<td><?php echo $noItem+1;?> <input type="hidden" value="<?php echo $value['id'];?>" name="field[]"></td>
								<td><?php echo $value['name'];?></td>
								<td>IDR 
									<?php
										$angka = $value['price'];
										$decimal ="0";
										$pemisah_desimal =",";
										$pemisah_ribuan =".";
			 
										echo number_format($angka, $decimal, $pemisah_desimal, $pemisah_ribuan);
									?>
								</td>
								<td><?php if($value['qty'] == 1){ ?><?php echo $value['qty'];?> Room<?php }else{ ?><?php echo $value['qty'];?> Rooms<?php } ?><input type="hidden" value="<?php echo $value['qty'];?>" name="qty[]">
								</td>
								<td><?php if($value['night'] == 1){ ?><?php echo $value['night'];?> Night<?php }else{ ?><?php echo $value['night'];?> Nights<?php } ?><input type="hidden" value="<?php echo $value['night'];?>" name="night[]">
								</td>
								<td><?php echo $value['checkin_date'];?></td><input type="hidden" value="<?php echo $value['checkin_date'];?>" name="checkin_date[]">
								<td><?php echo $value['checkout_date'];?></td><input type="hidden" value="<?php echo $value['checkout_date'];?>" name="checkout_date[]">					
								<td><input type="hidden" value="<?php echo $value['rowid'];?>" name="field[]"><a class="btn btn-danger" href="<?php echo base_url();?>delete/accommodation/<?php echo $value['rowid'];?>" style="text-align:center;">Remove</a></td>
								<td>IDR <span style="float:right;"> 
									<?php 
										$angka = $value['totalprice'];
										$decimal ="0";
										$pemisah_desimal =",";
										$pemisah_ribuan =".";
			 
										echo number_format($angka, $decimal, $pemisah_desimal, $pemisah_ribuan);
									?></span>
								</td>
							</tr>
											
							<?php
								$totalprice += $value['totalprice'];
								$noItem++;
								$totalqty+=$value['qty'];
                                                                if($value['code']=='boarder_room'){
									$totalqty = $totalqty-$value['qty'];
								}
								endforeach;
								if(count($cart) > 0){
							?>
							<tr>
									<td><?php echo $noItem+1;?></td>
									<td>Deposit Fee</td>
									<td>IDR <span><?php 
											$angka = $deposit;
											$decimal ="0";
											$pemisah_desimal =",";
											$pemisah_ribuan =".";
				 
											echo number_format($angka, $decimal, $pemisah_desimal, $pemisah_ribuan);
										?></span>
									</td>
									<td>
										<?php
											if($totalqty == 1){
												echo $totalqty." Room";
											}else{
												echo $totalqty." Rooms";
											}
										 	
											$totalprice+= ($totalqty*200000);//200.000 ITU DEPOSIT FEE ACCOM

										?>
									
									</td>
									<td><span style="float:center;"> - </span></td>
									<td><span style="float:center;"> - </span></td>
									<td><span style="float:center;"> - </span></td>
									<td><span style="float:center;"> - </span></td>
									<td>IDR <span style="float:right;"><?php $totaldeposit = $deposit * $totalqty; 
										$angka = $totaldeposit;
										$decimal ="0";
										$pemisah_desimal =",";
										$pemisah_ribuan =".";
			 
										echo number_format($angka, $decimal, $pemisah_desimal, $pemisah_ribuan);
									?>
									</td>
								</tr>

						<?php 
					}//END IF
						if(count($cart) == 0){
								echo "<tr><td colspan='9' style='text-align:center;'>You have not selected any room yet !</td></tr>";
							}
						?>

						<?php 
							foreach ($ins as $key => $value) { ?>
							<?php if($value['country'] != 'Indonesia'){ ?>
								<tr>
									<td colspan="8"><b>Total Accommodation Fee</b></td>
									<td>IDR <span style="float:right;">
										<?php 
											$angka = $totalprice;
											$decimal ="0";
											$pemisah_desimal =",";
											$pemisah_ribuan =".";
				 
											echo number_format($angka, $decimal, $pemisah_desimal, $pemisah_ribuan);
										?></span>
									</td>
								</tr>
							<?php }else{ ?>
								<tr>
									<td colspan="8"><b>Total Accommodation Fee</b></td>
									<td>IDR <span style="float:right;">
									<?php 
										$angka = $totalprice;
										$decimal ="0";
										$pemisah_desimal =",";
										$pemisah_ribuan =".";
			 
										echo number_format($angka, $decimal, $pemisah_desimal, $pemisah_ribuan); 
									?></span>
									</td>
								</tr>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<?php if (count($cart) > 0){ ?>
			<div class="col-sm-12 bottom20">
				<center>
					<button type="submit" class="btn btn-success confirmBooking">Confirm Booking</button>
				</center>
			</div>
			<?php }else{ ?>
			<div class="col-sm-12 bottom20 hidden">
				<center>
					<button type="submit" class="btn btn-success confirmBooking">Confirm Booking</button>
				</center>
			</div>
			<?php } ?>

			</center>

			<div class="col-sm-12 bottom20">
				<div class="col-sm-4 top20">
					<center>
					<div class="card5 bottom20">
						<span></span>
						<center>
							<img src="<?php echo base_url();?>assets/images/accomodation/Suite.jpg">
							<h5 class="top20" style="color:#ed1a43;">Suite Room</h5>
						</center>
						<div class="col-sm-12">
							<article style="padding-bottom:10px;">
								<span style="float:left;"><b>Price:</b> IDR 780.000/room/night</span><br>
								<!-- <span style="float:left;"><b>Size:</b> 46m²</span><br> -->
								<span style="float:left;"><b>Max People:</b> 5</span><br>
								<span style="float:left;"><b>Stock:</b> 
								<?php foreach ($checkSuite as $key => $value) { ?>
									<?php if($value['stock'] < 1){ ?>
										Out of Stock
									<?php }else{?>
										<?php if($value['stock'] == 1){ ?>
											<?php echo $value['stock'];?> room
										<?php }else{ ?>
											<?php echo $value['stock'];?> rooms
										<?php } ?>
									<?php } ?>
								<?php } ?> </span><br>
							</article>
						</div>
						<?php foreach ($checkSuite as $key => $value) { ?>
							<?php if($value['stock'] > 0){ ?>
								<center><a style="color:#fff;" class="btn btn-primary" data-toggle="modal" data-target="#modalSuite">Add Room</a></center>
							<?php }else{ ?>
								<code style="background-color:#ccc;">MAX ROOM REACHED!</code>
							<?php } ?>
						<?php } ?>
					</div>
					</center>
				</div>
				<div class="col-sm-4 top20">
					<center>
					<div class="card5 bottom20">
						<span></span>
						<center>
							<img src="<?php echo base_url();?>assets/images/accomodation/bs/deluxe/1.jpg">
							<h5 class="top20" style="color:#ed1a43;">Deluxe Room</h5>
						</center>
						<div class="col-sm-12">
							<article style="padding-bottom:10px;">
								<span style="float:left;"><b>Price:</b> IDR 600.000/room/night</span><br>
								<!-- <span style="float:left;"><b>Size:</b> 30m²</span><br> -->
								<span style="float:left;"><b>Max People:</b> 3</span><br>
								<span style="float:left;"><b>Stock:</b> 
								<?php foreach ($checkDeluxe as $key => $value) { ?>
									<?php if($value['stock'] < 1){ ?>
										Out of Stock
									<?php }else{?>
										<?php if($value['stock'] == 1){ ?>
											<?php echo $value['stock'];?> room
										<?php }else{ ?>
											<?php echo $value['stock'];?> rooms
										<?php } ?>
									<?php } ?>
								<?php } ?> </span><br>
							</article>
						</div>
						<?php foreach ($checkDeluxe as $key => $value) { ?>
							<?php if($value['stock'] > 0){ ?>
								<center><a style="color:#fff;" class="btn btn-primary" data-toggle="modal" data-target="#modalDeluxe">Add Room</a></center>
							<?php }else{ ?>
								<code style="background-color:#ccc;">MAX ROOM REACHED!</code>
							<?php } ?>
						<?php } ?>
					</div>
					</center>
				</div>
				<div class="col-sm-4 top20">
					<center>
					<div class="card5 bottom20">
						<span></span>
						<center>
							<img src="<?php echo base_url();?>assets/images/accomodation/Superior Twin.jpg">
							<h5 class="top20" style="color:#ed1a43;">Superior Twin with TV</h5>
						</center>
						<div class="col-sm-12">
							<article style="padding-bottom:10px;">
								<span style="float:left;"><b>Price:</b> IDR 465.000/room/night</span><br>
								<!-- <span style="float:left;"><b>Size:</b> 22m²</span><br> -->
								<span style="float:left;"><b>Max People:</b> 2</span><br>
								<span style="float:left;"><b>Stock:</b> 
								<?php foreach ($checkSupertv as $key => $value) { ?>
									<?php if($value['stock'] < 1){ ?>
										Out of Stock
									<?php }else{?>
										<?php if($value['stock'] == 1){ ?>
											<?php echo $value['stock'];?> room
										<?php }else{ ?>
											<?php echo $value['stock'];?> rooms
										<?php } ?>
									<?php } ?>
								<?php } ?> </span><br>
							</article>
						</div>
						<?php foreach ($checkSupertv as $key => $value) { ?>
							<?php if($value['stock'] > 0){ ?>
								<center><a style="color:#fff;" class="btn btn-primary" data-toggle="modal" data-target="#modalSupertv">Add Room</a></center>
							<?php }else{ ?>
								<code style="background-color:#ccc;">MAX ROOM REACHED!</code>
							<?php } ?>
						<?php } ?>
					</div>
					</center>
				</div>

				<div class="col-sm-4 top20 mar20">
					<center>
					<div class="card5 bottom20">
						<span></span>
						<center>
							<img src="<?php echo base_url();?>assets/images/accomodation/Superior Twin.jpg">
							<h5 class="top20" style="color:#ed1a43;">Superior Twin non-TV</h5>
						</center>
						<div class="col-sm-12">
							<article style="padding-bottom:10px;">
								<span style="float:left;"><b>Price:</b> IDR 435.000/room/night</span><br>
								<!-- <span style="float:left;"><b>Size:</b> 22m²</span><br> -->
								<span style="float:left;"><b>Max People:</b> 2</span><br>
								<span style="float:left;"><b>Stock:</b> 
								<?php foreach ($checkSuperntv as $key => $value) { ?>
									<?php if($value['stock'] < 1){ ?>
										Out of Stock
									<?php }else{?>
										<?php if($value['stock'] == 1){ ?>
											<?php echo $value['stock'];?> room
										<?php }else{ ?>
											<?php echo $value['stock'];?> rooms
										<?php } ?>
									<?php } ?>
								<?php } ?> </span><br>
							</article>
						</div>
						<?php foreach ($checkSuperntv as $key => $value) { ?>
							<?php if($value['stock'] > 0){ ?>
								<center><a style="color:#fff;" class="btn btn-primary" data-toggle="modal" data-target="#modalSuperntv">Add Room</a></center>
							<?php }else{ ?>
								<code style="background-color:#ccc;">MAX ROOM REACHED!</code>
							<?php } ?>
						<?php } ?>
					</div>
					</center>
				</div>
				<div class="col-sm-4 top20 mar20">
					<center>
					<div class="card5 bottom20">
						<span></span>
						<center>
							<img src="<?php echo base_url();?>assets/images/accomodation/Standard Twin.jpg">
							<h5 class="top20" style="color:#ed1a43;">Standard Twin with TV</h5>
						</center>
						<div class="col-sm-12">
							<article style="padding-bottom:10px;">
								<span style="float:left;"><b>Price:</b> IDR 425.000/room/night</span><br>
								<!-- <span style="float:left;"><b>Size:</b> 46m²</span><br> -->
								<span style="float:left;"><b>Max People:</b> 2</span><br>
								<span style="float:left;"><b>Stock:</b> 
								<?php foreach ($checkStandtv as $key => $value) { ?>
									<?php if($value['stock'] < 1){ ?>
										Out of Stock
									<?php }else{?>
										<?php if($value['stock'] == 1){ ?>
											<?php echo $value['stock'];?> room
										<?php }else{ ?>
											<?php echo $value['stock'];?> rooms
										<?php } ?>
									<?php } ?>
								<?php } ?> </span><br>
							</article>
						</div>
						<?php foreach ($checkStandtv as $key => $value) { ?>
							<?php if($value['stock'] > 0){ ?>
								<center><a style="color:#fff;" class="btn btn-primary" data-toggle="modal" data-target="#modalStandtv">Add Room</a></center>
							<?php }else{ ?>
								<code style="background-color:#ccc;">MAX ROOM REACHED!</code>
							<?php } ?>
						<?php } ?>
					</div>
					</center>
				</div>
				<div class="col-sm-4 top20 mar20">
					<center>
					<div class="card5 bottom20">
						<span></span>
						<center>
							<img src="<?php echo base_url();?>assets/images/accomodation/Standard Twin.jpg">
							<h5 class="top20" style="color:#ed1a43;">Standard Twin non-TV</h5>
						</center>
						<div class="col-sm-12">
							<article style="padding-bottom:10px;">
								<span style="float:left;"><b>Price:</b> IDR 395.000/room/night</span><br>
								<!-- <span style="float:left;"><b>Size:</b> 46m²</span><br> -->
								<span style="float:left;"><b>Max People:</b> 2</span><br>
								<span style="float:left;"><b>Stock:</b> 
								<?php foreach ($checkStandntv as $key => $value) { ?>
									<?php if($value['stock'] < 1){ ?>
										Out of Stock
									<?php }else{?>
										<?php if($value['stock'] == 1){ ?>
											<?php echo $value['stock'];?> room
										<?php }else{ ?>
											<?php echo $value['stock'];?> rooms
										<?php } ?>
									<?php } ?>
								<?php } ?> </span><br>
							</article>
						</div>
						<?php foreach ($checkStandntv as $key => $value) { ?>
							<?php if($value['stock'] > 0){ ?>
								<center><a style="color:#fff;" class="btn btn-primary" data-toggle="modal" data-target="#modalStandntv">Add Room</a></center>
							<?php }else{ ?>
								<code style="background-color:#ccc;">MAX ROOM REACHED!</code>
							<?php } ?>
						<?php } ?>
					</div>
					</center>
				</div>
				<div class="col-sm-4 top20 mar20">
					<center>
					<div class="card5 bottom20">
						<span></span>
						<center>
							<img src="<?php echo base_url();?>assets/images/accomodation/bs/boarder/boarder.jpg">
							<h5 class="top20" style="color:#ed1a43;">Boarder Room</h5>
						</center>
						<div class="col-sm-12">
							<article style="padding-bottom:10px;">
								<span style="float:left;"><b>Price:</b> IDR 245.000/room/night</span><br>
								<!-- <span style="float:left;"><b>Size:</b> 22m²</span><br> -->
								<span style="float:left;"><b>Max People:</b> 2</span><br>
								<span style="float:left;"><b>Stock:</b> 
								<?php foreach ($checkBoarder as $key => $value) { ?>
									<?php if($value['stock'] < 1){ ?>
										Out of Stock
									<?php }else{?>
										<?php if($value['stock'] == 1){ ?>
											<?php echo $value['stock'];?> room
										<?php }else{ ?>
											<?php echo $value['stock'];?> rooms
										<?php } ?>
									<?php } ?>
								<?php } ?> </span><br>
							</article>
						</div>
						<?php foreach ($checkBoarder as $key => $value) { ?>
							<?php if($value['stock'] > 0){ ?>
								<center><a style="color:#fff;" class="btn btn-primary" data-toggle="modal" data-target="#modalBoarder">Add Room</a></center>
							<?php }else{ ?>
								<code style="background-color:#ccc;">MAX ROOM REACHED!</code>
							<?php } ?>
						<?php } ?>
					</div>
					</center>
				</div>

                                <div class="col-sm-8 top20 mar20 bottom20" style="top:150px;">
					<center>
						<table class="table" border="2">
							<thead>
								<tr>
									<td class="text-justify" style="color:red;">
										
											1 boarder room consists of 2 people. If you need a roommate, kindly contact our contact persons though we're afraid we can't promise to get you one. To keep securing your slot, you may pay first for the whole room and we'll refund it after we've gotten you a roommate. Please note that boarder rooms are strictly for those with the same gender as there will be 2 different towers for each gender.
										
									</td>
								</tr>
							</thead>
						</table>
					</center>
				</div>

			</div>
			
		</div>

		<!-- Circles which indicates the steps of the form: -->
		<div class="col-md-12" style="text-align:center;margin-top:40px;">
		  <span class="field-number"></span>
		  <span class="step active"></span>
		  <span class="step"></span>
		  <span class="step"></span>
		</div>

<!-- ///////////////////////////////////Modal Section//////////////////////////////////-->
<!-- ########### MODAL 2 ##############-->
<?php echo form_open('user/accommodation_form'); ?>
<div class="modal fade" id="modalSuite" tabindex="-1" role="dialog" aria-labelledby="modalSuite">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalSuite">Booking Details</h4>
      </div>
    <!-- BODY -->
      <div class="modal-body">
      	<div class="row">
	      <center>
	      <label>Quantity</label>
	      <table>
			<tr>
				<td>
					<button class="btn btn-danger decrease-number-btn">-</button>
				</td>
				<td>
				<span class="field-number">0</span>
				<input type="hidden" class="field-value" name="field" id="field-suite">
				<input type="hidden" class="field-caps" value="0">
				</td>
				<td>
					<button class="btn btn-success increase-number-btn">+</button>
				</td>
			</tr>
		  </table>
		  </center>
	    
	      <span class="night-number hidden">0</span>
		<input type="hidden" class="night-value" name="night" id="night-suite">
	          	
      	<div class="col-sm-12">
	      <div class="form-group">
	      	<div class="inputGroupContainer">
	      		<label>Check In Date</label> 
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					<span class="date1 hidden">0</span>
					<input type="text" class="form-control validate datepicker" placeholder="MM/DD/YYYY" name="date1" data-select="date">
				</div>
			</div>
	      </div>
	    </div>
	    <div class="col-sm-12">
	      <div class="form-group">
	      	<div class="inputGroupContainer">
	      		<label>Check Out Date</label> 
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					<span class="date2 hidden">0</span>
					<input type="text" class="form-control validate datepicker" placeholder="MM/DD/YYYY" name="date2" data-select="date">
				</div>
			</div>
	      </div>
	    </div>
      </div>
     </div>

      <div class="modal-footer">     
      	<input type="hidden" name="code" value="suite_room:Suite">   
        <button type="submit" class="btn btn-primary saveParticipant">Save</button>
      </div>      
    </div>

  </div>
</div>
<?php echo form_close(); ?>
<!-- ########### MODAL 3 ##############-->
<?php echo form_open('user/accommodation_form'); ?>
<div class="modal fade" id="modalDeluxe" tabindex="-1" role="dialog" aria-labelledby="modalDeluxe">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalDeluxe">Booking Details</h4>
      </div>
    <!-- BODY -->
      <div class="modal-body">
      	<div class="row">
	      <center>
	      <label>Quantity</label>
	      <table>
			<tr>
				<td>
				<button class="btn btn-danger decrease-number-btn">-</button>
				</td>
				<td>
				<span class="field-number">0</span>
				<input type="hidden" class="field-value" name="field" id="field-deluxe">
				<input type="hidden" class="field-caps" value="0">
				</td>
				<td>
				<button class="btn btn-success increase-number-btn">+</button>
				</td>
			</tr>
		  </table>
		  </center>
	    
	    <span class="night-number hidden">0</span>
		<input type="hidden" class="night-value" name="night" id="night-deluxe">

      	<div class="col-sm-12">
	      <div class="form-group">
	      	<div class="inputGroupContainer">
	      		<label>Check In Date</label> 
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					<span class="date1 hidden">0</span>
					<input type="text" class="form-control validate datepicker" placeholder="MM/DD/YYYY" name="date1" data-select="date">
				</div>
			</div>
	      </div>
	    </div>
	    <div class="col-sm-12">
	      <div class="form-group">
	      	<div class="inputGroupContainer">
	      		<label>Check Out Date</label> 
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					<span class="date2 hidden">0</span>
					<input type="text" class="form-control validate datepicker" placeholder="MM/DD/YYYY" name="date2" data-select="date">
				</div>
			</div>
	      </div>
	    </div>
      </div>
     </div>

      <div class="modal-footer">
      	<input type="hidden" name="code" value="deluxe_room:Deluxe">        
        <button type="submit" class="btn btn-primary saveParticipant">Save</button>
      </div>      
    </div>

  </div>
</div>
<?php echo form_close(); ?>
<!-- ########### MODAL 4 ##############-->
<?php echo form_open('user/accommodation_form'); ?>
<div class="modal fade" id="modalSupertv" tabindex="-1" role="dialog" aria-labelledby="modalSupertv">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalSupertv">Booking Details</h4>
      </div>
    <!-- BODY -->
      <div class="modal-body">
      	<div class="row">
	      <center>
	      <label>Quantity</label>
	      <table>
			<tr>
				<td>
				<button class="btn btn-danger decrease-number-btn">-</button>
				</td>
				<td>
				<span class="field-number">0</span>
				<input type="hidden" class="field-value" name="field" id="field-supertv">
				<input type="hidden" class="field-caps" value="0">
				</td>
				<td>
				<button class="btn btn-success increase-number-btn">+</button>
				</td>
			</tr>
		  </table>
		  </center>
	    
	    <span class="night-number hidden">0</span>
		<input type="hidden" class="night-value" name="night" id="night-supertv">
	          	
      	<div class="col-sm-12">
	      <div class="form-group">
	      	<div class="inputGroupContainer">
	      		<label>Check In Date</label> 
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					<span class="date1 hidden">0</span>
					<input type="text" class="form-control validate datepicker" placeholder="MM/DD/YYYY" name="date1" data-select="date">
				</div>
			</div>
	      </div>
	    </div>
	    <div class="col-sm-12">
	      <div class="form-group">
	      	<div class="inputGroupContainer">
	      		<label>Check Out Date</label> 
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					<span class="date2 hidden">0</span>
					<input type="text" class="form-control validate datepicker" placeholder="MM/DD/YYYY" name="date2" data-select="date">
				</div>
			</div>
	      </div>
	    </div>
      </div>
     </div>

      <div class="modal-footer">
      	<input type="hidden" name="code" value="superior_twin_tv:Superior Twin with TV">        
        <button type="submit" class="btn btn-primary saveParticipant">Save</button>
      </div>      
    </div>

  </div>
</div>
<?php echo form_close(); ?>
<!-- ########### MODAL 5 ##############-->
<?php echo form_open('user/accommodation_form'); ?>
<div class="modal fade" id="modalSuperntv" tabindex="-1" role="dialog" aria-labelledby="modalSuperntv">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalSuperntv">Booking Details</h4>
      </div>
    <!-- BODY -->
      <div class="modal-body">
      	<div class="row">
	      <center>
	      <label>Quantity</label>
	      <table>
			<tr>
				<td>
				<button class="btn btn-danger decrease-number-btn">-</button>
				</td>
				<td>
				<span class="field-number">0</span>
				<input type="hidden" class="field-value" name="field" id="field-superntv">
				<input type="hidden" class="field-caps" value="0">
				</td>
				<td>
				<button class="btn btn-success increase-number-btn">+</button>
				</td>
			</tr>
		  </table>
		  </center>
	    
	    <span class="night-number hidden">0</span>
		<input type="hidden" class="night-value" name="night" id="night-superntv">

      	<div class="col-sm-12">
	      <div class="form-group">
	      	<div class="inputGroupContainer">
	      		<label>Check In Date</label> 
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					<span class="date1 hidden">0</span>
					<input type="text" class="form-control validate datepicker" placeholder="MM/DD/YYYY" name="date1" data-select="date">
				</div>
			</div>
	      </div>
	    </div>
	    <div class="col-sm-12">
	      <div class="form-group">
	      	<div class="inputGroupContainer">
	      		<label>Check Out Date</label> 
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					<span class="date2 hidden">0</span>
					<input type="text" class="form-control validate datepicker" placeholder="MM/DD/YYYY" name="date2" data-select="date">
				</div>
			</div>
	      </div>
	    </div>
      </div>
     </div>

      <div class="modal-footer">
      	<input type="hidden" name="code" value="superior_twin_non_tv:Superior Twin non-TV">                
        <button type="submit" class="btn btn-primary saveParticipant">Save</button>
      </div>      
    </div>

  </div>
</div>
<?php echo form_close(); ?>
<!-- ########### MODAL 6 ##############-->
<?php echo form_open('user/accommodation_form'); ?>
<div class="modal fade" id="modalStandtv" tabindex="-1" role="dialog" aria-labelledby="modalStandtv">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalStandtv">Booking Details</h4>
      </div>
    <!-- BODY -->
      <div class="modal-body">
      	<div class="row">
	      <center>
	      <label>Quantity</label>
	      <table>
			<tr>
				<td>
				<button class="btn btn-danger decrease-number-btn">-</button>
				</td>
				<td>
				<span class="field-number">0</span>
				<input type="hidden" class="field-value" name="field" id="field-standtv">
				<input type="hidden" class="field-caps" value="0">
				</td>
				<td>
				<button class="btn btn-success increase-number-btn">+</button>
				</td>
			</tr>
		  </table>
		  </center>
	    
			<span class="night-number hidden">0</span>
			<input type="hidden" class="night-value" name="night" id="night-standtv">
	          	
      	<div class="col-sm-12">
	      <div class="form-group">
	      	<div class="inputGroupContainer">
	      		<label>Check In Date</label> 
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					<span class="date1 hidden">0</span>
					<input type="text" class="form-control validate datepicker" placeholder="MM/DD/YYYY" name="date1" data-select="date">
				</div>
			</div>
	      </div>
	    </div>
	    <div class="col-sm-12">
	      <div class="form-group">
	      	<div class="inputGroupContainer">
	      		<label>Check Out Date</label> 
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					<span class="date2 hidden">0</span>
					<input type="text" class="form-control validate datepicker" placeholder="MM/DD/YYYY" name="date2" data-select="date">
				</div>
			</div>
	      </div>
	    </div>
      </div>
     </div>

      <div class="modal-footer">
      	<input type="hidden" name="code" value="standard_twin_tv:Standard Twin with TV">                
        <button type="submit" class="btn btn-primary saveParticipant">Save</button>
      </div>      
    </div>

  </div>
</div>
<?php echo form_close(); ?>
<!-- ########### MODAL 7 ##############-->
<?php echo form_open('user/accommodation_form'); ?>
<div class="modal fade" id="modalStandntv" tabindex="-1" role="dialog" aria-labelledby="modalStandntv">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalStandntv">Booking Details</h4>
      </div>
    <!-- BODY -->
      <div class="modal-body">
      	<div class="row">
	      <center>
	      <label>Quantity</label>
	      <table>
			<tr>
				<td>
				<button class="btn btn-danger decrease-number-btn">-</button>
				</td>
				<td>
				<span class="field-number">0</span>
				<input type="hidden" class="field-value" name="field" id="field-standntv">
				<input type="hidden" class="field-caps" value="0">
				</td>
				<td>
				<button class="btn btn-success increase-number-btn">+</button>
				</td>
			</tr>
		  </table>
		  </center>
	    
			<span class="night-number hidden">0</span>
			<input type="hidden" class="night-value" name="night" id="night-standntv">
	          	
      	<div class="col-sm-12">
	      <div class="form-group">
	      	<div class="inputGroupContainer">
	      		<label>Check In Date</label> 
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					<span class="date1 hidden">0</span>
					<input type="text" class="form-control validate datepicker" placeholder="MM/DD/YYYY" name="date1" data-select="date">
				</div>
			</div>
	      </div>
	    </div>
	    <div class="col-sm-12">
	      <div class="form-group">
	      	<div class="inputGroupContainer">
	      		<label>Check Out Date</label> 
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					<span class="date2 hidden">0</span>
					<input type="text" class="form-control validate datepicker" placeholder="MM/DD/YYYY" name="date2" data-select="date">
				</div>
			</div>
	      </div>
	    </div>
      </div>
     </div>

      <div class="modal-footer">
      	<input type="hidden" name="code" value="standard_twin_non_tv:Standard Twin non-TV">                
        <button type="submit" class="btn btn-primary saveParticipant">Save</button>
      </div>      
    </div>

  </div>
</div>
<?php echo form_close(); ?>
<!-- ########### MODAL 1 ##############-->
<?php echo form_open('user/accommodation_form'); ?>
<div class="modal fade" id="modalBoarder" tabindex="-1" role="dialog" aria-labelledby="modalBoarder">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalBoarder">Booking Details</h4>
      </div>
    <!-- BODY -->
      <div class="modal-body">
      	<div class="row">
	      <center>
	      <label>Quantity</label>
	      <table>
			<tr>
				<td>
				<button class="btn btn-danger decrease-number-btn">-</button>
				</td>
				<td>
				<span class="field-number">0</span>
				<input type="hidden" class="field-value" name="field" id="field-boarder">
				<input type="hidden" class="field-caps" value="0">
				</td>
				<td>
				<button class="btn btn-success increase-number-btn">+</button>
				</td>
			</tr>
		  </table>
		  </center>
	    
			<span class="night-number hidden">0</span>
			<input type="hidden" class="night-value" name="night" id="night-boarder">
				
	          	
      	<div class="col-sm-12">
	      <div class="form-group">
	      	<div class="inputGroupContainer">
	      		<label>Check In Date</label> 
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					<span class="date1 hidden">0</span>
					<input type="text" class="form-control datepicker" placeholder="MM/DD/YYYY" name="date1" data-select="date">
				</div>
			</div>
	      </div>
	    </div>
	    <div class="col-sm-12">
	      <div class="form-group">
	      	<div class="inputGroupContainer">
	      		<label>Check Out Date</label> 
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					<span class="date2 hidden">0</span>
					<input type="text" class="form-control datepicker" placeholder="MM/DD/YYYY" name="date2" data-select="date">
				</div>
			</div>
	      </div>
	    </div>
      </div>
     </div>

      <div class="modal-footer">        
      	<input type="hidden" name="code" value="boarder_room:Boarder">
        <button type="submit" class="btn btn-primary saveParticipant">Save</button>
      </div>      
    </div>

  </div>
</div>
<?php echo form_close(); ?>
</div>
