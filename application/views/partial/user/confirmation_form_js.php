<script>
	// $('.btn-date').on('click', function(e) {
	// 	e.preventDefault();
	// 	$.dateSelect.show({
	// 		element: 'input[name="date2"]'
	// 	});
	// });
	// $('#timepicker').timepicki({
 //    });
	$(document).ready(function(){
		var allInvoiceId = {};
		var contentSelect = "";
		<?php
		if(count($allInvoiceId) > 0){
		?>		
		 allInvoiceId = <?php echo $allInvoiceId;?>;
		 for(var i=0;i<allInvoiceId.length;i++){
				contentSelect += "<option value='"+allInvoiceId[i]+"'>"+allInvoiceId[i]+"</option>";
			}
		 <?php
		}?>

		if(allInvoiceId.length < 1){
			contentSelect = "<option disabled selected>Send a Delegate first!</option>";
		}
			
		var paymentType = $('#payment_type');
		var content = "";
		paymentType.change(function(){
			if(paymentType.val() == "national"){
				content = 
				'<div class="col-sm-12 form-group">			'+
					'<label class="control-label">Invoice ID <span style="color:red;">*</span></label>'+
					'<div class="inputGroupContainer"> '+
						'<div class="input-group">'+
							'<span class="input-group-addon">'+
								'<i class="fa fa-pencil"></i>'+
							'</span>'+
							'<select class="form-control validate" name="invoiceid" id="invoiceid" >'+contentSelect+'</select> '+
						'</div>'+
						'<small>Forget your Invoice ID? Go to dashboard or <a href="<?php echo base_url();?>dashboard">click here</a></small>'+
					'</div>'+
				'</div>'+
				
				'<div class="col-sm-12 form-group">'+
					'<label class="control-label">Your Bank Account Name <span style="color:red;">*</span></label>'+
					'<div class="inputGroupContainer"> '+
						'<div class="input-group">'+
							'<span class="input-group-addon">'+
								'<i class="fa fa-university"></i>'+
							'</span>'+
							'<input type="text" class="form-control validate" placeholder="Your Bank Account Name" name="bank_name" id="bank_name">'+
						'</div>'+
					'</div>'+
				'</div>'+

				'<div class="col-sm-12 form-group">'+
					'<label class="control-label">Your Account Name <span style="color:red;">*</span></label>'+
					'<div class="inputGroupContainer">'+
						'<div class="input-group">'+
							'<span class="input-group-addon">'+
								'<i class="fa fa-user"></i>'+
							'</span>'+
							'<input type="text" placeholder="Your Account Name" name="rek_name" id="rek_name" class="form-control validate">		'+
						'</div>'+
					'</div>'+
				'</div>'+

				'<div class="col-sm-12 form-group">'+
					'<label class="control-label">Total Amount Transferred <span style="color:red;">*</span></label>'+
					'<div class="inputGroupContainer">'+
						'<div class="input-group">'+
					'<span class="input-group-addon">'+
								'<i class="fa fa-money"></i>'+
							'</span>'+
							'<input type="text" placeholder="Total Amount Transferred" class="form-control validate" name="total_transfer" id="total_transfer">'+
						'</div>'+
						'<small>Example: 1000000</small>'+
					'</div>'+
				'</div>'+

				'<div class="col-sm-12 form-group">'+
					'<label class="control-label">Upload Bill <span style="color:red;">* (Max size:800Kb)</span></label>'+
					'<div class="inputGroupContainer"> '+
						'<div class="input-group">'+
							'<div id="upload">'+
						        '<input type="file" name="bill_photo" size="20"/>'+
						     '</div>'+
						'</div>'+
                                                '<small>If you have any trouble on uploading bill, you can directly contact the contact person</small>'+
					'</div>'+
				'</div>		'+
				'<div class="col-sm-12 top20 bottom20">'+
					'<center>'+
						'<button class="btn btn-primary col-sm-3" style="float:none;" type="submit" name="action">Submit</button>'+
					'</center>'+
				'</div>';

				$('#formContent').html(content);
			}else if(paymentType.val() == "international"){
				content = 
				'<div class="col-sm-12 form-group">'+				
				'<label class="control-label">Invoice ID <span style="color:red;">*</span></label>'+
				'<div class="inputGroupContainer"> '+
					'<div class="input-group">'+
						'<span class="input-group-addon">'+
							'<i class="fa fa-pencil"></i>'+
						'</span>'+
						'<select class="form-control validate" name="invoiceid" id="invoiceid" >'+contentSelect+'</select> '+
					'</div>'+
					'<small>Forget your Invoice ID? Go to dashboard or <a href="<?php echo base_url();?>dashboard">click here</a></small>'+
				'</div>'+
			'</div>'+
			
			'<div class="col-sm-12 form-group">'+
				'<label class="control-label">Upload Western Union Bill <span style="color:red;">* (Max size:800Kb)</span></label>'+
				'<div class="inputGroupContainer"> '+
					'<div class="input-group">'+
						'<div id="upload">'+
					        '<input type="file" name="bill_photo" size="20" />'+
					     '</div>'+
					'</div>'+
                                        '<small>If you have any trouble on uploading bill, you can directly contact the contact person</small>'+
				'</div>'+
			'</div>'+

			'<div class="col-sm-12 top20 bottom20">'+
				'<center>'+
					'<button class="btn btn-primary col-sm-3" style="float:none;" type="submit" name="action">Submit</button>'+

				'</center>'+
			'</div>';
			$('#formContent').html(content);
			}
		})
	});


	 $("#formConfirmation").submit(function(e){
	 	var invoiceid = $("#invoiceid").val();
	 	var bank_name = $("#bank_name").val();
	 	var rek_name = $("#rek_name").val();
	 	var total_transfer = $("#total_transfer").val();
	 	var total_transfer_length = $("#total_transfer").val();
	 	var transfer_time = $("#timepicker").val();
	 	var transfer_date = $("#date2").val();
	 	var payment_type = $('#payment_type').val();
	 	if(payment_type == "national"){
	 		if(invoiceid == '' ){
		 		e.preventDefault();
		 		$.toaster({ priority: 'danger' , message : 'Invoice ID Must Be Filled !' });
		 	}else if(isNaN(invoiceid) == true){
		 		e.preventDefault();
		 		$.toaster({ priority: 'danger' , message : 'Invoice ID Must Be In Numbers !' });
		 	}else if(bank_name == ''){
		 		e.preventDefault();
		 		$.toaster({ priority: 'danger' , message : 'Bank Name Must Be Filled !' });
		 	}else if(rek_name == ''){
		 		e.preventDefault();
		 		$.toaster({ priority: 'danger' , message : 'Account Name Must Be Filled !' });
		 	}else if(total_transfer == ''){
		 		e.preventDefault();
		 		$.toaster({ priority: 'danger' , message : 'Total Transfer Must Be Filled !' });
		 	}else if(isNaN(total_transfer) == true){
		 		e.preventDefault();
		 		$.toaster({ priority: 'danger' , message : 'Total Transfer Must Be In Numbers !' });
		 	}else if(total_transfer_length.length < 6){
		 		e.preventDefault();
		 		$.toaster({ priority: 'danger' , message : 'Total Transfer Must Be In 6-Digits Numbers !' });
		 	}else if(transfer_time == ''){
		 		e.preventDefault();
		 		$.toaster({ priority: 'danger' , message : 'Transfer Time Must Be Filled !' });
		 	}else if(transfer_date == ''){
		 		e.preventDefault();
		 		$.toaster({ priority: 'danger' , message : 'Transfer Date Must Be Filled !' });
		 	}else{
		 		window.alert('Your payment confirmation has been made. The committee will update participants payment status everyday at 9 P.M (GMT +7). Please wait until our admin approve your payment confirmation.', 6000);
		 	}

		 }else if(payment_type == "international"){
		 	if(invoiceid == '' ){
		 		e.preventDefault();
		 		$.toaster({ priority: 'danger' , message : 'Invoice ID Must Be Filled !' });
		 	}else if(isNaN(invoiceid) == true){
		 		e.preventDefault();
		 		$.toaster({ priority: 'danger' , message : 'Invoice ID Must Be In Numbers !' });
		 	}else{
		 		window.alert('Your payment confirmation has been made. The committee will update participants payment status everyday at 9 P.M (GMT +7). Please wait until our admin approve your payment confirmation.', 6000);
		 	}
		 }

	 	
	 });

		<?php
            if($this->session->flashdata('errorMsg')) {
        ?>
            $.toaster({ priority: 'warning' , message : '<?php echo $this->session->flashdata("errorMsg"); ?>' });
        <?php
            }
        ?>
</script>
