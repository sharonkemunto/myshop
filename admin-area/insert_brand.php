

<form action="" method="post" style="padding:80;">

<b>Insert New Brand:</b>
<input type="text" name="new_brand" required/>
<input type="submit" name="add_brand" value="Add Brand" />


</form>
<?php
include("includes/db.php");

    if(isset($_POST['add_brand'])){

     $new_brand=$_POST['new_brand'];

     $insert_brand="insert into brands (brand_title) values ('$new_brand')";
//executing the query
    $run_brand=mysqli_query($conn, $insert_brand);

    if($run_brand)
    {
        echo"<script>alert('New Brand Has Been inserted!'</script>";
        echo"<script>window.open('index.php?view_brands','_self')</script>";
    }
}



//brands not working checkit out

?>