<?php include('conn.php'); ?>
<?php include('header.php'); ?>
<?php $cat=$_GET['cat']; ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	
	<div style="height: 80px;"></div>
	<div>
	<?php
		$inc=4;
		$query=mysqli_query($conn,"select * from product where categoryid='$cat'");
		while($row=mysqli_fetch_array($query)){
			
			$inc = ($inc == 4) ? 1 : $inc+1; 
			if($inc == 1) echo "<div class='row'>";  
			
			?>
				<div class="col-lg-3">
				<div>
					<img src="<?php if (empty($row['photo'])){echo "upload/noimage.jpg";}else{echo $row['photo'];} ?>" style="width: 250px; height:400px; padding:auto; margin:auto;" class="thumbnail">
					<div style="height: 10px;"></div>
					<center><div style="height:40px; width:230px; margin-left:17px;"><strong><?php echo $row['product_name']; ?></strong></div>
					<center><div style="height:40px; width:230px; margin-left:17px;"><strong>RM <?php echo number_format($row['product_price'],2); ?></strong></div>
					<center><div style="height:40px; width:230px; margin-left:17px;">
					<strong>
					<a href="#detail<?php echo $row['productid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-fullscreen"></span> View Full Details</a>
					<?php include ('product_view.php'); ?>
					</strong></div>
					
					
				</div>
				</div>
			<?php
		if($inc == 4) echo "</div><div style='height: 30px;'></div>";
		}
		if($inc == 1) echo "<div class='col-lg-3></div><div class='col-lg-3'></div><div class='col-lg-3'></div></div>"; 
		if($inc == 2) echo "<div class='col-lg-3'></div><div class='col-lg-3'></div></div>"; 
		if($inc == 3) echo "<div class='col-lg-3'></div></div>"; 
	?>
	</div>
	
	<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">Product Details</h4>
        </div>		
		
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
				$query=mysqli_query($conn,"select p.productid, product_name, 
											c.category_name, oprice, product_price, 
											product_qty, photo from product p, 
											category c where  p.categoryid=c.categoryid; ");
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
</body>
</html>