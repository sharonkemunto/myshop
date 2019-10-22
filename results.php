<!DOCTYPE html>
<?php

include("functions/functions.php");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Online Shop</title>
    <link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
<body>
<!--main container starts here-->
    <div class="main_wrapper"> 

    <!--header starts here-->
        <div class="header">
            <a href="index.php"><img id="logo" src="images/images.png"/></a>
    </div>
<!--header ends here-->



<!--navigation bar starts here-->
    <div class="menubar">
<ul id="menu" >
<li><a href="index.php">Home</a></li>
<li><a href="all_products.php">All Products</a></li>
<li><a href="customer/my_account.php">My Account</a></li>
<li><a href="#">Sign Up</a></li>
<li><a href="cart.php">Shopping Cart</a></li>
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
   
    <div id="content__area">

     <div id="shopping_cart">
     <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
        Welcome!Find Everything Near You!<b style="color:yellow"> shopping_cart-</b> Total items: Total Price:<a href="cart.php" style="color:yellow">Go to Cart</a>
     </span>
     </div>
    <div id="products_box">
        <?php 
if (isset($_GET['search']))
{
    //we create a local variable which gets value of the input field
$search_query=$_GET['user_query'];

$get_pro="select * from products where product_keywords like'%$search_query%'";


$run_pro =mysqli_query($conn, $get_pro);

//because we are desplaying on homepage we dont need desc and image
while($row_pro=mysqli_fetch_array($run_pro))
{
       $pro_id=$row_pro['product_id'];
       $pro_cat=$row_pro['product_cat'];
       $pro_brand=$row_pro['product_brand'];
       $pro_title=$row_pro['product_title'];
       $pro_price=$row_pro['product_price'];
       $pro_image=$row_pro['product_image'];

echo"
  <div id='single_product'>
<h3>$pro_title</h3>
<img src='admin-area/product_images/$pro_image' width='180' height='180'/>
 <p><b> ksh.$pro_price</b></p>
<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>


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