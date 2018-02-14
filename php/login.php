<?php
include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/login1.css">
	<script type="text/javascript" src="../scripts/home.js"></script>
</head>
<body>
	<p>WELCOME!</p>
	<p>Enter your Username and Password to login</p>


	<?php include('errors.php'); ?>

	
	<form action="" method="POST">
		<input class="t" type="text" name="username" placeholder="Username">
		<input class="p" type="password" name="password" placeholder="Password">

		<input id="btn" type="submit" value="Login !" name="login">
	</form>

</body>
</html>