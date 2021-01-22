<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php $id=$_GET['id']; ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<?php include('cart_search_field.php'); ?>
	<div style="height: 80px;"></div>
	<div>
	<?php
		$inc=4;
		$query=mysqli_query($conn,"select * from product where productid='$id'");
		while($row=mysqli_fetch_array($query)){
			
			$inc = ($inc == 4) ? 1 : $inc+1; 
			if($inc == 1) echo "<div class='row'>";  
			
			?>
				<div class="col-lg-3">
				<div>
					<img src="../<?php if (empty($row['photo'])){echo "upload/noimage.jpg";}else{echo $row['photo'];} ?>" style="width: 250px; height:400px; padding:auto; margin:auto; 
					<?php if ($row['product_qty']==0) echo "-webkit-filter: blur(5px); filter: blur(5px);";?>
					" class="thumbnail">
					<div style="height: 10px;"></div>
					<div style="height:40px; width:230px; margin-left:17px;"><?php echo $row['product_name']; ?>
						<?php if ($row['product_qty']==0) echo '<p style="color: red;"> Product is out of stock</p>';?>
					</div>
					
					<div style="height: 10px;"></div>
					<div style="margin-left:17px; margin-right:17px;">
						<a href="#detail<?php echo $row['productid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm">
						<span class="glyphicon glyphicon-fullscreen"></span> View Details</a>
						<?php include ('product_view.php'); ?>
					</div>
					
					<div style="height: 10px;"></div>
					<div style="display:none; position:absolute; top:380px; left:10px;" class="well" id="cart<?php echo $row['productid']; ?>">
					<input type="hidden" value=1 style="width:40px;" id="qty<?php echo $row['productid']; ?>">
					Size: <select style="width:40px;" id="size<?php echo $row['productid']; ?>">
							<option>--</option>
							<option>XS</option>
							<option>S</option>
							<option>M</option>
							<option>L</option>
							<option>XL</option>
						  </select>
					<button type="button" class="btn btn-primary btn-sm concart" value="<?php echo $row['productid']; ?>"><i class="fa fa-shopping-cart fa-fw"></i></button></div>
					<div style="margin-left:17px; margin-right:17px;">
						<button type="button" <?php if ($row['product_qty']==0) echo 'disabled';?> class="btn btn-primary btn-sm addcart" value="<?php echo $row['productid']; ?>"><i class="fa fa-shopping-cart fa-fw"></i> Add to Cart</button> <span class="pull-right"><strong>RM <?php echo number_format($row['product_price'],2); ?></strong></span> 
					</div>
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
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<script src="custom.js"></script>
</body>
</html>