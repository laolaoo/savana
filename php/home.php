<?php
include('connection.php');
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	}
	if(isset($_SESSION['username'])){
	$username=$_SESSION['username'];
	}
	$sql3= "select avatar from customer where username='$username'";
	$result3=mysqli_query($connection,$sql3);
	 $r = mysqli_fetch_array($result3);
    $avatar =$r['avatar'] ;
    

?>
<!DOCTYPE html>
<html>
	<head>
		<title>home</title>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<script type="text/javascript" src="../scripts/home.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/home.css">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet"> 
	</head>
	<body>
		<!-- fixed header container -->
		<div class="header_con">
			<!-- fixed logo container -->
			<div class="h_logo">
				<a href="main.php">SAVANA</a>
			</div>
			<!-- fixed user info container -->
			<div class="h_user">
				<?php if(isset($_SESSION['username'])) : ?>
					<!-- welcome user-->
				<span class="welcome_u" >
					<!-- ______________________________ avatar added ________________________________-->
					
					<?php
					echo "Welcome ". $_SESSION['username']."!";
					?>
					<i class="right" id="arrow" onclick="usermenu()"></i>
				</span>
				<!-- new add style display added-->
				<div id="usermenu" class="usermenu" style="display: none;">
				<?php 	echo "<img id='avatar' src='../photo/avatar/$avatar'>" ; ?>
					<a class="account" href="account.php"><i class="fa fa-cogs" aria-hidden="true"></i> Setting</a>

                   <?php if($_SESSION['username'] =='admin') : ?>
					<a href="cart1.php"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> cart</a>
				<?php else : ?>
					<a href="cart.php"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> cart</a>
					<?php endif ?>
	<?php if($_SESSION['username'] =='admin') : ?> <!-- new add -->
	<a href="addproduct.php"><i class="fa fa-plus-square" aria-hidden="true"></i> add</a>
	<?php endif ?>
    <a class="logout" href="main.php?logout='1'" ><i class="fa fa-sign-out" aria-hidden="true"></i>
     logout</a>
	
			</div>
				<?php endif ?>
				
				<?php if (!isset($_SESSION['username'])) : ?>
				<span id="btn_con">
					<a id="signup_btn" href="register.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
                          Sign Up</a>
					
					<span id="login_btn" onclick="openlogin()"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</span>
				</span>
				<div id="login" class="fade">
					<?php include('login.php') ?>
					
				</div>
				<?php endif ?>
			</div>
		</div>
		<!-- search bar-->
		<div id="search" >
			
			<span class="catagory" onclick="opensidebar()">Categories </span>
			<a class="cat_icon" href="catagory.php"><i class="fa fa-sort-amount-asc"></i></a>
			<form action="product.php" method="post" style="display: inline;">
				
				<input class="search1" type="text" name="search" placeholder="         Search..">
				<input type="submit" value="submit" name="lookfor" style="display: none;" />
				
			</form>
		</div>
		<!--catagory side bar  -->
		<!-- _________________________________ width aded  ______________________________ -->
		<div id="sidebar" style="width: 0px;">
			<?php
			$catagory = "SELECT t_name , t_id FROM type";
			$catagory_sent = mysqli_query($connection , $catagory);
			echo "<ul>";
				while($cat = mysqli_fetch_object($catagory_sent))
				{
				$cat_name = $cat -> t_name ;
				$id = $cat -> t_id ;
				echo "<li><a href='product.php?p_t=$id ' style='text-decoration:none;color:white;'> $cat_name </a></li>";
				}
			echo "</ul>";
			?>
		</div>
		
		
		<!--
			to make search bar sticky .. but did not work -_-
		<script>
		window.onscroll = function() { stick()};
		var bar = document.getElementById("search");
		var sticky = bar.offsetTop;
		function stick() {
		if (window.pageYOffset >= sticky) {
		navbar.classList.add("sticky");
		} else {
		navbar.classList.remove("sticky");
		}
		}
		</script>
		-->
	</body>
</html>