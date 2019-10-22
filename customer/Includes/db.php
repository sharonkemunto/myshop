<?php

$conn=mysqli_connect("localhost","root","","ecommerce");

if (mysqli_connect_errno())
{
    echo "failed to connect to MySQL:".mysqli_connect_error();
}

?>