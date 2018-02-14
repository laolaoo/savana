<?php 
include('connection.php');

if (isset($_POST['search'])) {
	
	$s_result=$_POST['search'];
	
	$sql="select p_number, p_name, p_img, t_id from product where p_name like '%".$s_result."%' ";

	$result=mysqli_query($connection,$sql);


  }

?>