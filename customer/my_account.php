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
            <a href="../index.php"><img id="logo" src="images/images.png"/></a>
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
    <div id="sidebar_title">My Account</div>  
    <ul id="cats">

    <?php
       $user = $_SESSION['customer_email'];

        $get_img="select * from customers where customer_email='$user' ";

        $run_img=mysqli_query($conn, $get_img);

        $row_img= mysqli_fetch_array($run_img);

        $c_image=$row_img['customer_image'];

        $c_name= $row_img['customer_name']; // to display customers name on the account
     
        echo "<p style='text-align:center;'><img src='customer_images/$c_image 'width='100' height='100'/></p>";

    ?>
           <li><a href="my_account.php?my_orders">My Orders</a></li>
           <li><a href="my_account.php?edit_account">Edit Account</a></li>
           <li><a href="my_account.php?change_pass">Change Password</a></li>
           <li><a href="my_account.php?delete_account">Delete Account</a></li>
           <li><a href="logout.php">Log Out</a></li>
           
</ul>

   
    <div id="content__area">

    <?php cart();?>

     <div id="shopping_cart">
     <span style="float:right; font-size:16px; padding:5px; line-height:40px;">
     <?php

if(isset($_SESSION['customer_email'])){
echo "<b>Welcome</b>"  . $_SESSION['customer_email'];
}

     ?>
    
    <?php

if(!isset($_SESSION['customer_email']))
{
    echo "<a href='checkout.php' style='color:orange;'>Login</a>";
}
else{                 //if person is logged in
    echo "<a href='logout.php' style='color:orange;'>Logout</a>";

}
?>
     </span>
     </div>


<div id="products_box">
    
    <?php
        if(!isset($_GET['my_orders'])){
            if(!isset($_GET['edit_orders'])){
                if(!isset($_GET['change_pass'])){
                    if(!isset($_GET['delete_account'])){
                        
    echo "
    <h2 style='padding:20px;'>welcome: $c_name </h2>
    <b>You Can See your Orders Progress By Clicking This <a href='my_account.php?my_orders'>link</a></b>";
        }
         }
          }
         }
    ?>

<?php
    if(isset($_GET['edit_account']))
    {
        include("edit_account.php");
    }

    if(isset($_GET['change_pass']))
    {
        include("change_pass.php");
    }
    if(isset($_GET['delete account']))
    {
        include("delete_account.php");
    }


?>
</div>

</div>


    <div id="footer">
        <h2 style ="text-align:center; padding-top:30px;">&copy;2019 Digital Space</h2>
        



    </div> 
    <!--main container ends here-->
    
</body>
</html>