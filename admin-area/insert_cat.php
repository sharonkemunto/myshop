

<form action="" method="post" style="padding:80;">

<b>Insert New Catergory:</b>
<input type="text" name="new_cat" required/>
<input type="submit" name="add_cat" value="Add Category" />


</form>
<?php
include("includes/db.php");

    if(isset($_POST['add_cat'])){

     $new_cat=$_POST['new_cat'];

     $insert_cat="insert into categories (cat_title) values ('$new_cat')";
//executing the query
    $run_cat=mysqli_query( $conn, $insert_cat);

    if($run_cat)
    {
        echo"<script>alert('New Category Has Been inserted!'</script>";
        echo"<script>window.open('index.php?view_cats','_self')</script>";
    }
}


?>