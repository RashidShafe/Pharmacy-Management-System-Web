<?php
if(isset($_REQUEST["del"])){
        $servername="localhost";
        $username="root";
        $password="";
        $dbname='pm';
        $con=mysqli_connect($servername,$username,$password,$dbname);
        
        $no= $_REQUEST['no'];

        $q1= "INSERT INTO `order_done` SELECT * FROM `orders` WHERE `order_no` = '$no';";
        $q="DELETE FROM `orders` WHERE `order_no` = '$no'" ;
        
        mysqli_query($con,$q1)or trigger_error("Query Failed! SQL: $q1 - Error: ".mysqli_error($con), E_USER_ERROR);
        mysqli_query($con,$q)or trigger_error("Query Failed! SQL: $q1 - Error: ".mysqli_error($con), E_USER_ERROR);
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
            border:2px solid grey;
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
        .logout{
          text-decoration:none;
          background-color:white;
          padding:3px;
          margin-top:150px;
          border:2px black;
          border-radius:5px;
          color:red;
        }
        .data{
          margin-left:20%;
        }
        table{
          margin-top: 10px;
          width:50%;
          background-color:rgb(229, 231, 250);
        }
        table,th,td{
          float:center;
          border:2px outset green;
          border-collapse:collapse; 
          margin-left:2%;
          margin-right:auto;
        }
        td{
          text-align:center;
          padding:3px 5px;
        }
        table tr:not(:first-child){
            cursor: pointer;
            transition:all .25s ease-in-out;
        }
        table tr:not(:first-child):hover{
          background-color:#ddd;
        }
        .view{
          margin-left:22%;
          
        }
        #txtarea{
          width:50%;
          height:150px;
        }
        .no{
          width:0px;
          visibility: hidden;
        }
        .pr{
          border-style:none;
          background-color:yellow;
          width:80px;
        }
        .btn{
            font-weight:bold;
            margin: 0px auto;
            margin-left: 15%;
            font-family: cursive;
            font-size:14px;
            border:2px solid rgb(128, 239, 247);
            border-radius: 30px;
            background: rgb(38, 69, 105);
            color: white;
            width:100px;
            padding:3px;
        }
        .btn:hover{
            cursor: pointer;
            color:  rgb(17, 17, 17);
            background: rgb(236, 227, 227);
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
        <a  href="admin.php">Manage Med.</a>
        <a class='ac' href="sell.php">Orders</a>
        <a class='logout' href="admin_log.php">Log Out</a>
    </nav>
    <section class="data">
    <table class="list" id="table">
          <tr>
              <th>Order No.</th>
              <th>Details</th>
              <th>Name</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Total</th>
          </tr>
      <?php
            $servername="localhost";
            $username="root";
            $password="";
            $dbname='pm';
            $con=mysqli_connect($servername,$username,$password,$dbname);
              $q="select * from orders";
              $result= mysqli_query($con,$q)or trigger_error("Query Failed! SQL: $q - Error: ".mysqli_error($con), E_USER_ERROR);;
              $count=mysqli_num_rows($result);
              if ($count > 0) 
              {
                  while($row = $result->fetch_assoc()) 
                  {
                      echo "<tr><td>". $row["order_no"]. "</td><td>". $row["data"]. "</td><td>" . $row["name"] ."</td><td>" . $row["address"] ."</td><td>" . $row["phone"] ."</td><td>" . $row["total"] ."</td></tr>";
                  }
              }
            $con->close();
       ?>
       </table>
    </section>
    
    <section class="view"><form method="post">
        <div >
        <br><label for="txtarea">Order details:</label><br>
        <textarea id="txtarea" name="txtarea">
                  Med. Name         Unit         Price
          </textarea><br>
        </div>
        <br>
        Total price:<input class ="pr" type="number" id="up2" value="0" readonly>
        <input class="no" type="text" name="no" id="no" value="">
        <button class="btn" onclick="deliver()" name="del" id="del">Deliver</button>
          
          <form>
    </section>

    <script>
      
      function deliver(){
        document.getElementById("del").submit();
      }

      var table=document.getElementById('table');
      // for(var i=0; table.length;i++ )
      // {
      //   (table)[i].addEventListener('click',function()
      //   {
      //     console.log(this.innerHTML);
      //   });
      // }

      for(var i=0; table.rows.length;i++ )
      {
        table.rows[i].onclick=function()
        {
          rIndex=this.rowIndex;
          document.getElementById("no").value=this.cells[0].innerHTML;
          document.getElementById("txtarea").value=this.cells[1].innerHTML;
          document.getElementById("up2").value=this.cells[5].innerHTML;
        }
      }
           
    </script>
</body>
</html>