<div class="container margin-50 center">
	<div class="content">

		<h1>Cart</h1>

		<?php echo form_open('user/pay');?>
		
		<table class="table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Field Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th style="text-align:center;">Total</th>
				</tr>
			</thead>
			<tbody>
				<?php				
				$totalprice = 0;
				foreach($filledList as $key => $value){
				?>
				<tr>
					<td><?php echo $key+1;?> <input type="hidden" value="<?php echo $value['code'];?>" name="field[]"></td>
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
					<td><?php echo $value['qty'];?><input type="hidden" value="<?php echo $value['qty'];?>" name="qty[]"> 
					<?php if($value['name'] == 'Radio Drama'){ ?>
						Team
					<?php }else{ ?>
						People
					<?php } ?>
					</td>					
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
				} // END FOREACH
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
									$angka = $totalprice+$fee;
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

		<div>
			<a class="btn btn-primary" style="float:left;" href="<?php echo base_url();?>send-delegates">Back to Choose Field</a>
			<button type="submit" class="btn btn-success" style="float:right;">Create Order</button>
		</div>

		<?php echo form_close();?>	


		<!-- Circles which indicates the steps of the form: -->
		<div class="col-md-12" style="text-align:center;margin-top:40px;">
		  <span class="field-number"></span>
		  <span class="step"></span>
		  <span class="step active"></span>
		  <span class="step"></span>
		</div>

	</div>
</div>
