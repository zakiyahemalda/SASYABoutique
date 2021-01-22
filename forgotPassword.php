<?php include('conn.php'); ?>
<?php include('header.php'); ?>
<?php
	session_start();
	
	if (isset($_SESSION['id'])){
		$query=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'");
		$row=mysqli_fetch_array($query);
		
		if ($row['access']==1){
			header('location:admin/');
		}
		else{
			header('location:user/');
		}
	}
?>
<body>
<?php include('navbar.php'); ?>
<br><br>
<div class="container">
	<div id="login_form" class="well">
		<h2><center><span class="glyphicon glyphicon-lock"></span> Login</center></h2>
		<hr>
		<form method="POST" action="login.php">
		Email: <input type="text" name="username" class="form-control" required>
		<div style="height: 10px;"></div>
		<input type="password" name="password" value="<?php echo $srow['password']; ?>" class="form-control" required> 
		Password: <input type="password" name="cpass" class="form-control" required> 
		<div style="height: 10px;"></div>		
		Re-Type: <input type="password" name="repass" class="form-control" required>
		<div style="height: 10px;"></div>
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Confirm</button><br><br>
		<a href="register.php"><span class="glyphicon glyphicon-user"></span>   Create new account</a><br>
		<a href="pageLogin.php"><span class="glyphicon glyphicon-log-in"></span>  Login </a>
		</form>
		<div style="height: 15px;"></div>
		<div style="color: red; font-size: 15px;">
			<center>
			<?php
				
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
			</center>
		</div>
	</div>
</div>
<?php include('script.php'); ?>
</body>
</html>