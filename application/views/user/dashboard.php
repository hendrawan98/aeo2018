<div class='row margin-50' style="margin:15px;">
	<div class="row" style="margin-top: 25px;">
		<div class="col-md-12">

			<!-- div send delegates -->
			<div class="col-md-4" style="padding-right: 0px; padding-left: 0px;">
				
				<div class="col-md-12">
					<div class="card blue lighten-1 hoverable" style="background-color: #fe8907 !important;min-height: 400px !important; height: 815px;">
						<div class="card-action white-text" style="border-top: 0px;">
							<h5 class="card-title"><center>Competition and Accommodation</center></h5>
						</div>
						<div class="card-content white-text center">
							
							<div class="bottom20" id="piechart" style="width: 370px; height: 250px;"></div>
								
							
							<div class="bottom20">
								<a class="btn btn-primary" href="<?php echo base_url();?>send-delegates">Send delegates</a>
							</div>

							<div class="bottom20" id="columnchart_values" style="width: 370px; height: 250px;"></div>
								
							
							<div class="bottom20">
								<a class="btn btn-primary" href="<?php echo base_url();?>accommodation-form">Book accommodation</a>
							</div>
						</div>
					</div>
				</div>
	
				<div class="col-md-12" style="padding-top: 0px;">
					<div class="card blue lighten-1 hoverable" style="background-color: #fe8907 !important;min-height: 400px !important;">
						<div class="card-action white-text" style="border-top: 0px;">
							<h5 class="card-title"><center>Book or Upload Flight Ticket</center></h5>
						</div>

						<div class="card-content white-text center">
							<div>
								<form action="<?php echo base_url();?>user/doFlight" method="post" enctype="multipart/form-data">
							    	<?php foreach ($list as $key => $value) { ?>
									    <?php if($value['flight_ticket'] == ''){?>
									     	<div class="col-sm-12">
										    	<div class="content">
													<input type="file" name="flight_ticket" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
													<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" viewBox="0 0 40 30"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
												</div>
											</div>
											<div class="col-sm-12 bottom20 center">
												<button class="btn btn-success col-sm-6" style="float:none;" type="submit" name="action">Submit</button>
											</div>
											<div class="col-sm-12 top20 bottom20 center">
												<h4>Looking for a ticket? Buy at <a href="https://www.traveloka.com/en/" style="text-decoration: none">Traveloka.com</a></h4>
											</div>
									    <?php }else{?>
									    	<div class="col-sm-12">
									    		<div class="content">
									    			<button class="inputfile inputfile-1"></button>
													<label><a target="_blank" href="<?php echo base_url();?><?php echo $value['flight_ticket'];?>" style="color:#fff;text-decoration:none;"><i class="fa fa-eye"></i><span> View flight ticket</span></a></label>
									    		</div>
									    	</div>
									    <?php }?>
									<?php } ?>
							  	</form>
							</div>
						</div>
					</div>
				</div>	
			</div>

			<!-- div Institution Profile -->
			<div class="col-md-4" style="padding-right: 0px; padding-left: 0px;">
				<div class="col-md-12">
					<div class="card blue lighten-1 hoverable" style="background-color: #fe8907 !important;min-height: 400px !important;">
						<div class="card-action white-text" style="border-top: 0px;">
							<h5 class="card-title"><center>Institution Profile</center></h5>
						</div>
						<div class="card-content white-text center">
							<div class="img-content">
								<img class="img-size" src="<?php echo base_url();?><?php echo $userdata['institution_logo']?>">
							</div>
							<div class="insititution-title bottom20">
								<h3><img class="flags" style="margin-right: 5px;" src="assets/flags/<?php echo $userdata['country']?>.png"><?php echo $userdata['institution']?></h3>
							</div>
							<div class="noble-dream" style="margin-top:20px;">
								<h5>Your noble dream: </h5>
								<?php if($userdata['noble_dream'] == ''){ ?>
									<input type="hidden" id="id" value="<?php echo $userdata['id'];?>">
									<button class="btn btn-primary" data-toggle="modal" data-target="#modalDream" class="btn btn-primary editDream">Add noble dream</button>
								<?php }else{ ?>
									<h4><i>&quot;<?php echo $userdata['noble_dream'];?>&quot;</i></h4>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>

				
			</div>

			<!-- Div Instagram -->
			<div class="col-md-4" style="padding-right: 0px; padding-left: 0px;">

				<div class="col-md-12">
					<div class="card blue lighten-1 hoverable scroll" style="background-color: #fe8907 !important;min-height: 193px !important; height: 193px;">
						<div class="card-action white-text" style="border-top: 0px;">
							<h5 class="card-title"><center>Important Dates</center></h5>
						</div>
						<div class="card-content white-text center">
							<p>20 - 25<sup>th</sup> open registration</p>
							<p>20 - 25<sup>th</sup> open registration</p>
							<p>20 - 25<sup>th</sup> open registration</p>
							<p>20 - 25<sup>th</sup> open registration</p>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="card blue lighten-1 hoverable scroll" style="background-color: #fe8907 !important;min-height: 193px !important; height: 193px;">
						<div class="card-action white-text" style="border-top: 0px;">
							<h5 class="card-title"><center>News</center></h5>
						</div>
						<div class="card-content white-text">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
						</div>
					</div>
				</div>
				


			</div>
			<div class="col-md-8">
				<div class="card blue lighten-1 hoverable scroll" style="background-color: #fe8907 !important;min-height: 400px !important; height: 400px;">
					<div class="card-action white-text" style="border-top: 0px;">
						<h5 class="card-title"><center>Transaction History</center></h5>
					</div>
					<div class="card-content white-text">
						<table style="width: 100%;" border="1">
							<thead>
								<tr>
									<th>No.</th>
									<th>Invoice ID</th>
									<th>Total</th>
									<th>Detail</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach ($getData as $key => $value) {	
								?>
								<tr>
									<td><?php echo $key+1;?></td>
									<td><?php echo $value['invoice_id'];?></td>
									<td>IDR 
									<?php
										$angka = $value['total_price'];
										$decimal ="0";
										$pemisah_desimal =",";
										$pemisah_ribuan =".";
			 
										echo number_format($angka, $decimal, $pemisah_desimal, $pemisah_ribuan);
									?>
									</td>
									<td>
										<?php 
											$isi = $value['invoice_id'];
											$firstnumber = substr($isi, 0, 1);
											if($firstnumber == 1){
										?>
											<input type="hidden" name="idheader" value="<?php echo $value['invoice_id'];?>"><span class="detailTrans" style="color:#07acf7;cursor:pointer;">Details</span>
										<?php }else{ ?>
											<input type="hidden" name="idheader" value="<?php echo $value['invoice_id'];?>"><span class="detailAccom" style="color:#07acf7;cursor:pointer;">Details</span>								
										<?php } ?>
									</td>
			                        <!--ACTION-->
			                        <?php
			                        if($value['status'] == 0){
			                        	?>
			                                                
									<td>
											<!-- <center>
											<a class="btn btn-success" href="<?php echo base_url();?>dashboard/confirmation">Confirm Payment</a>
											<a class="btn btn-danger" href="<?php echo base_url();?>delete/transaction/<?php echo $value['header_id'];?>">Cancel Invoice</a>
											</center> -->
											<?php
											$confirmStats = false; 
					                        foreach ($confirmation as $key => $confirm) {
					                        	if($confirm['invoice_id'] == $value['invoice_id']){
					                        		$confirmStats = true;
					                    			echo "<center><span style='color:#feb20e;'>WAITING</span></center>";    		
					                        	}                        	
					                        }
					                        if($confirmStats == false){ ?>
						                        <center>
												<a class="btn btn-success" href="<?php echo base_url();?>dashboard/confirmation">Confirm Payment</a>
												<a class="btn btn-danger" href="<?php echo base_url();?>delete/transaction/<?php echo $value['invoice_id'];?>">Cancel Invoice</a>
												</center>
					                        <?php } ?>
									</td>
									<?php
									}// END IF STATUS 1
									else if($value['status'] == -1){
										echo "<td><center><span style='color:red;'>REJECTED</span></center></td>";
			                        }
									else{ ?>		

										<td style="vertical-align:middle;" rowspan="<?php echo $countApproved;?>">
											<center>
												<a class="btn btn-primary" href="<?php echo base_url();?>participantform2">Edit Participant Data</a>
											</center>					
										</td>
										<?php
										}// END ELSE
									?>	

								</tr>	
								<?php 
								} // END FOREACH
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card blue lighten-1 hoverable" style="background-color: #fe8907 !important; min-height: 400px !important; height: 400px; width: 100%;">
					<div class="card-content white-text">
						<h5 class="card-title" style="margin-top: 0px;"><center>Instagram</center></h5>
						<div align="center">
							<script src="//lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/3996d1a1b0605a48b200d252d772a745.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="height: 100%; border: 0; overflow: hidden;"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalParticipant" tabindex="-1" role="dialog" aria-labelledby="modalParticipant">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalParticipant">Competition Transaction Details</h4>
      </div>
      <div class="modal-body">      	
      	<table class="table">
      		<thead>
      			<tr>
      				<th style="text-align:center;">No</th>
	      			<th style="text-align:center;">Field</th>
	      			<th style="text-align:center;">Quantity</th>
	      			<th style="text-align:center;">Price</th>
	      			<th style="text-align:center;">Total</th>
      			</tr>
      		</thead>
      		<tbody id="contentTable">
      			
      		</tbody>
      	</table>
	    
	    
      </div>      
    </div>
  </div>
</div>

<!--Modal Accom-->

<div class="modal fade" id="modalAccom" tabindex="-1" role="dialog" aria-labelledby="modalAccom" style="">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="min-width:800px;left:-100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalAccom">Accommodation Details</h4>
      </div>
      <div class="modal-body">      	
      	<table class="table">
      		<thead>
      			<tr>
      				<th style="text-align:center;">No</th>
	      			<th style="text-align:center;">Room Type</th>
	      			<th style="text-align:center;">Quantity</th>
	      			<th style="text-align:center;">Nights</th>
	      			<th style="text-align:center;">Price</th>
	      			<th style="text-align:center;">Total</th>
      			</tr>
      		</thead>
      		<tbody id="contentTable2">
      			
      		</tbody>
      	</table>
	    
	    
      </div>      
    </div>
  </div>
</div>

<div class="modal fade" id="modalDream" tabindex="-1" role="dialog" aria-labelledby="modalDreamLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalDreamLabel">Add noble dream</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <textarea class="form-control" id="noble_dream" placeholder="Add your noble dream here..." name="noble_dream"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success saveDream">Submit</button>
      </div>
    </div>
  </div>
</div>
