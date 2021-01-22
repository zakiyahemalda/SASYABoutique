<?php include('conn.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<br>
<div class="container">
	<div id="reg_form" class="well">
		<h2><center><span class="glyphicon glyphicon-user"></span> New Member</center></h2>
		<hr>
		<form method="POST" action="addcustomer.php">
		
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfBHW0Lzg-Pw6dziaxeHjYtClElphMzdc&libraries=places"></script>
  
								<script type="text/javascript">
									google.maps.event.addDomListener(window,'load',intilize);
									function intilize(){
										var autocomplete = new google.maps.places.Autocomplete(document.getElementById('address'));

											google.maps.event.addListener(autocomplete, 'place_changed', function(){

												var place = autocomplete.getPlace();
												var latitude = place.geometry.location.lat();
												document.getElementById("latitude").value = latitude;
												var longitude = place.geometry.location.lng();
												document.getElementById("longitude").value = longitude;

											});
									};													  
																	
								</script>
		
		Name: <input type="text" name="name" placeholder="Name" style="text-transform:capitalize;" class="form-control" required>
		<div style="height: 10px;"></div>		
		Email: <input type="email" name="username" placeholder="email@domain.com" class="form-control" required> 
		<div style="height: 10px;"></div>
		Password: <input type="password" name="password" placeholder="*****" class="form-control" required> 
		<div style="height: 10px;"></div>
		Contact: <input type="text" name="contact" placeholder="e.g 0191234567" class="form-control" required> 
		<div style="height: 10px;"></div>
		Address Line 1: <input type="text" name="address1" id="address1" style="text-transform:capitalize;" placeholder="Street address" class="form-control" required> 
		<div style="height: 10px;"></div>
		Address Line 2: <input type="text" name="address" id="address" style="text-transform:capitalize;" placeholder="City, State" class="form-control" required> 
		<div style="height: 10px;"></div>
		<input type="hidden" name="latitude" id="latitude" class="form-control" required readonly > 
		<input type="hidden" name="longitude" id="longitude" class="form-control" required readonly > 
		<div style="height: 10px;"></div>
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Confirm</button><br><br>
		<a href="pageLogin.php"><span class="glyphicon glyphicon-lock"></span>   Login</a>
		</form>
		<div style="height: 15px;"></div>
		
	</div>
</div>
<?php include('script.php'); ?>
</body>
</html>