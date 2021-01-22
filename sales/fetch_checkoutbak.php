
<?php
	include('session.php');
	include('header.php'); ?>

<body><br><br><br>
<?php include('navbar.php');
	$cart = $_SESSION['cart'];
	if(isset($_POST['edit'])){
		echo 'test';
	}
	if(isset($_POST['search']))
	{
	$id=$_POST['search']; 
	$found=0;
	for($i=0; $i<sizeof($cart);$i++){
		if($cart[$i][0]==$id){
			$found=1;
			$cart[$i][1]+=1;
		}
	}
	if($found==0){
		$item=array($id, 1);
		array_push($cart, $item);
	}
	}
	$_SESSION['cart'] = $cart;
	if(true){
		?>
		<div style="padding:50px">
		<table style="padding: 50px;" width="100%" class="table table-striped table-bordered table-hover">
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
				foreach($cart as $name){
					$query=mysqli_query($conn,"select * from product where productid='".$name[0]."'");
					$row=mysqli_fetch_array($query);
					?>
					<tr>
						<td><center><button type="button" class="btn btn-danger btn-sm remove_prod" value="<?php echo $row['productid']; ?>"><i class="fa fa-trash fa-fw"></i> Remove</button></td>
						<td><center><?php echo $row['product_name']; ?></td>
						<!--<td><center><?php echo $row['size']; ?></td>-->
						<td align="center">RM <?php echo number_format($row['product_price'],2); ?></td>
						<td><center>
							<button type="button" class="btn btn-warning btn-sm minus_qty2" value="<?php echo $name[0]; ?>">
								<i class="fa fa-minus fa-fw"></i>
							</button> 
							<input type="hidden" name="quantity" value="<?php echo $name[1];?>">
								<?php echo $name[1];?>
							<button type="button"class="btn btn-primary btn-sm add_qty2" value="<?php echo $name[0]; ?>">
								<i class="fa fa-plus fa-fw"></i></button> 
						</td>
						<td align="right"><strong>RM <span class="subt">
							<?php
								$subtotal=1*$row['product_price'];
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
		</div>
		<?php
	}


?>