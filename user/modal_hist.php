<script type="text/javascript">

</script>

<!-- History -->
    <div class="modal fade" id="detail<?php echo $hrow['salesid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title" id="myModalLabel">Transation Full Details</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$sales=mysqli_query($conn,"select * from sales where salesid='".$hrow['salesid']."'");
					$srow=mysqli_fetch_array($sales);
				?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<center>SASYA Boutique Masjid Tanah</br>
							No. SU 940, Jalan Bandar Baru 6, <br>
							Taman Bandar Baru Masjid Tanah,</br> 
							78300, Masjid Tanah Melaka.</br>
							012-319 7558</br></br>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<p class="pull-left">Sales No: <?php echo ($srow['salesid']); ?></p>					
							<p class="pull-right">Date: <?php echo date("F d, Y", strtotime($srow['sales_date'])); ?></p></br>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<table width="100%" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Product Name</th>
										<th>Size</th>
										<th>Price</th>
										<th>Purchase Qty</th>
										<th>SubTotal</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$total=0;
										$pd=mysqli_query($conn,"select * from sales_detail left join product on product.productid=sales_detail.productid where salesid='".$hrow['salesid']."'");
										while($pdrow=mysqli_fetch_array($pd)){
											?>
											<tr>
												<td><?php echo ucwords($pdrow['product_name']); ?></td>
												<td><?php echo ucwords($pdrow['size']); ?></td>
												<td align="center">RM <?php echo number_format($pdrow['product_price'],2); ?></td>
												<td><?php echo $pdrow['sales_qty']; ?></td>
												<td align="right">RM
													<?php 
														$subtotal=$pdrow['product_price']*$pdrow['sales_qty'];
														echo number_format($subtotal,2);
														$total+=$subtotal;
													?>
												</td>
											</tr>
											<?php
										}
									?>
									<tr>
										<td align="right" colspan="4"><strong>Total</strong></td>
										<td align="right"><strong>RM <?php echo number_format($total,2); ?></strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>      
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
					<button type="button" class="btn btn-default" onclick="js:window.print()"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
        </div>
    </div>
