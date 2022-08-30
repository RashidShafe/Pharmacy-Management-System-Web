<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname='pm';

$con=mysqli_connect($servername,$username,$password,$dbname);

if(mysqli_connect_errno()){
	die("connection failed");
}

$name =$_REQUEST['username'];
$pass=$_REQUEST['password'];

$q="select * from user where `user name`='$name' and password='$pass'";

$result= mysqli_query($con,$q);
$count=mysqli_num_rows($result);
$row = $result->fetch_assoc();
if($count==1)
{
	$_SESSION['mail']=$row["email"];
    $_SESSION['name']=$row["name"];
    $_SESSION['phone']=$row["phone"];
    $_SESSION['address']=$row["address"];
    $_SESSION['password']=$row["password"];
	$_SESSION["username"]=$row["user name"];
	echo"found";
	header("location: 3logged.php");
}
else
{
	echo"not found";
	header("location: 2form.html");
}
?>