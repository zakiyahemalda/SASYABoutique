
<?php
	include('session.php');
		include('header.php'); ?>

<body>
<?php include('navbar.php');
	if(isset($_POST['search'])){
		$search = $_POST['search'];
		$query=mysqli_query($conn,"select * from cart where userid='".$_SESSION['id']."' && productid='".$_POST['search']."'");
		if($row=mysqli_fetch_array($query)){
			$row['qty']+=1;
			$query=mysqli_query($conn,"UPDATE `cart` SET `qty` = '".$row['qty']."' WHERE `cart`.`cartid` = '".$row['cartid']."'; ");
		}
		else{
			$query=mysqli_query($conn,"select * from product where productid='".$_POST['search']."'");
			if($row=mysqli_fetch_array($query))
				$query=mysqli_query($conn,"INSERT INTO `cart` (`userid`, `productid`, `qty`) VALUES ('".$_SESSION['id']."', '".$search."', '1'); ");
			else
				echo 'No product';
		}
	}
	if(true){
		?>
		<table width="100%" class="table table-striped table-bordered table-hover">
			<thead>
				<th></th>
				<th><center>Product Name</th>
				<th><center>Product Price</th>
				<th><center>Purchase Qty</th>
				<th><center>SubTotal</th>
			</thead>
			<tbody>
			<form method="POST" action="">
			
			<?php
				$total=0;
				$query=mysqli_query($conn,"select *, sum(cart.qty) as incart from product left join cart on product.productid = cart.productid where userid='".$_SESSION['id']."' GROUP by product.productid");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td><center><button type="button" class="btn btn-danger btn-sm remove_prod" value="<?php echo $row['productid']; ?>"><i class="fa fa-trash fa-fw"></i> Remove</button></td>
						<td id="test"><center><?php echo $row['product_name']; ?></td>
						<td align="center">RM <?php echo number_format($row['product_price'],2); ?></td>
						<td><center><button type="button" class="btn btn-warning btn-sm minus_qty2" value="<?php echo $row['productid']; ?>"><i class="fa fa-minus fa-fw"></i></button> 
							<?php echo $row['qty'];?>
							<button type="button" <?php if ($row['product_qty']==0 || ($row['product_qty'] - $row['incart']) < 1)echo 'disabled'; ?> class="btn btn-primary btn-sm add_qty2" value="<?php echo $row['productid']; ?>"><i class="fa fa-plus fa-fw"></i></button>
						</td>
						<input type="hidden" id="productQty<?php echo $row['productid']; ?>" value=<?php echo $row['product_qty'];?>>
						<input type="hidden" id="cartQty<?php echo $row['productid']; ?>" value=<?php echo $row['qty'];?>>
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
			</form>
			</tbody>
		</table>
		<?php
	}


?>