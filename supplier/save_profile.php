<?php
	include('session.php');
	$uid=$_GET['id'];

	$name= $_POST['cname'];
	$address= $_POST['address'];
	$address1= $_POST['address1'];
	$contact= $_POST['contact'];
	$latitude= $_POST['latitude'];
	$longitude= $_POST['longitude'];
	
	mysqli_query($conn,"update customer set customer_name='$name',address1='$address1', address='$address', contact='$contact', longitude='$longitude', latitude='$latitude' where userid='$uid'");
	
	?>
		<script>
			window.alert('Profile updated successfully!');
			window.history.back();
		</script>
	<?php
	
?>