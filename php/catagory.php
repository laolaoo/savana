<?php
$conn = mysqli_connect("localhost", "root", "", "savana");
$catagory = "SELECT c_name , c_img FROM catagory "; //select productlis (list)
$sent1 = mysqli_query($conn , $catagory);
$array = array();  
$array1 = array();                             //push list in array
while ($ll = mysqli_fetch_object($sent1)) {
	$name_of_list =  $ll -> c_name ;
	$img_of_list = $ll -> c_img ; 
	array_push($array , $name_of_list);
	array_push($array1 , $img_of_list);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>list</title>
		<link rel="stylesheet" type="text/css" href="../css/catagory.css">
	</head>
	<body>
		<?php include('home.php'); ?>
		<?php
		for($i=0 ; $i<count($array) ; $i++)
		{
		echo"<div class='colline'>";
            echo "<img src='../photo/catagory/$array1[$i]' class='img_title' >";
			echo "<h3>$array[$i] :</h3>";
			$type = "SELECT t_name FROM catagory,type WHERE catagory.c_id = type.c_id and c_name = '$array[$i]' ";
			$sent2 = mysqli_query($conn , $type);
			while ($l = mysqli_fetch_object($sent2))
			{
			$type_prod =  $l -> t_name ;
			echo "<ul class='title'>";
				echo "<li class='main_title'><a href = 'product.php?p_t=1 '>$type_prod </a></li>";
			echo "</ul>";
			}
		echo "</div>";
		}
		?>
	</body>
</html>
<!--$q = "SELECT list, type FROM productlist,type WHERE productlist.p_id = type.p_id  ";
//$result = mysqli_query($c , $q);
$function = "SELECT count(list) as count FROM productlist";
$result = mysqli_query($c , $function);
$r = mysqli_fetch_object($result);
$count = $r -> count ;-->