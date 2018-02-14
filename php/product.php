<!DOCTYPE html>
<html>
  <head>
    <title>product</title>
    <link rel="stylesheet" type="text/css" href="../css/product.css">
  </head>
  <body>
<?php include('home.php'); ?>
    
<?php
if(!isset($_POST['lookfor']))    //select the product !
{
$c_id = $_GET['p_t'];
$product = "SELECT DISTINCT p_name , p_img FROM product,type
where product.p_id = type.t_id and t_id = $c_id ";
$sent = mysqli_query( $connection , $product);
while ( $li = mysqli_fetch_array($sent) )
{
$p_name = $li ['p_name'] ;
$img = $li ['p_img'];
  echo"<div class='container'>";
  echo"<img src='../photo/product/$img' class='image'>";
  echo"<div class='middle'>";
  echo"<div class='text'><a href='detail.php?name_product=$p_name' style='text-decoration:none;color:white;'>$p_name</a></div>";
  echo"</div></div>";
       }
}
else       //search for something
{
if(isset($_POST['lookfor']))
  {
    $search = $_POST['search'];
     $search_sent ="SELECT * FROM product WHERE p_name  LIKE '%$search%' ";
     $result = mysqli_query($connection , $search_sent );
     
    if(mysqli_num_rows($result) > 0)
     {
      while ($row = mysqli_fetch_array($result)) 
      {
      $p_number = $row ['p_number'];
      $p_name = $row ['p_name'];
      $p_img = $row ['p_img'];
      $t_id = $row ['p_id'];

        echo"<div class='container'>";
        echo"<img src='../photo/product/$p_img' class='image'>";
        echo"<div class='middle'>";
        echo"<div class='text'><a href='detail.php?name1=$p_name'  style='text-decoration:none;color:white;'>$p_name</a></div>";
        echo"</div></div>";
      }
    }
else
    {
      echo " FOUND 0 <br> the product you r searching for is not found";
      }
  }

}     
?>
</body>
</html>