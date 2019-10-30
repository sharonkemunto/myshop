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

    <?php cart();?>

     <div id="shopping_cart">
     <span style="float:right; font-size:18px; padding:5px; line-height:40px;">
     <?php
     if(isset($_SESSION['customer_email'])){
echo "<b>Welcome</b>"  . $_SESSION['customer_email'] . "<b style='color:yellow;'>Your</b>";
}
else{
    echo "<b>Welcome Guest</b>";
}

     ?>



    <b style="color:yellow"> shopping_cart-</b> Total items:<?php total_items();?> Total Price:<p id="totals"><?php total_price();?></p><a href="cart.php" style="color:yellow">Go to Cart</a>
     </span>
     </div>


    <?php
    if(!isset ($_SESSION['customer_email']))
    {
        include("customer_login.php");

    }
    else{

        include("payment.php");
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