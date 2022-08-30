<?php
$servername="localhost";
$username="root";
$password="";
$dbname='pm';

$con=mysqli_connect($servername,$username,$password,$dbname);

if(mysqli_connect_errno()){
	die("connection failed");
}

$name= $_REQUEST['name'];
$mail= $_REQUEST['mail'];
$phone= $_REQUEST['phone'];
$username= $_REQUEST['username'];
$password= $_REQUEST['password'];
$address=$_REQUEST['address'];

$q1="select * from `user` where `user name` ='$username';";
$result=mysqli_query($con,$q1) or trigger_error("Query Failed! SQL: $q1 - Error: ".mysqli_error($con), E_USER_ERROR);
$count=mysqli_num_rows($result);
if($count>0)
{
  echo '<script type="text/javascript">
  alert("Can not use this USERNAME");
  window.location.href = "2form.html";
  </script>';
}
else{
	$q="insert into `user`(`name`,`user name`,`password`,`email`,`phone`,`address`)
	values('$name','$username','$password','$mail','$phone','$address')";
	mysqli_query($con,$q);
	echo '<script type="text/javascript">
  	alert("Registration Successfull");
  	window.location.href = "1login.php";
  	</script>';
}


?>