<div class='container margin-50'>
	<div class="row" style="margin-top: 25px;">
		<div class="col-lg-4 col-md-4 col-sm-6">
			<div class="card blue lighten-1 hoverable" style="background-color: #fe8907 !important;">
				<div class="card-content white-text center">
					<div align="center">
						<h3>Make TODO List</h3>
						<table style="width: 100%;">
							<thead>
								<th>id</th>
								<th>nama</th>
								<th>harga</th>
								<th>stock</th>
							</thead>
							<tbody>
								<?php foreach($info as $info) { ?>
								<tr>
									<td><?php echo $info['field_id'] ?></td>
									<td><?php echo $info['name'] ?></td>
									<td><?php echo $info['price'] ?></td>
									<td><?php echo $info['stock'] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>