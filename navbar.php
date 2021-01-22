<!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0; background-color: #f4fbff">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php" >SASYA Boutique</a>
            </div>
			
			<ul class=" nav navbar-nav">
				<li>
					<form class="navbar-form" role="search" method="POST" action="search_result2.php">
					<div class="input-group" id="searchbox" style="width:500px;">
						<input type="text" class="form-control" placeholder="Search Product" name="search" id="search" >
						<div class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</div>
					</div>
					</form>
				</li>
			</ul>
			
            <ul class="nav navbar-top-links navbar-right">
				<li id="home"><a href="MapLocation.php"><span class="fa fa-map fa-fw"></span> Store Location</a></li>
				<li id="home"><a href="index.php"><span class="fa fa-home fa-fw"></span> Home</a></li>
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
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="glyphicon glyphicon-lock"></span> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
						<li><a href="pageLogin.php" ><span class="glyphicon glyphicon-lock"></span>  Login</a></li>
						<li class="divider"></li>
						<li><a href="register.php" ><span class="glyphicon glyphicon-user"></span>  New Member</a></li>
                    </ul>   
                </li>
            </ul>
        </nav>