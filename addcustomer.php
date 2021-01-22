<?php
	include('conn.php');
	
	$name=$_POST['name'];
	$address=$_POST['address'];
	$address1=$_POST['address1'];
	$contact=$_POST['contact'];
	$longitude=$_POST['longitude'];
	$latitude=$_POST['latitude'];
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	
	mysqli_query($conn,"insert into user (username, password, access) values ('$username', '$password', '2')");
	$userid=mysqli_insert_id($conn);
	
	$sql= "insert into customer (userid, customer_name, address1, address, contact, longitude, latitude) values ('$userid', '$name','$address1', '$address', '$contact', '$longitude', '$latitude');";
	$result = mysqli_query ($conn,$sql);
	
	if($result)
{ ?>
    <script>
	alert('Registration success. Please login.');
	window.location.href = "pageLogin.php";
	</script>
    <?php
	
} else {
	?>
    <script>
	alert('Error. Please try again.');
	window.location.href = "register.php";
	</script>
    <?php
}
?>