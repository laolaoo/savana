<?php
include('home.php');
if(isset($_SESSION['username'])){
$user1=$_SESSION['username'];

$cart = " SELECT * FROM cart WHERE user='$user1'";

$sent_cart = mysqli_query( $connection , $cart);}
$c_user = "";
$c_product = "";
$c_price = "";
$c_date = "";
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/cart.css">
	</head>
	<body>
		<div class="t_con">
		<table >
			 <tr>
				<th>user</th>
				<th>prduct</th>
				<th>price</th>
				<th>DATE</th>
				<th>BELETE</th>
				<th>BUY</th>
			 </tr>
			   <form method='POST'>
				<?php
				if(isset($_SESSION['username']))
				{
					while($roow = mysqli_fetch_array($sent_cart))
				{
				$c_user = $roow['user'] ;
				$c_product = $roow['product'] ;
				$c_price = $roow['price'] ;
				$c_date = $roow['date'];
				echo"<tr>";
						echo "<td> $c_user </td>";
						echo "<td> $c_product</td>";
						echo "<td> $c_price</td>";
						echo "<td> $c_date </td>";
						echo "<td>";
					    echo "<input type='submit' value='remove' name='delete'></td>";
					    echo "<td><input type='submit' value='BUY' name='buy'>";
						echo "</td>";
				echo "</tr>";
				}
			}
				?>
			  </form>
		</table>
		</div>
		<!-- remove from cart -->
		<?php
		if(isset($_POST['delete']))
		{
		   $remove = "DELETE FROM cart WHERE product = '$c_product'";
		   mysqli_query($connection , $remove);
		   
		}


		if(isset($_POST['buy']))
		{
			$user = $_SESSION['username'] ;
		   $buy = "INSERT into adcart (user , product , date) VALUES ('$user','$c_product','$c_date')";
		   mysqli_query($connection , $buy);
		   
		}
		?>



	</body>
</html>