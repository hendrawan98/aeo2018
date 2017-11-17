<script src="<?php echo base_url();?>assets/upload/custom-file-input.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="<?php echo base_url();?>assets/chart/piechart.js"></script>
<script>
	$('.detailTrans').click(function(){
		$.ajax({
				url: base_url+"/user/getdetailtrans/",
				type: 'POST',
				datatype:"JSON",
				data: {id:$(this).prev().val()},
				success:function(data){
					var data = JSON.parse(data); 
					var length = data.detailTransaction.length;
					var content = "";          
					var totalPrice = 0;         
					if(data.status == 'success'){
						for(var i=0;i<length;i++){
							content+= "<tr>"+
										"<td style='text-align:center;'>"+(i+1)+"</td>"+
										"<td style='text-align:center;'>"+data.detailTransaction[i].name+"</td>"+
										"<td style='text-align:center;'>"+data.detailTransaction[i].qty+"</td>"+
										"<td style='text-align:center;'>"+data.detailTransaction[i].price+"</td>"+
										"<td style='text-align:center;'>"+parseInt(data.detailTransaction[i].price)*parseInt(data.detailTransaction[i].qty)+"</td>"+
										"</tr>";
							totalPrice += parseInt(data.detailTransaction[i].price*data.detailTransaction[i].qty);
						}
						if(data.country != "indonesia"){
							content+= "<tr><td colspan='4'><b>International Fee</b></td>"+
									"<td style='text-align:center;'>6000</td></tr>";
							totalPrice += 6000;
						}
						content += "<tr><td colspan='4'><b>Total Price</b></td>"+
									"<td style='text-align:center;'>"+totalPrice+"</td></tr>";
						$('#contentTable').html(content);
						$('#modalParticipant').modal('show');
						console.log(data.status);
					}else{                      
						alert("Error !");
						console.log(data.status);
					}
				},
				error:function(response){                   
				}
		});
	});

	$('.detailAccom').click(function(){
		$.ajax({
				url: base_url+"/user/getdetailaccom/",
				type: 'POST',
				datatype:"JSON",
				data: {id:$(this).prev().val()},
				success:function(data){
					var data = JSON.parse(data); 
					var length = data.detailAccom.length;
					var content = "";          
					var totalPrice = 0;
					var totalQty = 0;           
					if(data.status == 'success'){
						for(var i=0;i<length;i++){
							totalQty += parseInt(data.detailAccom[i].quantity);
							if(data.detailAccom[i].name == 'Boarder'){
								totalQty = totalQty - parseInt(data.detailAccom[i].quantity);
							}
							content+= "<tr>"+
										"<td style='text-align:center;'>"+(i+1)+"</td>"+
										"<td style='text-align:center;'>"+data.detailAccom[i].name+"</td>"+
										"<td style='text-align:center;'>"+data.detailAccom[i].quantity+"</td>"+
										"<td style='text-align:center;'>"+data.detailAccom[i].nights+"<br><small><b>("+data.detailAccom[i].checkin_date+" - "+data.detailAccom[i].checkout_date+")</b></small>"+"</td>"+
										"<td style='text-align:center;'>"+data.detailAccom[i].price+"</td>"+
										"<td style='text-align:center;'>"+parseInt(data.detailAccom[i].price)*parseInt(data.detailAccom[i].quantity)*parseInt(data.detailAccom[i].nights)+"</td>"+
										"</tr>";
							totalPrice += parseInt(data.detailAccom[i].price*data.detailAccom[i].quantity*data.detailAccom[i].nights);
							//totalPrice += parseInt(data.detailAccom[i].quantity * 200000);
						}
						content += "<tr>"+
										"<td style='text-align:center;'>"+(i+1)+"</td>"+
										"<td style='text-align:center;'>Deposit Fee</td>"+
										"<td style='text-align:center;'>"+totalQty+"</td>"+
										"<td style='text-align:center;'> - </td>"+
										"<td style='text-align:center;'>"+200000+"</td>"+
										"<td style='text-align:center;'>"+(totalQty * 200000)+"</td>"+
										"</tr>";
							totalPrice += parseInt(totalQty*200000);
						content += "<tr><td colspan='5'><b>Total Price</b></td>"+
									"<td style='text-align:center;'>"+totalPrice+"</td></tr>";
						$('#contentTable2').html(content);
						$('#modalAccom').modal('show');
						console.log(data.status);
					}else{                      
						alert("Error !");
						console.log(data.status);
					}
				},
				error:function(response){                   
				}
		});
	});

	$(document).ready(function(e){


		var db = <?php foreach ($db as $key => $value) { echo $value['stock']; } ?>;
		var sp = <?php foreach ($sp as $key => $value) { echo $value['stock']; } ?>;
		var sb = <?php foreach ($sb as $key => $value) { echo $value['stock']; } ?>;
		var sc = <?php foreach ($sc as $key => $value) { echo $value['stock']; } ?>;
		var st = <?php foreach ($st as $key => $value) { echo $value['stock']; } ?>;
		var ssw = <?php foreach ($ssw as $key => $value) { echo $value['stock']; } ?>;
		var rd = <?php foreach ($rd as $key => $value) { echo $value['stock']; } ?>;
		var nc = <?php foreach ($nc as $key => $value) { echo $value['stock']; } ?>;

		google.charts.load("current", {packages:["corechart"]});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {
		  var data = new google.visualization.DataTable();
		      data.addColumn('string', 'Competition');
		      data.addColumn('number', 'Quota');
		      data.addRows([
		        ['Debate', db],
		        ['Speech', sp],
		        ['Spelling Bee', sb],
		        ['Scrabble', sc],
		        ['Short Story Writing', ssw],
		        ['Radio Drama', rd*4],
		        ['Newscasting', nc],
		        ['Storytelling', st],
		      ]);

		var options = {
			title: 'Competition Quota',
		  legend: 'none',
		  pieSliceText: 'label',
		  pieStartAngle: 100,
		};

		  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
		  chart.draw(data, options);
		}
	});

	$(document).ready(function(e){
		var sui = <?php foreach ($sui as $key => $value) { echo $value['stock']; } ?>;
		var del = <?php foreach ($del as $key => $value) { echo $value['stock']; } ?>;
		var stv = <?php foreach ($stv as $key => $value) { echo $value['stock']; } ?>;
		var sntv = <?php foreach ($sntv as $key => $value) { echo $value['stock']; } ?>;
		var sttv = <?php foreach ($sttv as $key => $value) { echo $value['stock']; } ?>;
		var stntv = <?php foreach ($stntv as $key => $value) { echo $value['stock']; } ?>;
		var boa = <?php foreach ($boa as $key => $value) { echo $value['stock']; } ?>;

		google.charts.load("current", {packages:['corechart']});
	    google.charts.setOnLoadCallback(drawChart);
	    function drawChart() {
	      var data = google.visualization.arrayToDataTable([
	        ["Room Type", "Quota", { role: "style" } ],
	        ["Suite", sui, "#b87333"],
	        ["Deluxe", del, "silver"],
	        ["Superior Twin TV", stv, "gold"],
	        ["Superior Twin non TV", sntv, "color: #e5e4e2"],
	        ["Standard Twin TV", sttv, "color: #e5e4e2"],
	        ["Standard Twin non TV", stntv, "color: #e5e4e2"],
	        ["Boarder", boa, "color: #e5e4e2"]
	      ]);

	      var view = new google.visualization.DataView(data);
	      view.setColumns([0, 1,
	                       { calc: "stringify",
	                         sourceColumn: 1,
	                         type: "string",
	                         role: "annotation" },
	                       2]);

	      var options = {
	        title: "Accommodation Quota",
	        width: 370,
	        height: 250,
	        bar: {groupWidth: "80%"},
	        legend: { position: "none" },
	      };
	      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
	      chart.draw(view, options);
	  }
	});

	$(document).ready(function(){
		$(".modal-trigger").click(function(e){
            $("#modalDream").modal('show');
        });
        function validateEmpty(prefix)
        {
            return $("#"+prefix+"noble_dream").val() == "";
        }
	    
	    console.log(validateEmpty(""));

	    $('.editDream').click(function(){
	    	$.ajax({
	                url: base_url+"/user/getdream/",
	                type: 'POST',
	                datatype:"JSON",
	                data: {id:$(this).prev().val()},
	                success:function(data){
	                	var data = JSON.parse(data);                	
	                	if(data.status == 'success'){
	                		$('#id').val(data.user.id);
	                		$('#noble_dream').val(data.user.noble_dream);
	                	}else{                		
	                		alert("Error !");
	                	}
	                },
	                error:function(response){                	
	                }
	            });
	    });

	    $('.saveDream').click(function(){
	        var id = $('#id').val();
	        var noble_dream = $('#noble_dream').val();

	        $.ajax({
                url: base_url+"/user/addnobledream/",
                type: 'POST',
                datatype:"JSON",
                data: {
                    id:id,
                    noble_dream:noble_dream,
                },
                error:function(response){                   
                    alert("ERROR");
                    console.log(error);
                },
                success:function(data){
                    window.location.href = base_url+"dashboard"; 
                } 
            });



	    });
	});
</script>
