<?php  

include("includes/db.php");

if(isset($_GET['edit_brand']))
{
    $brand_id =$_GET['edit_brand'];

    $get_brand =" select * from brands where brand_id='$brand_id'";

    $run_brand=mysqli_query($conn,$get_brand);

    $row_brand=mysqli_fetch_array($run_brand);

    $brand_id=$row_brand['brand_id'];

    $brand_title=$row_brand['brand_title'];
}




?>

<form action="" method="post" style="padding:80;">

<b>Update Brand:</b>
<input type="text" name="new_brand" value "<?php echo $brand_title; ?>"/>
<input type="submit" name="update_brand" value="Add Brand" />


</form>
<?php
$update_id=brand_id;
    if(isset($_POST['update_brand'])){

     $new_brand=$_POST['new_brand'];

     $update_brand="update brands set brand_title='$new_brand'where brand_id='update_id'";
//executing the query
    $run_update=mysqli_query($conn,$update_brand);

    if($run_update)
    {
        echo"<script>alert(' Brand Has Been updated!'</script>";
        echo"<script>window.open('index.php?view_brands','_self')</script>";
    }
}



//brands not working checkit out

?>