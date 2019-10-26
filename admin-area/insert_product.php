<!DOCTYPE html>

<?php
include("includes/db.php");
if(!isset($_SESSION['user_email']))
{
    echo"<script> window.open('login.php?not_admin=You are not an admin!','_self') </script>";

}
else{
?>
<html>
    <head>
                    <title> Inserting Product </title>
 <!--textedidor obtained from www.tinymce-->
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
    </head>
<body bgcolor="skyblue">

        <form action="insert_product.php" method="post" enctype="multipart/form-data"> 

                <table align="center" width="795" border="2" bgcolor="#187eae">

                        <tr align="center">
                            <td colspan="7"><h2>insert new post here</h2></td>
                        </tr>

                        <tr> 
                         <td align="right"><b>Product Title</b></td>
                             <td><input type="text" name="product_title" size="60" required/></td>
                
                         </tr>
                         
                         <tr>  <td align="right"><b>Product Category</b></td>
                             <td>
                             <select name="product_cat" required>
                                 <option>Select a Category</option>
                                 <!--to already display existing categories in the database-->
                         <?php 
                                $get_cats="select * from categories";

                                $run_cats=mysqli_query($conn, $get_cats);
                                if (mysqli_num_rows($run_cats) > 0)
                                 {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($run_cats)) 
                                    {
                                        $cat_id=$row['cat_id'];
                                        $cat_title=$row['cat_title'];

                                        // the value attribute is used to pass the category id from the product cat
                                echo  "<option value='$cat_id'>$cat_title</option>";  
                                    }
                                }
                        ?>
                                    </select>
                        
                             </td>
                
                         </tr>
                         <tr> 
                          <td align="right"><b>Product Brand</b></td>
                             <td>
                             <select name="product_brand" required>
                                 <option>Select a Brand</option>
                                 <!--to already display existing categories in the database-->
<?php 
      $get_brands="select * from brands";
      $run_brands=mysqli_query($conn, $get_brands);
 if (mysqli_num_rows($run_brands) > 0)
 {
while($row = mysqli_fetch_assoc($run_brands)) 
 {
    $brand_id=$row['brand_id'];
$brand_title=$row['brand_title'];
 echo  "<option value='$brand_id'>$brand_title</option>";
 }
}   
                                
 ?>
  </select>
                            
                                 
                                 
 </td>
                
    </tr>
                         <tr>  <td align="right"><b>Product Image</b></td>
                             <td><input type="file" name="product_image" required/></td>
                
                         </tr>
                         <tr>  <td align="right"><b>Product Price</b></td>
                             <td><input type="text" name="product_price" required/></td>
                
                         </tr>
                         <tr>  <td align="right"><b>Product Description</b></td>
                             <td><textarea name="product_desc" cols="20"rows="10"></textarea></td>
                
                         </tr>
                         <tr>  <td align="right"><b>Product Keywords</b></td>
                             <td><input type="text" name="product_keywords" size="50" required/></td>
                
                         </tr>

                         <tr align="center">  
                             <td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"/></td>
                
                         </tr>


                </table>
                </form>


</body>
</html>  
<!--taking data from text data from the fields and assigned to a variable-->
<?php
if (isset($_POST['insert_post']))
{
        $product_title=$_POST['product_title'];
        $product_cat=$_POST['product_cat'];
        $product_brand=$_POST['product_brand'];
        $product_price=$_POST['product_price'];
        $product_desc=$_POST['product_desc'];
        $product_keywords=$_POST['product_keywords'];

// getting image from the field
$product_image=$_FILES['product_image'] ['name'];
$product_image_tmp= $_FILES['product_image'] ['tmp_name'];

move_uploaded_file($product_image_tmp,"product_images/ $product_image");


$insert_product="insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) 
values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";

$insert_pro = mysqli_query($conn, $insert_product);
if ($insert_pro)
{
echo "<script>alert('Product Has Been Inserted!')</script>";
//redirect message if product exist
echo "<script>window.open('index.php?','insert_product')</script>"; //TODO:redirect the path
}


}



?>

<?php }?>