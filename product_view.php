<script type="text/javascript">

</script>

<!-- Details -->
    <div class="modal fade" id="detail<?php echo $row['productid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title" id="myModalLabel">Product Details</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$sales=mysqli_query($conn,"select * from product where productid='".$row['productid']."'");
					$srow=mysqli_fetch_array($sales);
				?>
				<div class="container-fluid">
				
					<div class="row">
						<div class="col-lg-12">
							<table width="100%" class="table-hover">
								
								<tbody>
									<?php
										$total=0;
										$pd=mysqli_query($conn,"select p.productid, product_name, details, 
																c.category_name, product_price, 
																product_qty, photo from product p, 
																category c where  p.categoryid=c.categoryid
																and productid='".$row['productid']."';");
										while($pdrow=mysqli_fetch_array($pd)){
											?>
											<tr>
												<td rowspan="3">
												<img src="<?php if(empty($pdrow['photo'])){echo "upload/noimage.jpg";}
															else{echo $pdrow['photo'];} ?>" height="350px" width="250px;"></td> 
												<td><h1><?php echo ucwords($pdrow['product_name']); ?></h1><br>
										
												<h5><?php echo($pdrow['details']); ?></h5><br>
												<h3>RM <?php echo number_format($pdrow['product_price'],2); ?></h3><br>
												<h5><?php if ($row['product_qty']==0) {echo '<p style="color: red;"> Product is out of stock</p>';}
														else{echo $pdrow['product_qty']." in stock";} ?></h5></td>
											</tr>											
											<?php
										}
									?>
									
								</tbody>
							</table>
						</div>
					</div>      
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
