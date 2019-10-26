<?php
     include("includes/db.php");

if(isset($_GET['delete_bc']))
{
    $delete_id = $_GET['delete_brand'];

    $delete_c="delete from Customers where customer_id='$delete_id'";

    $run_delete=mysqli_query($conn, $delete_c); //its a reference variable

    if($run_delete)
    {
        echo"<script>alert('A Customer has been deleted!')</script>";
        echo "<script>window.open('index.php?view_customers','_self')</script>";
    }

}



?>