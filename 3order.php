<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname='pm';
$name=$_SESSION["name"];
$address=$_SESSION["address"];
$phone=$_SESSION["phone"];
$total=$_REQUEST["up2"];
$con=mysqli_connect($servername,$username,$password,$dbname);

if(mysqli_connect_errno()){
	die("connection failed");
}
$dt=$_REQUEST['txtarea'];

$q="INSERT INTO `orders`(`order_no`,`data`,`name`,`address`,`phone`,`total`) VALUES ('','$dt','$name','$address','$phone','$total')";
mysqli_query($con,$q);
?>
<script type="text/javascript">
alert("Order placed successfully");
window.location.href = "3logged.php";
</script>