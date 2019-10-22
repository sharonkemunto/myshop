


<h2 style="text-align:center;">Change Your Password</h2>

<form action="" method="post">
    <table align="center" width="800">
    <tr>
    <td align="right"><b>Enter Current Password:</b><input type="password" name="current_pass" required></td>
   </tr>

   <tr>
         <td align="right"><b>Enter new Password</b><input type="password" name="new_pass"required></td>
   </tr>

<tr>
    <td align="right"><b>Enter New password</b><input type="password" name="confirm_pass"required></td>
</tr>
<tr align="center">
    <td colspan="8" ><input type="submit" name="change_pass" value="Change Password"/></td>

</tr>
    

</form>
<?php


include("includes/db.php");
if(isset($_POST['change_pass'])){

    $user=$_SESSION['customer_email'];
    $current_pass=$_POST['current_pass'];
    $new_pass=$_POST['new_pass'];
    $confirm_pass=$_POST['confirm_pass'];


    $sel_pass="select * from customers where customer_pass='$current_pass' AND customer_email='$user'";

    $run_pass=mysqli_query($conn, $sel_pass);

    $check_pass=mysqli_num_rows($run_pass);

    if($check_pass==0)
    {
        echo "<script>alert('Password Incorrect'</script>";
        exit();
    }
   
    if($new_pass!=$confirm_pass)
    {
        echo "<script>alert('Password Does not Match!'</script>";
        exit();
    }
    else{

        $update_pass="update customers set customer_pass='$new_pass' where customer_email='$user";
        $run_update=mysqli_query($conn,$update_pass);

        echo "<script>alert('Password Updated Successfully!'</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
    }


}


?>