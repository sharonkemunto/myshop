<?php

// connection to the database we use 


$servername = "localhost";
$username = "root";
$password = "";
$db = "ecommerce";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
    die("Connection failed:". mysqli_connect_error());
}
//script that detects userip address
function getIp() {
  $ip = $_SERVER['REMOTE_ADDR'];

  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }

  return $ip;
}
//creating shopping cart

function cart(){
if(isset ($_GET['add_cart']))
{
  global $conn;

  $ip=getIp();

  $pro_id=$_GET['add_cart'];

  $check_pro="select * from cart where ip_add='$ip' AND p_id='$pro_id'";

  $run_check=mysqli_query ($conn,$check_pro);
  
  if(mysqli_num_rows($run_check)>0)
  {
    echo "";
  }
  else {
    //insert product into the cart
    $insert_pro="insert into cart (p_id,ip_add) values ('$pro_id','$ip')";

    $run_pro=mysqli_query($conn,$insert_pro);

    echo "<script>window.open('index.php','_self')</script>";
  }
}
  }

  //getting the total added items
  function total_items()
  {
    if(isset($_GET['add_cart']))
    {
      global $conn;

      $ip=getIp();

      $get_items = "select * from cart where ip_add='$ip'";

      $run_items = mysqli_query($conn, $get_items);

      $count_items = mysqli_num_rows($run_items);
    }
      else
      {
      global $conn;

      $ip=getIp();

      $get_items = "select * from cart where ip_add='$ip'";

      $run_items = mysqli_query($conn, $get_items);

      $count_items = mysqli_num_rows($run_items);
      }
  echo $count_items;
    
  }
  //getting total price in the cart
  function total_price()
  {
    $total = 0;

    global $conn;

    $ip = getIp();
    
    $sel_price="select * from cart where ip_add='$ip'";

    $run_price= mysqli_query($conn, $sel_price);

    while($p_price=mysqli_fetch_array($run_price))
    {
      $pro_id = $p_price['p_id'];

      $pro_price = "select * from products where product_id='$pro_id'";

      $run_pro_price = mysqli_query($conn,$pro_price);

      while ($pp_price = mysqli_fetch_array($run_pro_price))
      {
        $product_price = array($pp_price['product_price']);
      
        $values = array_sum($product_price);

        $total +=$values;
      }

    }

      echo $total;



  }

//getting the categories

function getCats()
{
global $conn;
$get_cats = "select * from categories";

$run_cats = mysqli_query($conn, $get_cats);

if (mysqli_num_rows($run_cats) > 0) 
{
   
    while($row = mysqli_fetch_assoc($run_cats)) 
    {
        $cat_id=$row['cat_id'];
        $cat_title=$row['cat_title'];
echo  "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";  
    }
}
 else
     {
    echo "0 results";
     }


}

// getting the  brands

function getBrands()
{
 global $conn;
$get_brands="select * from brands";

$run_brands=mysqli_query($conn, $get_brands);
if (mysqli_num_rows($run_brands) > 0) 
{
    while($row = mysqli_fetch_assoc($run_brands)) {
        $brand_id=$row['brand_id'];
        $brand_title=$row['brand_title'];
echo  "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";

   
}
} else {
    echo "0 results";
}

}






function getPro()
{
if(!isset($_GET['cat'])){
    if(!isset($_GET['brand']))
    {
    global $conn;
$get_pro="select * from products order by RAND() LIMIT 0,6";
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
 <p><b>price:ksh.$pro_price</b></p>
<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>


<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
  </div>
  ";

   }
    }
}
}




function getCatPro()
{
if(isset($_GET['cat'])){
 $cat_id=$_GET['cat'];

    global $conn;
$get_cat_pro="select * from products where product_cat='$cat_id'";

$run_cat_pro =mysqli_query($conn, $get_cat_pro);

//counts how many producs are associated 
$count_cats=mysqli_num_rows($run_cat_pro);

if($count_cats==0)
{
    echo"<h2 style='padding:20px;'> No products were Found in This Category!</h2>";
}

//because we are desplaying on homepage we dont need desc and image
while($row_cat_pro=mysqli_fetch_array($run_cat_pro))
{
       $pro_id=$row_cat_pro['product_id'];
       $pro_cat=$row_cat_pro['product_cat'];
       $pro_brand=$row_cat_pro['product_brand'];
       $pro_title=$row_cat_pro['product_title'];
       $pro_price=$row_cat_pro['product_price'];
       $pro_image=$row_cat_pro['product_image'];

      
       

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
}
function getBrandPro()
{
if(isset($_GET['brand'])){
 $brand_id=$_GET['brand'];

    global $conn;
$get_brand_pro="select * from products where product_brand='$brand_id'";

$run_brand_pro =mysqli_query($conn, $get_brand_pro);

//counts how many producs are associated 
$count_brands=mysqli_num_rows($run_brand_pro);

if($count_brands==0)
{
    echo"<h2 style='padding:20px;'> No products were Found associated with this Brand!</h2>";
}

//because we are desplaying on homepage we dont need desc and image
while($row_brand_pro=mysqli_fetch_array($run_brand_pro))
{
       $pro_id=$row_brand_pro['product_id'];
       $pro_cat=$row_brand_pro['product_cat'];
       $pro_brand=$row_brand_pro['product_brand'];
       $pro_title=$row_brand_pro['product_title'];
       $pro_price=$row_brand_pro['product_price'];
       $pro_image=$row_brand_pro['product_image'];

      
       

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
}