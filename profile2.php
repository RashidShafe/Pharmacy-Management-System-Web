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
        $q="UPDATE `user` SET `phone`='$phone',`name`='$name',`address`='$address',`password`='$password',`email`='$mail' WHERE `user name`='$username'";
        // $q="update user set `name`='$name' where `user name`=' '+'$username'";
        mysqli_query($con,$q);

        echo "<script>alert('Data Updated#');window.location.href = '1login.php';</script>";
        //header("location: 1login.php");
?>
<script type="text/javascript">
//alert("Your Data updated successfully");
//window.location.href = "1login.php";
</script>