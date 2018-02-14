<?php
include('home.php');
$type_add = "SELECT t_id , t_name FROM type ";
$type_sent = mysqli_query($connection , $type_add);
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/addproduct.css">
  </head>
  <body>
    <div class="add_bord">
      <form method="POST">
        <center><input class="adder" type="text" name="p_name" placeholder="ADD PRODUCT NAME :"></center>
       <center><input class="adder"  type="text" name="d_price" placeholder="produc_price"></center>
       <center><input type="file" name="p_img"></center>
        <center><select class="adder"  name="mear">
          <?php
          while($rr = mysqli_fetch_object($type_sent))
          {
          $id = $rr -> t_id ;
          $t_name = $rr -> t_name ;
          echo "<option value='$id'> $t_name </option>";
          }
          ?>
        </select></center>
        <center><input class="adder_s" type="submit" name="adder" value="add"></center>
      </form>
    </div>


    <?php
    
if(isset($_POST['adder']))
{
       $y= "SELECT p_number FROM product";
    $yy = mysqli_query($connection , $y);
   while( $ll = mysqli_fetch_array($yy))
    {   $p = $ll['p_number'];
     }
$p1 = $p +1 ;
$p_name = $_POST['p_name'];
$p_img = $_POST['p_img'];
$t_id= $_POST['mear'];
$d_price = $_POST['d_price'];


$add_to_product = "INSERT into product (p_number, p_name, p_img, p_id) VALUES ('$p1','$p_name','$p_img','$t_id')";
mysqli_query($connection , $add_to_product);
$add_to_detail = "INSERT into details (d_name,d_img , price,p_number) VALUES ('$p_name','$p_img', '$d_price','$p1')";
mysqli_query($connection , $add_to_detail);
}
?>
  </body>
</html>

