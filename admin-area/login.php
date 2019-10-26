<?php
session_start();

?>


<!DOCTYPE>
<html>
    <head>
        <title>Login form</title>
        <link rel="stylesheet" href="styles/login_style.css" media="all"/>
    </head>


<div class="login">
<h2 style="color:white;text-align:center;"><?php echo @$_GET['not_admin'];?></h2>
	<h1>Admin Login</h1>
    <form method="post" action="login.php">
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large"name="login">Log in.</button>
    </form>
</div>

</body>
</html>

<?php 


include("includes/db.php");

if(isset($_POST['login']))
{
    $email= mysql_real_escape_string($_POST['email']);
    $pass= mysql_real_escape_string($_POST['password']);
//prevents someone to add malicious code
$sel_user="select * from admins where user_email='$email' AND user_pass='$pass' ";
$run_user =mysqli_query($conn,$sel_user);

$check_user=mysqli_num_rows($run_user);

if($check_user==1)
{

    $_SESSION['user_email']=$email;
    echo"<scipt>window.open('index.php?logged_in=You have successfully logged in!','_self')</script>";

}
else
{
    echo "<script>alert('password or email is wrong,try again!'</script>";
}

}




?>