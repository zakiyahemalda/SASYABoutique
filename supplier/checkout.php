<?php include('session.php'); ?>
<?php include('header.php'); ?>

<body>
<?php include('navbar.php'); 
if(isset($_POST['search'])){
		/*$search = $_POST['search'];		
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
		}*/
		
		$search = $_POST['search'];
		$productInfo=mysqli_query($conn,"select * from product where productid='".$_POST['search']."'");
		if($productRow=mysqli_fetch_array($productInfo)){
			if($productRow['product_qty'] > 0){
				$cartCheck=mysqli_query($conn,"select * from cart where userid='".$_SESSION['id']."' && productid='".$_POST['search']."'");
				if($cartRow=mysqli_fetch_array($cartCheck)){
					if(++$cartRow['qty'] > $productRow['product_qty']){
					 echo 'No stocks cart';
					 echo '<script> console.log("In cart more than stock $cartRow["qty"]") </script>';
					}
					else{
						echo '<script> console.log("$cartRow["qty"]") </script>';
						$query=mysqli_query($conn,"UPDATE `cart` SET `qty` = '".$cartRow['qty']."' WHERE `cart`.`cartid` = '".$cartRow['cartid']."'; ");
					}
				}
				else{
					$query=mysqli_query($conn,"INSERT INTO `cart` (`userid`, `productid`, `qty`) VALUES ('".$_SESSION['id']."', '".$search."', '1'); ");
				}
			}
			else{
				echo 'No stocks product';
				echo '<script> console.log("Product qty 0<") </script>';
			}
		}
	}

?>

</br>		
<div class="container">
	<div style="height:50px;"></div>
	<div style="height:10px;"></div>
	<div id="checkout_area"></div>
	<div style="height:20px;"></div>
	<div class="row">
		<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Payment</button>
		
		
	</div>
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
		<div class="row">
			<div class="col-lg-12">
			<center>SASYA Boutique Masjid Tanah</br>
			No. SU 940, Jalan Bandar Baru 6, <br>
			Taman Bandar Baru Masjid Tanah,</br> 
			78300, Masjid Tanah Melaka.</br>
			012-319 7558</br></br>
			</div>
		</div>
		<p class="pull-left">Date: <strong><?php echo date("d-m-Y") ;?></p></br>
			<table width="100%" class="table table-striped table-bordered table-hover">
			<thead>
				<th><center>Product Name</th>
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
				<td colspan="3"><span class="pull-right"><strong>Grand Total</strong></span></td>
				<td align="right"><strong>RM <span id="total"><?php echo number_format($total,2); ?></span><strong></td>
			</tr>
			<br>
			</tbody>
		</table>
			<br>
		</div>
        <div class="modal-footer">
          <button type="button" id="check" class="btn btn-primary btn-sm" onclick="js:window.print()" ><i class="fa fa-print fa-fw"></i> Receipt</button>
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