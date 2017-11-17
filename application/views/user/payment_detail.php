<div class="container margin-50 center">
	<div class="content">

		<h1>Payment Detail</h1>
		
		<div class="col-sm-8 offset-sm-2 top20 bottom20">
	
		<h4>Dear <?php echo $pic_name;?>,</h4>
	
		<h5 class="top20 bottom20">Thank you for creating an order. Here are your payment details:  </h5>
		<div class="">
			<table class="table" border="2">
				<tr>
					<td>Invoice ID: <b><?php echo $invoice['invoice_id'];?></b></td>
					<td>Created on: <?php echo $invoice['created_at'];?></td>
					<td colspan="2">Total Registration Fee: 
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
		      			<th>Field</th>
		      			<th>Quantity</th>
		      			<th>Price</th>
		      			<th style="text-align:center;">Total</th>
	      			</tr>
	      		</thead>
	      		
	      		<tbody>
	      			<?php
	      			$total = 0;
	      			foreach ($detail as $key => $value) {
	      				$total += ($value['qty']*$value['price'])
	      			?>
	      			<tr>
	      			
	      				<td><?php echo $key+1; ?></td>	      				
	      				<td><?php echo $value['name']; ?></td>
	      				<td><?php echo $value['qty']; ?></td>
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
	      					$angka = ($value['qty']*$value['price']);
							$decimal ="0";
							$pemisah_desimal =",";
							$pemisah_ribuan =".";
 
							echo number_format($angka, $decimal, $pemisah_desimal, $pemisah_ribuan); 
	      				?></span>
	      				</td>

	      			</tr>
	      			<?php
	      			}
	      			?>
	      			<?php 
					$fee = 6000;
					foreach ($ins as $key => $value) { ?>
					<?php if($value['country'] != 'indonesia'){ ?>
						<tr>
							<td colspan="4"><b>Administration Fee</b></td>
							<td>IDR <span style="float:right;">
								<?php 
									$angka = $fee;
									$decimal ="0";
									$pemisah_desimal =",";
									$pemisah_ribuan =".";
		 
									echo number_format($angka, $decimal, $pemisah_desimal, $pemisah_ribuan);
								?></span>
							</td>
						</tr>
						<tr>
							<td colspan="4"><b>Total Registration Fee</b></td>
							<td>IDR <span style="float:right;">
								<?php 
									$angka = $total+$fee;
									$decimal ="0";
									$pemisah_desimal =",";
									$pemisah_ribuan =".";
		 
									echo number_format($angka, $decimal, $pemisah_desimal, $pemisah_ribuan);
								?></span>
							</td>
						</tr>
					<?php }else{ ?>
						<tr>
							<td colspan="4"><b>Total Registration Fee</b></td>
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
				<!-- <h6 style="text-align:justify;">The administration fee of IDR 6.000 applies per transaction. With that, as well as to minimize additional charges from WU per transaction, we would suggest you to create only 1 registration invoice and pay all your invoices (both registration and accommodation) under the same payment. In that case, you may upload the same payment proof in all paid invoices.</h6> -->
				<table class="table" border="2">
				<thead>
					<tr>
						<td><small><span class="text-justify">The administration fee of IDR 6.000 applies per transaction. With that, as well as to minimize additional charges from WU per transaction, we would suggest you to create only 1 registration invoice and pay all your invoices (both registration and accommodation) under the same payment. In that case, you may upload the same payment proof in all paid invoices.</span></small></td>
					</tr></thead>
				</table>
				<h5 style="color:#ed1a43;" class="top20"><b>For International Payment </b></h5>
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
