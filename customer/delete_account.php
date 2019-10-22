<br>
<h2 style="text-align:center; color:blue;">Are You Sure You Want To DELETE Your Account??!!</h2>
<form action='' method="post">

<br>
<input type="submit" name="yes" value="Yes I Want!"/>
<input type="submit" name="no" value="No I Was Joking!"/>


</form>
<?php
include("includes/db.php");

    $user=$_SESSION['customer_email'];

    if(isset($_POST['yes']))
    {
        $delete_customer="delete from customers where customer_email='$user'";
        $run_customer= mysqli_query($conn,$delete_customer);
       echo "<script>alert('Account Has been Deleted!')</script>";
       echo"<script>window.open('../index.php','_self'</script>";
    }

    if(isset($_POST['no']))
    {
        echo "<script>alert('Oh!Dont Joke Again!')</script>"
       echo"<script>window.open('my_account.php','_self'</script>";
    }
?>
