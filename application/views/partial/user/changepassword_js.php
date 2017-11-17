<script>
	$("#changepassword").submit(function(e){
		
		var password = $('#password').val();
		var verif_password = $('#verifpassword').val();

		if(password == "")
		{
			e.preventDefault();
			alert('password must be filled!');
		}else if(password!=verif_password)
		{
			e.preventDefault();
			alert('Verification password not match');
		}
		else
		{
			alert('success');
		}
	});
</script>