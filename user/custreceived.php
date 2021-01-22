<?php
	include('session.php');

	
	if (isset($_GET['salesid'])) {
			
			$salesid = $_GET["salesid"];
				
				echo $salesid;
	
	
	mysqli_query($conn,"update sales set statuscust='Order Complete' where salesid= '$salesid' ");
	}
	

	header('location: history.php');
?>