<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../css/modify.css">
  </head>
  <body>
    <form method="POST">
      <input type="submit" name="del" value="DELETE" class="remov">
    </form>
    <?php
    $name_link = $_GET['name_product'];
    if(isset($_POST['del']))
    {
    $del1 = "DELETE FROM details WHERE d_name = '$d_name' ";
    $del = "DELETE FROM product WHERE p_name = '$name_link'";
    mysqli_query($connection , $del1);
    mysqli_query($connection , $del);

    
    }
    
    ?>
    <!--echo "<form mehod='POST'>";
      echo "<button name='delete'> delete! </buttom>";
    echo "</form>";-->
    
  </body>
</html>