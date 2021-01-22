<?php include('session.php'); ?>
<?php include('header.php'); ?>

<body>
<?php include('navbar.php'); ?>
</br>		
<div class="container">
	<div style="height:50px;"></div>
	<div class="row">
		<div class="col-lg-12">
			<a href="index.php" class="btn btn-primary" style="position:relative; left:3px;"><span class="glyphicon glyphicon-arrow-left"></span> Continue Shopping</a>
		</div>
	</div>
	<div style="height:10px;"></div>
	<div id="checkout_area"></div>
	<div style="height:20px;"></div>
	<div class="row">	
		<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Payment</button>
	</div>
	
	<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">Sales Details</h4>
        </div>
        <div class="modal-body">
		<p class="pull-left">Date: <?php echo date("d-m-Y") ;?></p></br>
			<table width="100%" class="table table-striped table-bordered table-hover">
			<thead>
				<th><center>Product Name</th>
				<th><center>Size</th>
				<th><center>Product Price</th>
				<th><center>Purchase Qty</th>
				<th><center>SubTotal</th>
			</thead>
			<tbody>
			
			<?php
				$total=0;
				$query=mysqli_query($conn,"select * from cart left join product on product.productid=cart.productid where userid='".$_SESSION['id']."'");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						
						<td><center><?php echo $row['product_name']; ?></td>
						<td><center><?php echo $row['size']; ?></td>
						<td align="center">RM <?php echo number_format($row['product_price'],2); ?></td>
						<td><center><?php echo $row['qty'];?></td>
						<td align="right"><strong>RM <span class="subt">
							<?php
								$subtotal=$row['qty']*$row['product_price'];
								echo number_format($subtotal,2);
								$total+=$subtotal;
							?>
						</span></strong></td>
					</tr>
					<?php
				}
			?>
			<tr>
				<td colspan="4"><span class="pull-right"><strong>Grand Total</strong></span></td>
				<td align="right"><strong>RM <span id="total"><?php echo number_format($total,2); ?></span><strong></td>
			</tr>
			<br>
			</tbody>
		</table>
			<br>
		</div>
        <div class="modal-footer">
          <button type="button" id="check" class="btn btn-primary btn-sm" onclick="js:window.print()" ><i class="fa fa-check fa-fw"></i> Confirm</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('script.php'); ?>
<script src="custom.js"></script>

<script type = "text/javascript">

$(document).ready(function(){
	showCheckout();
	
});

    
</script>
</body>
</html>