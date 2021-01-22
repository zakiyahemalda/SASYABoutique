<!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0; background-color: #f4fbff">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php" >SASYA Boutique</a>
            </div>
			
			<ul class=" nav navbar-nav">
				<li>
					<form class="navbar-form" role="search"method="POST" action="checkout.php">
					<div class="input-group" id="searchbox" style="width:400px;">
						<input type="text" class="form-control" autofocus  placeholder="Code Item" name="search" id="search" >
						<div class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</div>
					</div>
					</form>
				</li>
			</ul>
			
            <ul class="nav navbar-top-links navbar-right">
				<li id="home"><a href="../admin"><span class="fa fa-home fa-fw"></span> Home</a></li>
					
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-product-hunt fa-fw"></i> Products Category <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
						<li><a href="index.php"> All Category</a></li>
						<?php
							$caq=mysqli_query($conn,"select * from category");
							while($catrow=mysqli_fetch_array($caq)){
								?>
								<li class="divider"></li>
								<li><a href="plist.php?cat=<?php echo $catrow['categoryid']; ?>"><?php echo $catrow['category_name']; ?></a></li>
								<?php
							}
						
						?>
                    </ul> 
                </li>
				<li><a href="#logout" data-toggle="modal"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
        </nav>