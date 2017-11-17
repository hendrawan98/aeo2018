<div class="container-fluid bg-payment">
<div class="container top20 bottom20" style="min-height: 600px;">

	<div class="col-sm-12 top20 bottom20">
		<center>
			<h1>Payment Details</h1>
		</center>
	</div>
	<div class="col-sm-8 offset-sm-2 top20 bottom20">
	
		<h4>Dear <?php echo $pic_name;?>,</h4>
	
		<h5 class="top20 bottom20">Thank you for creating an order. Here are your payment details:  </h5>
		<div class="bottom20">
			<table class="table" border="2">
				<tr>
					<td>Invoice ID: <b><?php echo $invoice['invoice_id'];?></b></td>
					<td>Created on: <?php echo $invoice['created_at'];?></td>
					<td colspan="2">Total Accommodation Fee: 
					<b><br>IDR <?php 
							$angka = $invoice['total_price'];
							$decimal ="0";
							$pemisah_desimal =",";
							$pemisah_ribuan =".";
 
							echo number_format($angka, $decimal, $pemisah_desimal, $pemisah_ribuan);
						?></b>
					</td>
				</tr>
			</table>
			<table class="table">
				<thead>
	      			<tr>
	      				<th>No.</th>
		      			<th>Room Type</th>
		      			<th>Quantity</th>
		      			<th>Nights</th>
		      			<th>Price</th>
		      			<th style="text-align:center;">Total</th>
	      			</tr>
	      		</thead>
	      		
	      		<tbody>
	      			<?php
	      			$total = 0;
	      			$totalqty = 0;
	      			$deposit = 200000;
	      			$noItem = 0;
	      			foreach ($detail as $key => $value) {
	      				$total += ($value['quantity']*$value['price']*$value['nights'])
	      			?>
	      			<tr>
	      			
	      				<td><?php echo $key+1; ?></td>	      				
	      				<td><?php echo $value['name']; ?></td>
	      				<td><?php if($value['quantity'] == 1){ ?><?php echo $value['quantity'];?> Room<?php }else{ ?><?php echo $value['quantity'];?> Rooms<?php } ?></td>
	      				<td><?php if($value['nights'] == 1){ ?><?php echo $value['nights'];?> Night<?php }else{ ?><?php echo $value['nights'];?> Nights<?php } ?></td>
	      				<td>IDR <span>
	      					<?php 
	      						$angka = $value['price'];
								$decimal ="0";
								$pemisah_desimal =",";
								$pemisah_ribuan =".";
	 
								echo number_format($angka, $decimal, $pemisah_desimal, $pemisah_ribuan); 
	      					?></span>
	      				</td>
	      				<td>IDR <span style="float:right;"> 
	      				<?php 
	      					$angka = ($value['quantity']*$value['price']*$value['nights']);
							$decimal ="0";
							$pemisah_desimal =",";
							$pemisah_ribuan =".";
 
							echo number_format($angka, $decimal, $pemisah_desimal, $pemisah_ribuan); 
	      				?></span>
	      				</td>

	      			</tr>
	      			<?php 
	      				$totalqty+=$value['quantity'];
                                        if($value['name']=='Boarder'){
	      					$totalqty = $totalqty-$value['quantity'];
	      				}
	      				$noItem++;
	      				} //ENDFOREACH 
	      			?>

	      			<tr>
						<td><?php echo $noItem+1;?></td>
						<td>Deposit Fee</td>
						<td>
							<?php
								if($totalqty == 1){
									echo $totalqty." Room";
								}else{
									echo $totalqty." Rooms";
								}
							 	
								$total += ($totalqty*200000);//200.000 ITU DEPOSIT FEE ACCOM

							?>
						
						</td>
						<td><span style="float:center;"> - </span></td>
						<td>IDR <span><?php 
								$angka = $deposit;
								$decimal ="0";
								$pemisah_desimal =",";
								$pemisah_ribuan =".";
	 
								echo number_format($angka, $decimal, $pemisah_desimal, $pemisah_ribuan);
							?></span>
						</td>
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
					foreach ($ins as $key => $value) { ?>
					<?php if($value['country'] != 'indonesia'){ ?>
						<tr>
							<td colspan="5"><b>Total Accommodation Fee</b></td>
							<td>IDR <span style="float:right;">
								<?php 
									$angka = $total;
									$decimal ="0";
									$pemisah_desimal =",";
									$pemisah_ribuan =".";
		 
									echo number_format($angka, $decimal, $pemisah_desimal, $pemisah_ribuan);
								?></span>
							</td>
						</tr>
					<?php }else{ ?>
						<tr>
							<td colspan="5"><b>Total Accommodation Fee</b></td>
							<td>IDR <span style="float:right;">
								<?php 
									$angka = $total;
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

		<?php foreach ($ins as $key => $value) { ?>
			<?php if($value['country'] == 'indonesia'){ ?>
				<h5 style="color:#ed1a43;"><b>For National Payment </b></h5>
				<div class="mtd-info top20">
		            <h6 class="avenir-demibold"><img alt="Bank Central Asia - Asian English Olympics 2017" src="<?php echo base_url();?>assets/images/bca.png"></br>Bank Central Asia</h6>
		            <div class="info">
		                <b>Bank Account</b> 5271 577 771<br>
		                <b>Account Holder</b> Gerri Widiarta/Celia Fransisca
		            </div>
		        </div>
			<?php }else{ ?>
				<h5 style="color:#ed1a43;"><b>For International Payment </b></h5>
				<div class="mtd-info top20">
		            <h6 class="avenir-demibold"><img alt="Western Union - Asian English Olympics 2017" class="img-wu" src="<?php echo base_url();?>assets/images/Western-Union.png"></br></h6>
		            <div class="info">
		                <b>Name</b> Celia Fransisca<br>
						<b>Number</b> 6282284996269<br>
						<b>Street</b> BNEC House 1, Jl. U D/10 Kemanggisan<br>
						<b>City/Local</b> Jakarta Barat<br>
						<b>Postal Code</b> 11480<br>
						<b>Country</b> Indonesia<br>
		            </div>
		        </div>
			<?php } ?>
		<?php } ?>
		<div class="top20">
			<i>(You may take a screenshot of this page to keep your payment details)</i>
        </div>
        <div class="col-sm-12 top30" style="padding-left:0;padding-right:0;">
        	<a class="btn btn-primary" style="float:left;" href="<?php echo base_url();?>dashboard">Back to Dashboard</a>
        	<a class="btn btn-primary" style="float:right;" href="<?php echo base_url();?>dashboard/confirmation">Confirm Payment</a>
        </div>
	</div>

	<!-- Circles which indicates the steps of the form: -->
	<div class="col-md-12" style="text-align:center;margin-top:40px;">
	  <span class="field-number"></span>
	  <span class="step"></span>
	  <span class="step"></span>
	  <span class="step active"></span>
	</div>


</div>
</div>
