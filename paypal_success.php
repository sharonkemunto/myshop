

<html>

<head>
    <title>Payment successfull!</title>
</head>

<body>
<?php
session_start();
?>
<?php
include("includes/db.php");
include("functions/functions.php");
//this is all for product details
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
        
        $product_id =$pp_price['product_price'];

        $values = array_sum($product_price);

        $total +=$values;
      }

    }
    //getting quantity of product

    $get_qty="select * from cart where p_id='$pro_id'";

    $run_qty=mysqli_query ($conn, $get_qty);

    $row_qty=mysqli_fetch_array($run_qty);

    $qty=$row_qty['qty'];

    if($qty==0)
{
$qty=1;
}   
else{
    $qty=$qty;
}

//this about a customer
    $user=$_SESSION['customer_email'];

    $get_c="select * from customers where customer_email='$user' ";

    $run_c=mysqli_query($conn, $get_img);

    $row_c= mysqli_fetch_array($run_c);

    $c_id=$row_c['customer_id'];

    
//inserting the payment to table

$amount= $_GET['amt'];
$currency=$_GET['cc'];
$trx_id=$_GET['tx'];
    
    $insert_payments="insert into payments(amount,customer_id,product_id,currency,payment_date) values('$amount','$c_id','$pro_id','$trx_id','$currency',NOW())";

    $run_payments=mysqli_query($conn,$insert_payment);
//inserting order into table
    $insert_order="insert into orders (p_id, c_id, qty,order_date) values('$pro_id','$c_id','$qty',NOW())";

    $run_order=mysqli_query($conn,$insert_order);
//removing product from cart
    $empty_cart="delete from cart";

    $run_cart=mysqli_query($conn,$empty_cart);



if($amount==$total)
{
    echo"<h2>Welcome:".$_SESSION['customer_email']."<br>". "Your payment was successful!</h2>";
    echo"<a href='http://localhost:8080/shopnewlevel/customer/my_account.php'>Go to your Account</a>";
}
else{
echo"<h2>welcome Guest,PAYMENT failed</h2><br>";
echo "<a href='http://localhost:8080/shopnewlevel/customer/my_account.php'>Go back to shop</a>";


}
?>






</body>


</html>