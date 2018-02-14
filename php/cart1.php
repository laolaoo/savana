<?php include('connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/cart.css">
</head>
<body>
<div class="t_con">
		<table >
			 <tr>
				<th>user</th>
				<th>prduct</th>
				<th>DATE</th>
			 </tr>
				<?php
				$buy = "SELECT user , product , date FROM adcart order by user ";
				$buy_sent = mysqli_query($connection , $buy);
				while($raw = mysqli_fetch_array($buy_sent))
				{
				$c_user = $raw['user'] ;
				$c_product = $raw['product'] ;
				$c_date = $raw['date'];
				echo"<tr>";
						echo "<td> $c_user </td>";
						echo "<td> $c_product</td>";
						echo "<td> $c_date </td>";
				echo "</tr>";
				}
			
				?>
		</table>
		</div>
</body>
</html>