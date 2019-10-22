<!DOCTYPE html>
<?php

include("functions/functions.php");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Shop</title>
    <link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
<body>
<!--main container starts here-->
    <div class="main_wrapper"> 

    <!--header starts here-->
        <div class="header">
<img id="logo" src="images/images.png"/>
    </div>
<!--header ends here-->



<!--navigation bar starts here-->
    <div class="menubar">
<ul id="menu" >
<li><a href="#">Home</a></li>
<li><a href="#">All Products</a></li>
<li><a href="#">My Account</a></li>
<li><a href="#">Sign Up</a></li>
<li><a href="#">Shopping Cart</a></li>
<li><a href="#">Contact Us</a></li>

</ul>

<div id="form">
   <form method="get" action="results.php" enctype="multipart/form-data"> <!--an attribute used to get videos and images-->
<input type="text" name="user_query" placeholder="Search a product"/>
<input type="submit" name="search" value="Search"/>

</form>

    </div>
    <!--navigation bar ends here-->

    <!--content  here-->
<div class="content">
    

    <div id="sidebar">
    <div id="sidebar_title">Categories</div>  
    <ul id="cats">
           <?php getCats();?>
</ul>

<div id="sidebar_title">Brands</div>  
    <ul id="cats">
           <?php getBrands();  ?>



</ul>

</div>
   <!--for details page-->
    <div id="content__area">

     <div id="shopping_cart">
     <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
        Welcome!Find Everything Near You!<b style="color:yellow"> shopping_cart-</b> Total items: Total Price:<a href="cart.php" style="color:yellow">Go to Cart</a>
     </span>
     </div>
<div id="products_box">

<?php
if(isset($_GET['pro_id']))
{
$product_id=$_GET['pro_id'];

$get_pro="select * from products where product_id='$product_id'";
$run_pro =mysqli_query($conn, $get_pro);

//because we are desplaying on homepage we dont need desc and image
while($row_pro=mysqli_fetch_array($run_pro))
{
       $pro_id=$row_pro['product_id'];
       $pro_title=$row_pro['product_title'];
       $pro_price=$row_pro['product_price'];
       $pro_image=$row_pro['product_image'];
       $pro_desc=$row_pro['product_desc'];

echo"
  <div id='single_product'>
<h3>$pro_title</h3>
<img src='admin-area/product_images/$pro_image' width='400' height='300'/>
 <p><b> ksh.$pro_price</b></p>

<p>$pro_desc</p>
<a href='index.php' style='float:left;'>Go Back</a>

<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
  </div>
  ";


}
}
?>
</div>
</div>
</div>
<!--content ends here-->



    <div id="footer">
        <h2 style ="text-align:center; padding-top:30px;">&copy;2019 Digital Space</h2>




    </div> 
    <!--main container ends here-->
    
</body>
</html>