<?php
     include("includes/db.php");

if(isset($_GET['delete_cat']))
{
    $delete_id = $_GET['delete_cat'];

    $delete_cat="delete from Categories where cat_id='$delete_id'";

    $run_delete=mysqli_query($conn, $delete_cat); //its a reference variable

    if($run_delete)
    {
        echo"<script>alert('A Category has been deleted!')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
    }

}



?>