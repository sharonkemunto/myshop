<!DOCTYPE html>
<?php
session_start();

include("functions/functions.php");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Online Shop</title>
    <link rel="stylesheet" href="styles/materialize.min.css"
    <link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
<body>
<!--main container starts here-->
    <div class="main_wrapper"> 

<nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo">Digital Space</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
        <li><a href="all_products.php">All Products</a></li>
        <li><a href="customer/my_account.php">My Account</a></li>
        <li><a href="cart.php">Shopping Cart</a></li>
      </ul>
    </div>
  </nav>
 

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
           <?php getCats(); 
           ?>
</ul>

<div id="sidebar_title">Brands</div>  
    <ul id="cats">
           <?php getBrands();  ?>



</ul>

</div>
   
    <div id="content__area">

    <?php cart();?>

     <div id="shopping_cart">
     <span style="float:right; font-size:16px; padding:5px; line-height:40px;">
     <?php

if(isset($_SESSION['customer_email'])){
echo "<b>Welcome</b>"  . $_SESSION['customer_email'] . "<b style='color:yellow;'>Your</b>";
}
else{
    echo "<b>Welcome Guest</b>";
}

     ?>
        <b style="color:yellow"> shopping_cart-</b> Total items:<?php total_items();?> Total Price:<?php total_price();?><a href="cart.php" style="color:yellow">Go to Cart</a>
    <?php

if(!isset($_SESSION['customer_email']))
{
    echo "<a href='checkout.php' style='color:orange;'>Login</a>";
}
else{                 //if person is logged in
    echo "<a href='Logout.php' style='color:orange;'>Logout</a>";

}






?>
    
    
    
    
    
     </span>
     </div>




    <div id="products_box">
    <?php getPro(); ?>
    <?php getCatpro(); ?>
    <?php getBrandpro();?>
</div>
    </div>
</div>
<!--content ends here-->



    <div id="footer">
        <h2 style ="text-align:center; padding-top:30px;">&copy;2019 Digital Space</h2>




    </div> 
    <!--main container ends here-->
    <script src = "js/jquery-2.1.1.js"></script>  
    <script src = "js/materialize.min.js"></script>  
</body>
</html>