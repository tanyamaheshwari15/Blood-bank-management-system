<?php
$servername="localhost";
$username="root";
$password="";
$dbname="blood-bank";

$con=mysqli_connect($servername,$username,$password,$dbname);

if(!$con)
echo "Error in inserting record".mysqli_connect_error();
?>