<!DOCTYPE html>
<html>
  <head>
    <title>Savana main page</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    
  </head>
  <body>
    <?php include('home.php');
    ?>
    <!-- adds photo slide show -->
    <div class="slideshow">
      
      <div class="mySlides fade">
        <div class="numbertext">1 / 5</div>
        <img src="../photo/main/1.jpg">
        <div class="text1">Caption Text</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">2 / 5</div>
        <img src="../photo/main/2.jpg" >
        <div class="text1">Caption Two</div>
      </div>
      <div class="mySlides fade">
        <div class="numbertext">3 / 5</div>
        <img src="../photo/main/3.jpg">
        <div class="text1">Caption Three</div>
      </div>
       <div class="mySlides fade">
        <div class="numbertext">4 / 5</div>
        <img src="../photo/main/4.jpg">
        <div class="text1">Caption Three</div>
      </div>
       <div class="mySlides fade">
        <div class="numbertext">5 / 5</div>
        <img src="../photo/main/5.jpg">
        <div class="text1">Caption Three</div>
      </div>
    </div>

    <div class="headline">
      <img src="../photo/main/merry.jpg" width="100%" height="100%" style="border-radius:6px;">
    </div >
    <!-- rec= recommended -->
    <span class="between">TOP SELLING</span><br>
      <span class="between1">TOP SELLING</span>
<dir class="rec_con">  <!--new cart select-->
    <?php
    $top_sell = "SELECT p_name, p_img  FROM product,cart WHERE cart.product = product.p_name  ; ";
    $sell_sent = mysqli_query($connection , $top_sell);

    $random="SELECT p_name ,p_img FROM product LIMIT 5,9"; //random select
    $random_sent = mysqli_query($connection , $random);
?>
    <div class="rec1"> <!--top selling-->
<?php
   $li = mysqli_fetch_array($sell_sent);
   $p_name = $li ['p_name'] ;
   $img = $li ['p_img'];
   echo"<div class='container'>";
   echo"<img src='../photo/product/$img' class='image'>";
   echo"<div class='middle'>";
   echo"<div class='text'><a href='detail.php?name_product=$p_name' style='text-decoration:none;color:white;'>$p_name</a></div>";
   echo"</div></div>";
?>
    </div>
    <div class="rec"> <!--top selling-->
<?php
   $li = mysqli_fetch_array($sell_sent);
   $p_name = $li ['p_name'] ;
   $img = $li ['p_img'];
   echo"<div class='container'>";
   echo"<img src='../photo/product/$img' class='image'>";
   echo"<div class='middle'>";
   echo"<div class='text'><a href='detail.php?name_product=$p_name' style='text-decoration:none;color:white;'>$p_name</a></div>";
   echo"</div></div>";
?>
    </div>
    <div class="rec1">                <!--random-->
      <?php
   $li = mysqli_fetch_array($random_sent);
   $p_name = $li ['p_name'] ;
   $img = $li ['p_img'];
   echo"<div class='container'>";
   echo"<img src='../photo/product/$img' class='image'>";
   echo"<div class='middle'>";
   echo"<div class='text'><a href='detail.php?name_product=$p_name' style='text-decoration:none;color:white;'>$p_name</a></div>";
   echo"</div></div>";
?>
    </div>
  
    <div class="rec">
      <?php
   $li = mysqli_fetch_array($random_sent);
   $p_name = $li ['p_name'] ;
   $img = $li ['p_img'];
   echo"<div class='container'>";
   echo"<img src='../photo/product/$img' class='image'>";
   echo"<div class='middle'>";
   echo"<div class='text'><a href='detail.php?name_product=$p_name' style='text-decoration:none;color:white;'>$p_name</a></div>";
   echo"</div></div>";
?>
    </div>
    <div class="rec1">
      <?php
   $li = mysqli_fetch_array($random_sent);
   $p_name = $li ['p_name'] ;
   $img = $li ['p_img'];
   echo"<div class='container'>";
   echo"<img src='../photo/product/$img' class='image'>";
   echo"<div class='middle'>";
   echo"<div class='text'><a href='detail.php?name_product=$p_name' style='text-decoration:none;color:white;'>$p_name</a></div>";
   echo"</div></div>";
?>
    </div>
    <div class="rec">
      <?php
   $li = mysqli_fetch_array($random_sent);
   $p_name = $li ['p_name'] ;
   $img = $li ['p_img'];
   echo"<div class='container'>";
   echo"<img src='../photo/product/$img' class='image'>";
   echo"<div class='middle'>";
   echo"<div class='text'><a href='detail.php?name_product=$p_name' style='text-decoration:none;color:white;'>$p_name</a></div>";
   echo"</div></div>";
?>
    </div>
</dir>

<?php include('footer.php') ?>

<script type = "text/javascript" >
    var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1
    }

    slides[slideIndex - 1].style.display = "block";

    setTimeout(showSlides, 5000);
}
    </script>

  </body>
</html>