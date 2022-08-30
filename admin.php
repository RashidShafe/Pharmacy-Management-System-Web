<?php 
      $servername="localhost";
      $username="root";
      $password="";
      $dbname='pm';
      $m_name="";
      $m_manu="";
      $m_type="";
      $m_price="";
      $m_date="";
      $m_pos="";
      $con=mysqli_connect($servername,$username,$password,$dbname);

      if(mysqli_connect_errno()){
        die("connection failed");
      }

      if(isset($_POST['search'])){
              $name=$_POST['searchfld'];
              $q="select * from medicine where `name` like '%$name%' LIMIT 1;";
              $result=mysqli_query($con,$q) or trigger_error("Query Failed! SQL: $q - Error: ".mysqli_error($con), E_USER_ERROR);
              $row = $result->fetch_assoc();
              $m_name=$row["name"];
              $m_manu=$row["manufacturer"];
              $m_type=$row["type"];
              $m_price=$row["unit price"];
              $m_date=$row["expire date"];
              $m_pos=$row["position"];
      }
      if(isset($_POST['update'])){
          $m_name=$_POST['name'];
          $m_name2=$m_name;
          $m_manu=$_POST['manname'];
          $m_type=$_POST['type'];
          $m_price=$_POST['price'];
          $m_date=$_POST['date'];
          $m_pos=$_POST['pos'];
          $q="UPDATE `medicine` SET `name`='$m_name',`manufacturer`='$m_manu',`type`='$m_type',`unit price`='$m_price', `expire date`='$m_date',`position`='$m_pos' WHERE `name`='$m_name2'";
          mysqli_query($con,$q) or trigger_error("Query Failed! SQL: $q - Error: ".mysqli_error($con), E_USER_ERROR);
          echo '<script>alert("Updated");</script>';
      }
      if(isset($_POST['Add'])){
          $m_name=$_POST['name'];
          $m_name2=$m_name;
          $m_manu=$_POST['manname'];
          $m_type=$_POST['type'];
          $m_price=$_POST['price'];
          $m_date=$_POST['date'];
          $m_pos=$_POST['pos'];

          $q1="select * from medicine where `name` ='$m_name';";
          $result=mysqli_query($con,$q1) or trigger_error("Query Failed! SQL: $q1 - Error: ".mysqli_error($con), E_USER_ERROR);
          $count=mysqli_num_rows($result);
          if($count>0)
          {
            echo '<script>alert("Already Added in database");</script>';
          }
          else{
          $q="INSERT INTO `medicine`(`name`, `manufacturer`, `type`, `unit price`,`expire date`,`position`) VALUES ('$m_name','$m_manu','$m_type','$m_price','$m_date','$m_pos')";
          mysqli_query($con,$q) or trigger_error("Query Failed! SQL: $q - Error: ".mysqli_error($con), E_USER_ERROR);
          echo '<script>alert("Added");</script>';}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>

    <style>
        body {
          margin: 0;
          background-color:rgb(177, 213, 212);
        }
        .imgleft{
          position: absolute;
          left:10px;
          top:10px;
          padding: 0px;
        }
        .imgleft img{
          padding: 0px;
          width: 80px;
        } 
        header{
            text-align: center;
            font-size: 25px;
            text: bolder;
            padding-top: 1px;
            padding-bottom: 1px;
            background-image:url(https://images.pexels.com/photos/1452701/pexels-photo-1452701.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260);
            border:2px solid white;
            border-radius:4px;

        }
        nav {
          width: 20%;
          background-color: #f1f1f1;
          position: fixed;
          height: 100%;
          text-align: center;
          font-weight: bolder;
          font-size: larger;
        }
        nav a {
          display: block;
          color: black;
          padding: 16px;
          text-decoration: none;
        }
         
        nav a.active {
          background-color: #04AA6D;
          color: white;
        }
        
        nav a:hover {
          background-color: #555;
          color: white;
          border: 2px black;
          border-radius: 5px;
        }
        .ac{
            color: azure;
            background-color: rgb(113, 179, 179);
            border-radius: 5px;
        }
        .nxt{
            margin-left:20%;
            width:80%;
            padding: 10px;
            font-size:18px;
        }
        .btn{
            font-weight:bold;
            margin: 0px auto;
            margin-bottom: 20px;
            font-family: cursive;
            font-size:12px;
            border:2px solid rgb(128, 239, 247);
            border-radius: 30px;
            background: rgb(38, 69, 105);
            color: white;
            width:100px;
            padding:2px;
        }
        .btn:hover{
            cursor: pointer;
            color:  rgb(17, 17, 17);
            background: rgb(149, 156, 239 );
        }
        .cls{
            width: 250px;
            padding: 2px;
            border-radius:5px;
            font-family: cursive;
            font-size: 13px;
            color: black;
            background-color: rgba(255, 222, 194, 0.733);
        }
        .cls:focus{
          background: rgb(250, 227, 220);
        }
        
        .cls2{
          margin-left:37px;
        }
        .cls3{
          margin-left:120px;
          padding:3px;
        }
        .manu{
          margin-left:14px;
        }
        .type{
          margin-left:75px;
        }
        .cls4{
          padding:3px;
          margin-left:50px;
        }
        .logout{
          text-decoration:none;
          background-color:white;
          padding:3px;
          margin-top:150px;
          border:2px black;
          border-radius:5px;
          color:red;
        }
        .date{
          margin-left:23px;
        }
        .pos{
          margin-left:50px;
        }
    </style>

</head>

<body>

    <header>
      <div class="imgleft">
        <img src="https://images.pexels.com/photos/7411935/pexels-photo-7411935.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="fdgd">
     </div>
        <p>Welcome Admin</p>
    </header>
    <nav>
        <a class='ac' href="admin.php">Manage Med.</a>
        <a href="sell.php">Orders</a>
        <a class='logout' href="admin_log.php">Log Out</a>
    </nav>
    <section class="nxt">
      <form method="post">
        <label for="search">Search by medicine name:</label>
        <input class="cls" type="text" name="searchfld" id="search">
        <input class="btn" type="submit" name="search" value="Search"><br><br>
      
        <label for="name">Medicine name:</label>
        <input class="cls" type="text" name="name" id="name" value='<?php echo $m_name; ?>'><br><br>

        <label class="manu" for="manname">Manufacturer:</label>
        <input class="cls" type="text" name="manname" id="manname" value='<?php echo $m_manu; ?>'><br><br>

        <label class="type" for="type">Type:</label>
        <input class="cls" type="text" name="type" id="type" value='<?php echo $m_type; ?>'><br><br>

        <label class="cls2" for="price"> Unit Price:</label>
        <input class="cls" type="text" name="price" id="price" value='<?php echo $m_price; ?>'><br><br>

        <label class="date" for="date"> Expire Date:</label>
        <input class="cls" type="date" name="date" id="date" value='<?php echo $m_date; ?>'><br><br>

        <label class="pos" for="pos">Position:</label>
        <input class="cls" type="text" name="pos" id="pos" value='<?php echo $m_pos; ?>'><br><br>

        <input class="btn cls3" type="submit" name="update" value="Update">
        <input class="btn cls4" type="submit" name="Add" value="Add">
      </form>
        
    </section>
</body>
</html>