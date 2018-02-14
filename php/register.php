<?php include('connection.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registeration</title>
<link rel="stylesheet" type="text/css" href="../css/register.css">
</head>
<body>

<div class="containerf">
	<form method="POST"  action="register.php">

		<?php include('errors.php') ?>
		<input class="reg" type="text" name="fname" required="required" placeholder="Enter ur first name">

		<input class="reg"  type="text" name="lname" required="required" placeholder="enter ur last name">

        <input class="reg"  type="text" name="address" required="required" placeholder="address">

		<input  class="reg" type="email" name="email" required="required" placeholder="enter ur email..">

		<input  class="reg"  type="text" name="username" required="required" placeholder="username">

		

		<input class="reg"  type="password" name="password" required="required" placeholder="enter ur password">

		<input class="reg"  type="password" name="cpassword" required="required" placeholder="confirm ur password">

		<label>date of birth</label>
		<input  class="reg" type="date" name="dob" required="required" >

		<input type="radio" name="gender" value="male" required="required">male

		<input type="radio" name="gender" value="female" required="required" >female <br>
		<!-- ________________________ new add_____________________-->
		<label>Choose your Avatar:</label><br>
		<label class="containera">
		<input type="radio" class="" value="1.gif" name="avatar" checked="checked">
		<span id="checkmark1" class="checkmark"></span>
		</label>

		<label  class="containera">
		<input type="radio" class="" value="2.gif" name="avatar">
		<span id="checkmark2" class="checkmark"></span>
		</label>
		<br>
		<label class="containera">
		<input type="radio" class="" value="3.gif" name="avatar">
		<span id="checkmark3" class="checkmark"></span>
		</label>
		<label class="containera">
		<input type="radio" class="" value="4.gif" name="avatar">
		<span id="checkmark4" class="checkmark"></span>
		</label>

		<input  class="reg" id="sub" type="submit" name="register" value="Sign Up">
	</form>
</div>
</body>
</html
