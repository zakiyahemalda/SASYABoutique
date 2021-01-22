<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<?php include('cart_search_field.php'); ?>
	<div style="height: 50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Transaction History</h1>
        </div>
    </div>
                <!-- /.row -->
				<div class="row">
                <div class="col-lg-12">
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable">
						<thead>
							<tr>
								<th class="hidden"></th>								
								<th>Purchase Date</th>								
								<th>Total Amount</th>
								<th>View Details</th>
								<th>Status</th>
								<th>Feedback</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$h=mysqli_query($conn,"select * from sales where userid='".$_SESSION['id']."' order by sales_date desc ;");
								while($hrow=mysqli_fetch_array($h)){
									?>
										<tr>
											<td class="hidden"></td>
											<td><?php echo date("M d, Y - h:i A", strtotime($hrow['sales_date']));?></td>
											<td>RM <?php echo number_format($hrow['sales_total'],2); ?></td>
											<td>
												<a href="#detail<?php echo $hrow['salesid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> Full Details</a>
												<?php include ('modal_hist.php'); ?>
											</td>
											<td><?php if ($hrow['status']=='Item have been shipped') {echo "<p style='color: #F1C40F; font-weight: bold; font-style: italic;'>".$hrow['status']."</p>";}
														else{echo "<p style='color: black; font-weight: bold; '>". $hrow['status']."</p>";} ?>
											</td>
											<td>

											<?php 
												if ($hrow['statuscust']=='In Process'){
												?>
												<a href="custreceived.php?salesid=<?php echo $hrow['salesid'];?>" class="btn btn-success btn btn-sm"> 
												Received Parcel</a>
												<?php
												}
												else{?>
													<?php echo "<p style='color: green; font-weight: bold; font-style: italic;'>". $hrow['statuscust']."</p>"; ?><?php
												}
											?>
									
											</td>
											
										</tr>
									<?php
								}
							?>
						</tbody>
                    </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
	
	
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<script src="custom.js"></script>
<script>
$(document).ready(function(){
	$('#history').addClass('active');
	
	$('#historyTable').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": true,
	"pageLength": 7
	});
});
</script>
</body>
</html>