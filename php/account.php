<?php
include('home.php');
if(isset($_SESSION['username']));
$i = $_SESSION['username'];
$sqll="select * from customer where username = '$i'";
$ress=mysqli_query($connection,$sqll);
while ( $row1 = mysqli_fetch_array($ress)) {
	$username=$row1['username'];
	$fname= $row1['fname'];
	$lname=$row1['lname'];
	$gender=$row1['gender'];
	$address=$row1['address'];
	$dob=$row1['dob'];
	$email=$row1['email'];
	$password=$row1['password'];
}
# personal information update..
if(isset($_POST['save1'])){
	$n_fname=$_POST['n_fname'];
	$n_lname=$_POST['n_lname'];
	$n_gender=$_POST['n_gender'];
	$n_address=$_POST['n_address'];
	$n_dob=$_POST['n_dob'];
	
$update1="UPDATE customer SET fname= '$n_fname', lname='$n_lname', gender='$n_gender', address='$n_address', dob='$n_dob' WHERE username = '$username'";
$res_update1=mysqli_query($connection,$update1);
header('location: account.php');
}
# password or email update..
# cn_pass == confirm the new pass...
# s_password == security pass check..
if(isset($_POST['save2'])){
	$n_password=$_POST['n_password'];
	$cn_password=$_POST['cn_password'];
	$s_password=$_POST['password'];
if(isset($_POST['n_password'])){
	$s_password=md5($s_password);
	if ($s_password == $password) {
	
	$n_password= md5($n_password);
	$update2="update customer set email='$email', password= '$n_password' where username= '$username'";
	$res_update2=mysqli_query($connection,$update2);
}
else
array_push($errors, "your current password is not correct!");
}
else{
	$update2="update customer set email='$n_email' where username='$username'";
}
header('location: account.php');

}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>My Account</title>
		<link rel="stylesheet" type="text/css" href="../css/account.css">
	</head>
	<body>
		<!-- _________________________new div _____________________ -->
		<div class="layout">
			<?php 
			echo "<img  src='../photo/avatar/$avatar'>";
			echo "<p>Manage your accout from Here ... </p>";
			?>
		</div> 
		<div class="cont">
			<div class="sel" onclick="dropdown1()">
				<span class="heads">General Information </span>
				<i class="right1" id="arrow1"></i>
			</div>
			<!--      simple edit on .style added . lable added -->
			<div id="dropdown1" class="dropdown" style="height: 0px;>
				<form class="form" action="" method="post">
					<label>First Name:</label>
					<input class="acc" type="text" name="n_fname" value="<?php echo $fname; ?>">
					<label>Last Name:</label>
					<input class="acc" type="text" name="n_lname" value="<?php echo $lname; ?>">
					<label>Gender:</label>
					<select class="acc" name="n_gender" value="<?php echo $gender; ?>" >
						<option>Male</option>
						<option>Female</option>

					</select>
					<label>Address:</label>
					<input class="acc" type="text" name="n_address" value="<?php echo $address; ?>">
					<label>Date of birth:</label>
					<input class="acc" type="date" name="n_dob" value="<?php echo $dob; ?>"  >
					<input class="acc" type="submit" value="SAVE" name="save1">
				</form>
			</div>

			<!--    _________________________________________  simple edit on .style added__________________________________ -->
				<div onclick="dropdown2()" class="sel">
					<span class="heads">Security Settings</span>
				<i class="right2" id="arrow2"></i>

				</div>
				<div id="dropdown2" class="dropdown" style="height: 0px;">
					<form action="" method="post">

						<label>You Email:</label>
						<input class="acc" type="text" name="n_email"   value="<?php echo $email; ?>">
						<p>Change Your Password</p>

						<label>Current Password:</label>
						<input class="acc" type="password" name="password" >

						<label>New Password:</label>
						<input class="acc" type="password" name="n_password" id="newpass" >
						<label>Confirm Password</label>
						<input class="acc" type="password" name="cn_password" id="conpass" onkeyup ="checkmatch()">
						<div id="checkstatus"></div>
						<?php include('errors.php') ?>
						<input class="acc" type="submit" value="SAVE" name="save2">
					</form>
				</div>

			</div>
			<script >
			var pass= document.getElementById("newpass");
			var conpass=document.getElementById("conpass");
			function checkmatch(){
				if (pass.value != conpass.value) {
					document.getElementById("checkstatus").innerHTML="Passwords do not match!";
				}
				else
					document.getElementById("checkstatus").innerHTML="passwords match";
			}
			pass.onchange= checkmatch;
			conpass.onkeyup = checkmatch;
			</script>
			<script type="text/javascript">
				/*----------------------- edition here ----------------------------------- */
				function dropdown1(){
					var d1=document.getElementById("dropdown1");
					var a1=document.getElementById("arrow1");
					if(d1.style.height== "0px")
						{
						d1.style.height="380px"	;
						a1.classList.remove("right1");
						a1.classList.add("up");

					}
					else
					{	
						d1.style.height= "0px";
						a1.classList.add("right1");
						a1.classList.remove("up");
                    }
				}
				/*----------------------- edition here ----------------------------------- */
				function dropdown2(){
					var d2=document.getElementById("dropdown2");
					var a2=document.getElementById("arrow2");
					if(d2.style.height== "0px")
						{
						d2.style.height="380px"	;
						a2.classList.remove("right2");
						a2.classList.add("up");
					}
					else
					{	
						d2.style.height= "0px";
                    a2.classList.add("right2");
						a2.classList.remove("up");
                    }
				}
			</script>
		</body>
	</html>