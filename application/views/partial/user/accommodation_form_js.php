<!-- <script src="<?php echo base_url();?>assets/jquery.toaster.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$(document).ready(function(){
		$(".datepicker").datepicker({
            dateFormat: 'd M, yy',
            minDate: new Date(2017,1,8),
            maxDate: new Date(2017,1,18)
        });
		$(".modal-trigger").click(function(e){
	        $("#modalBoarder").modal('show');
	        $("#modalSuite").modal('show');
	        $("#modalDeluxe").modal('show');
	        $("#modalSupertv").modal('show');
	        $("#modalSuperntv").modal('show');
	        $("#modalStandtv").modal('show');
	        $("#modalStandntv").modal('show');
	    });

	    $('.increase-number-btn').click(function(e){
			e.preventDefault();
			var label = $(this).parent().prev().find('.field-number').html();			
			label = parseInt(label);		
			var value = $(this).parent().prev().find('.field-number').html(label+1);
			var value = $(this).parent().prev().find('.field-number').next().val(label+1);					
		});

		$('.decrease-number-btn').click(function(e){
			e.preventDefault();
			var label = $(this).parent().next().find('.field-number').html();
			label = parseInt(label);

			if(label<=0){
				var value = $(this).parent().next().find('.field-number').next().val(0);			
			}else{
			var value = $(this).parent().next().find('.field-number').html(label-1);
			var value = $(this).parent().next().find('.field-number').next().val(label-1);			
			}
		});

	    $('.saveParticipant').click(function(e){
	    	var qty = $(this).parent().prev().find('.field-number').next().val();
	    	var cidate = $(this).parent().prev().find('.date1').next().val();
	    	var codate = $(this).parent().prev().find('.date2').next().val();
	    	var miliday = 24 * 60 * 60 * 1000;
	    	var tanggal1 = new Date(cidate);
	    	var tanggal2 = new Date(codate);
	    	var selisih = (tanggal2 - tanggal1) / miliday;
	    	countNight = parseInt(selisih);

	    	var night = $(this).parent().prev().find('.night-number').next().val(countNight);
	    	
	    	if(qty == 0){
	    		$.toaster({ priority : 'danger', message : 'Quantity Must Be Filled !' });
	    		e.preventDefault();
	    	}
	    	else if(cidate == ""){
	    		$.toaster({ priority : 'danger', message : 'You Must Choose Check In Date !' });
	    		e.preventDefault();
	    	}
	    	else if(codate == ""){
	    		$.toaster({ priority : 'danger', message : 'You Must Choose Check Out Date !' });
	    		e.preventDefault();
	    	}
	    	else if(codate == cidate){
	    		$.toaster({ priority : 'danger', message : 'Check Out Date Can Not Be Same as Check In Date !' });
	    		e.preventDefault();
	    	}
	    	else if(tanggal2 < tanggal1){
	    		$.toaster({ priority : 'danger', message : 'Wrong Check Out Date Input !' });
	    		e.preventDefault();
	    	}
	    	else{
	    		$.toaster({ priority : 'success', message : 'Success !' });
	    		$('.modal').modal('hide');
	    	}
	    	return true;
	    	
	    });
		
		$('.confirmBooking').click(function(e){
			document.location = base_url+"/user/pay2";
		});

	});
</script>
