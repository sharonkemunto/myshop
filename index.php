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
    <link rel="stylesheet" href="styles/materialize.min.css" />
    <link rel="stylesheet" href="styles/style.css" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!--main container starts here-->

    <div id="nav-wrapper">
        <nav class="grey text-white">
            <a href="index.php">Digital Space</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Products</a></li>
                <li><a href="customer/my_account.php">My Account</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
            </ul>
        </nav>
    </div>


    <div>
        <div id="form">
            <form method="get" action="results.php" ectype="multipart/form-data">
                <input type="text" name="user_query" placeholder="search a product" />
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <div id="content__area">
            <?php cart();?>

            <span style="float:right; font-size:16px; padding:5px; line-height:40px;">

                <?php

if(isset($_SESSION['customer_email'])){
echo "<b>Welcome</b>".$_SESSION['customer_email']."<b style='color:yellow;'>Your</b>";
}
else{
    echo "<b>Welcome Guest</b>";
}
?>
                <b style="color:yellow"> shopping_cart-</b> Total items:<?php total_items();?> Total
                Price:<?php total_price();?><a href="cart.php" style="color:yellow">Go to Cart</a>
                <?php

if(!isset($_SESSION['customer_email']))
{
    echo "<a href='checkout.php' style='color:orange;'>Login</a>";
}
else{                 //if person is logged in
    echo "<a href='Logout.php' style='color:orange;'>Logout</a>";

}
?>
        </div>
    </div>
    </span>

    <!-- side content  here-->


    <div id="sidebar">
        <div class="container">
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
    </div>

    <div id="products_box">

    <div class="row">
      
      <div class="col s6"><?php getPro(); ?></div>
      <div class="col s6"><?php getCatpro(); ?></div>
      <div class="col s6"><?php getBrandpro();?></div>
    </div>



    <div>
        <footer class="footer">
            <div class="footer-copyright">
                © 2019 Copyright Digital Space
            </div>
    </div>
    </footer>

    </div>
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/materialize.min.js"></script>
</body>

</html>