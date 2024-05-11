<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X=UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="sstyles.css">
		<link href='https://unpkg.com/boxicons@2.1.4/css/
			boxicons.min.css' rel='stylesheet'>

</head>
<body>
	<div class="wrapper">
	<form class="login" s
    	      method="post"
    	      action="req/admin_login_process.php">
		<form action="req/admin_login_process.php" method="post">
			<h1>Login</h1> 
			<?php if (isset($_GET['error'])) { ?>
    		<div class="alert alert-danger" role="alert">
			  <?=$_GET['error']?>
			</div>
			<?php } ?>
			<div class="input-box">
				<input type="text" class="form-control" name="uname" placeholder="Username" required>
				<i class='bx bxs-user'></i>
			</div>
			<div class="input-box">
				<input type="password" class="form-control" name="pass" placeholder="Password" required>
				<i class='bx bxs-lock-alt' ></i>
			</div>
			<div class="remember-forgot">
				<label><input type="checkbox">Remember me</label>
				<a href="#">Forgot password?</a>
			</div>

		
			<button type="submit" class="btn">Login</button>
			<div class="register-link">
				<p>Don't have an account? <a href="admin_register.php" target="_self">Register</a></p>
			</div>
		</form>

	</div>

</body>
</html>