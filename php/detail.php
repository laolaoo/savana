<?php
$d_name = "" ;
$d_img = "" ;
$d_comment = "" ;
$d_price = "" ;
$d_size = "";
include('home.php'); //connection include
$name_link = $_GET['name_product'];
$detail = "SELECT d_name , d_img , d_comment ,  price , size FROM details,product
WHERE product.p_number = details.p_number and p_name = '$name_link' ";
$detail_sent = mysqli_query($connection , $detail);
while($line = mysqli_fetch_object($detail_sent)){
$d_name = $line -> d_name ;
$d_img = $line -> d_img ;
$d_comment = $line -> d_comment ;
$d_price = $line -> price ;
$d_size = $line -> size ;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Details about the product</title>
		<script type="text/javascript" src="../scripts/detail.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/detail.css">
	</head>
	<body>
		<!-- detail_con = details container-->
		<div class="detail_con" >
			<div class="img">
				<?php echo "<img src='../photo/product/$d_img' width=300px height=300px >"; ?>
			</div>

			<div class="details">
				<?php echo "<h4> $d_name </h4>"; ?>
			</div>
			<!-- prop == properties \size\color..etc of the product
			in selects menu -->

			<div class="prop">
				<label><i class="fa fa-crosshairs" aria-hidden="true"></i></label>
				<?php echo "<p> $d_comment </p>"; ?>
			</div>
			<div class="prop">
				<label><i class="fa fa-compress" aria-hidden="true"></i> Size :</label>
				<?php echo "<p> $d_size </p>"; ?>
			</div>
			<div class="prop1">
             <label><i class="fa fa-money" aria-hidden="true"> Price :</i></label>
				<?php echo "<p> $d_price </p>"; ?>
			</div>
           
			<?php if(isset($_SESSION['username'])): ?>
			<form method="POST">
				<button id="" name="add" class="add tooltip" onclick="additem()">Add
				<span class="tooltiptext">Add to cart</span>
				</button>
				<div id="snackbar">One item added to your cart</div>
			</form>
			<?php endif ?>
<?php if(isset($_SESSION['username'])){
		if($_SESSION['username'] == 'admin')
			{
		include('modify.php');
		}
		} ?> 
		<?php if(!isset($_SESSION['username'])): ?>
			<button id="noadd"  class="add">Add</button>
			<div class="modal" id="modal">
				<div class="modal-content">
				<div class="modal_header">
					<span class="close">&times;</span>
					<p>mear</p>
				</div>
				<div class="modal_body">
					<p>you are not loged in 
					dont have an account? 
				signup <a href="register.php">here</a> </p>
				</div>
				</div>
			</div>
			<?php endif ?>
			
		</div>
		<?php
		//add to cart
		if(isset($_POST['add'])){
		{
		$user = $_SESSION['username'] ;
		$add_cart = "INSERT into cart (user , product , price , date )
		VALUES ('$user','$name_link','$d_price',current_date()) ";
		mysqli_query($connection , $add_cart );
		}
		
		
		
		}
		?>
		<script type="text/javascript">
			/* modal js*/
var modal = document.getElementById("modal");
var btn = document.getElementById("noadd");

var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

		</script>
	</body>
</html>